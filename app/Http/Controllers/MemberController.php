<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Universal;
use App\Models\Universalmodel;
use App\Models\Customer;
use App\Models\Trainer;
use App\Models\Packagerecord;
use App\Models\Trainerrecord;
use App\Models\Payment;
use App\Models\User;
use App\Models\Singledata;
use App\Models\Gainloss;
use App\Models\Memberschedule;
use App\Models\Notification;
use App\Models\Schedule;
use App\Models\Dietchart;
use App\Models\Workoutsummary;

class MemberController extends Controller {

    public $universalmodel, $universal, $user, $profile, $customer, $months;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()) {
                return redirect('/');
            } else {
                $this->user = Auth::user()->id;
                $this->profile = Auth::user()->profile_id;
                $this->customer = Customer::where('id', $this->profile)->first();
                $this->months = DB::table('months')->get();
                $this->universal = new Universal();
                $this->universalmodel = new Universalmodel();
            }
            return $next($request);
        });
    }

    //Dashboard
    public function index() {
        $date = date('Y-m-d');
        $result = DB::table('workout_summaries')
                        ->select(['start_weight', 'end_weight'])
                        ->where('profile_id', $this->profile)
                        ->orderByRaw('week_dayslno asc,id desc')
                        ->limit(7)->get();

        $start_weight = '';
        $end_weight = '';
        foreach ($result as $subarray_1) {
            $start_weight .= implode((string) ',', (array) $subarray_1->start_weight) . ',';
            $end_weight .= implode((string) ',', (array) $subarray_1->end_weight) . ',';
        }
        $month = date('F-Y');

        return view('member.dashboard', [
            'title' => 'Dashboard',
            'profile_workout' => DB::table('workouttimes')->where('workout_date', $date)->where('workout_by', $this->profile)->first(),
            'workouttimes' => DB::table('workouttimes')->orderBy('id', 'desc')->where('workout_month', $month)->where('workout_by', $this->profile)->get(),
            'start_weight' => rtrim($start_weight, ","),
            'end_weight' => rtrim($end_weight, ","),
            'getgainloss' => Gainloss::orderBy('report_date', 'asc')->where('profile_id', $this->profile)->limit(7)->get(),
            'totalgym' => Gainloss::where('profile_id', $this->profile)->where('report_month', $month)->count(),
            'totalgymclass' => Memberschedule::where('profile_id', $this->profile)->count(),
        ]);
    }

//    public function index() {
//        $date = date('Y-m-d');
//        $workouttimes = DB::table('workouttimes')->where('workout_date', $date)->where('workout_by', $this->profile)->first();
//        $result = DB::table('gainlosses')
//                        ->select('wrokout_weight', 'dayname')
//                        ->where('profile_id', $this->profile)
//                        ->orderBy('report_date', 'desc')
//                        ->limit(7)->get();
//
//        $wrokout_weight = '';
//        $wrokout_dayname = '';
//        foreach ($result as $subarray_1) {
//            $wrokout_weight .= implode((string) ',', (array) $subarray_1->wrokout_weight) . ',';
//            $wrokout_dayname .= implode((string) "', '", (array) $subarray_1->dayname) . ',';
//        }
//        $wrokoutdayname = explode(',', rtrim($wrokout_dayname, ","));
//        $month = date('F-Y');
//        
//        return view('member.dashboard', [
//            'title' => 'Dashboard',
//            'workouttimes' => $workouttimes,
//            'wrokout_weight' => rtrim($wrokout_weight, ","),
//            'wrokout_days' => json_encode($wrokoutdayname),
//            'getgainloss' => Gainloss::orderBy('report_date', 'asc')->where('profile_id', $this->profile)->limit(7)->get(),
//            'totalgym' => Gainloss::where('profile_id', $this->profile)->where('report_month', $month)->count(),
//        ]);
//    }
    //Profile
    public function gymprofile() {
        return view('member.profile', [
            'title' => 'GYM Profile | Fithub - Gym & Fitness',
            'profile' => Customer::with('user')->where('id', $this->profile)->first(),
        ]);
    }

    //Update Profile Photo Data
    public function updatephoto(Request $request) {
        $oldphoto = $request->oldphoto;
        if (file_exists($oldphoto)) {
            unlink($oldphoto);
        }
        $image = $request->file('photodata');
        $ext = strtolower($image->getClientOriginalExtension());
        $imagefullname = date('dmi') . substr(md5(rand()), 0, 10) . $ext;
        $uploadpath = 'public/member/';
        $image_url = $uploadpath . $imagefullname;
        \Intervention\Image\Facades\Image::make($image)->resize(200, 200)->save($image_url);
        $data = [
            'photo' => $image_url,
        ];
        Customer::where('id', $this->profile)->update($data);
        $notification = array(
            'setmessage' => 'User Profile Photo Updated Successfully',
            'alerttype' => 'success',
        );
        return redirect('gymprofile')->with($notification);
    }

    //Update Profile Data
    public function updatesettingdata(Request $request) {
        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];
        User::where('id', $this->user)->update($data);
        $notification = array(
            'setmessage' => 'User Setting Info Updated Successfully',
            'alerttype' => 'success',
        );
        return redirect('gymprofile')->with($notification);
    }

    //Update Setting Data
    public function updateprofiledata(Request $request) {
        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'gender' => $request->gender,
            'occupation' => $request->occupation,
            'weight' => $request->weight,
            'height' => $request->height,
            'reason' => $request->reason,
        ];
        Customer::where('id', $this->profile)->update($data);
        $notification = array(
            'setmessage' => 'User Profile Info Updated Successfully',
            'alerttype' => 'success',
        );
        return redirect('gymprofile')->with($notification);
    }

    //Class
    public function gymclasses() {
        return view('member.class', [
            'title' => 'GYM Classes | Fithub - Gym & Fitness',
        ]);
    }

    //Schedule
    public function gymmemschedule(Request $request) {
        $day = $request->get('day');
        if (!empty($day)) {
            $getschedules = Schedule::with('class', 'trainer')->where('day', $day)->get();
        } else {
            $getschedules = [];
            $totalclass = 0;
        }
        $data = [
            'title' => 'GYM Schedule | Fithub - Gym & Fitness',
            'profile_id' => $this->profile,
            'dayname' => $day,
            'getweekdays' => DB::table('weekdays')->get(),
            'getschedules' => $getschedules,
            'getdays' => Memberschedule::select('day')->distinct()->where('profile_id', $this->profile)->get(),
        ];

        return view('member.schedule', $data);
    }

    public function send_schedule_request(Request $request) {
        foreach ($request->classschedules as $value) {
            $schedules = DB::table('schedules')->where('id', $value)->first();
            $data = [
                'profile_id' => $this->customer->id,
                'schedule_id' => $value,
                'day' => $schedules->day,
                'class_id' => $schedules->class_id,
                'trainer_id' => $schedules->trainer_id,
                'time' => $schedules->time,
            ];
            Memberschedule::insert($data);
        }
        $notidata = [
            'name' => $this->customer->fname . ' ' . $this->customer->lname,
            'from' => $this->profile,
            'reason' => 'Class Schedule Approved Request',
            'type' => 'schedule',
            'for' => 0,
            'route' => 'add_new_schedule_request',
        ];
        Notification::insert($notidata);

        $notification = array(
            'setmessage' => "Your Request Sent Successfully To GYM Manager!",
            'alerttype' => 'success'
        );
        return redirect('gymmemschedule')->with($notification);
    }

    //Packages
    public function member_packages() {
        return view('member.package', [
            'title' => 'GYM Packages | Fithub - Gym & Fitness',
            'profile' => Customer::where('id', $this->profile)->first(),
            'getplandata' => Singledata::where('types', 'plan')->get(),
            'getpackagerecords' => Packagerecord::where('profile_id', $this->profile)->orderBy('id', 'desc')->get(),
        ]);
    }

    //View Package Equipments
    public function view_package_equipments() {
        return view('member.viewpackage', [
            'title' => 'GYM Packages Equipments | Fithub - Gym & Fitness',
            'getplandata' => Singledata::where('types', 'plan')->get(),
        ]);
    }

    public function package_update_request(Request $request) {
        $data = [
            'profile_id' => $this->profile,
            'memberid' => $this->customer->memberidno,
            'newpackage' => $request->new_package,
            'newamount' => $request->new_packageamt,
            'oldpackage' => $request->old_package,
            'oldamount' => $request->old_packageamt,
        ];
        $lastid = Packagerecord::insertGetId($data);

        $notidata = [
            'name' => $this->customer->fname . ' ' . $this->customer->lname,
            'from' => $this->profile,
            'reason' => 'Package Change Request',
            'type' => 'package',
            'for' => $lastid,
            'route' => 'change_membership_package',
        ];
        Notification::insert($notidata);

        $notification = array(
            'setmessage' => "Your Request Sent Successfully To GYM Manager!",
            'alerttype' => 'success'
        );
        return redirect('gympackages')->with($notification);
    }

    //Gym Trainners
    public function member_gym_trainers() {
        return view('member.trainers', [
            'title' => 'GYM Trainers | Fithub - Gym & Fitness',
            'profile' => Customer::where('id', $this->profile)->first(),
            'gymtraniners' => Trainer::all(),
            'gettrainerrecord' => Trainerrecord::where('profile_id', $this->profile)->orderBy('id', 'desc')->get(),
        ]);
    }

    public function trainer_update_request(Request $request) {
        $data = [
            'profile_id' => $this->profile,
            'old_trainer' => $request->old_trainer,
            'new_trainer' => $request->new_trainer,
            'remarks' => $request->remarks,
        ];
        $lastid = Trainerrecord::insertGetId($data);
        $notidata = [
            'name' => $this->customer->fname . ' ' . $this->customer->lname,
            'from' => $this->profile,
            'reason' => 'Trainer Change Request',
            'type' => 'trainer',
            'for' => $lastid,
            'route' => 'change_membership_trainer',
        ];
        Notification::insert($notidata);

        $notification = array(
            'setmessage' => "Your Request Sent Successfully To GYM Manager!",
            'alerttype' => 'success'
        );
        return redirect('member_gym_trainers')->with($notification);
    }

    //Weight Gain Loss
    public function member_weight_gain_loss(Request $request) {
        if (empty($request->get('month'))) {
            $month = date('F-Y');
        } else {
            $month = $request->get('month');
            $result = DB::table('workouttimes')->orderBy('id', 'asc')->where('workout_by', $this->profile)->where('workout_month', $month)->count();
            if ($result == 0) {
                $notification = array(
                    'setmessage' => "Results Not Found",
                    'alerttype' => 'error'
                );
                return redirect('member_weight_gain_loss')->with($notification);
            }
        }
        return view('member.weight', [
            'title' => 'Weight Gain & Loss | Fithub - Gym & Fitness',
            'getmonths' => $this->months,
            'getgainloss' => DB::table('workouttimes')->orderBy('id', 'asc')->where('workout_by', $this->profile)->where('workout_month', $month)->get(),
        ]);
    }

    //Payment Status
    //Gym Trainners
    public function gympaymentstatus() {
        return view('member.payments', [
            'title' => 'GYM Payments Status | Fithub - Gym & Fitness',
            'gympaymentstatus' => Payment::where('profile_id', $this->profile)->orderBy('id', 'desc')->get(),
        ]);
    }

    //Messagebox
    public function gymessagebox() {
        return view('member.messagebox', [
            'title' => 'GYM Messagebox | Fithub - Gym & Fitness',
        ]);
    }

    //Add Start Daily Workout
    public function add_start_daily_workout() {
        $date = date('Y-m-d');
        $result = DB::table('workouttimes')->where('workout_date', $date)->where('workout_by', $this->profile)->where('workout_status', 1)->count();
        if ($result == 0) {
            $workout_status = 1;
        } else {
            $workout_status = 0;
        }
        return view('member.startworkout', [
            'title' => 'Start Daily Workout | Fithub - Gym & Fitness',
            'workout_status' => $workout_status,
        ]);
    }

    public function save_daily_workout(Request $request) {
        $day = date('l');
        $day_order = Universal::get_days_order($day);
        $data = [
            'start_time' => $request->start_time,
            'start_weight' => $request->start_weight,
            'workout_date' => date('Y-m-d'),
            'workout_day' => $day,
            'dayserial' => $day_order,
            'workout_by' => $this->profile,
            'workout_status' => $request->workout_status,
            'workout_month' => date('F-Y'),
        ];
        DB::table('workouttimes')->insert($data);

        $notification = array(
            'setmessage' => "Today's Workout Started Successfully",
            'alerttype' => 'success'
        );
        return redirect('member')->with($notification);
    }

    //Close Start Daily Workout
    public function close_start_daily_workout() {
        $date = date('Y-m-d');
        $workouttimes = DB::table('workouttimes')->where('workout_date', $date)->where('workout_by', $this->profile)->where('workout_status', 1)->first();
        return view('member.endworkout', [
            'title' => 'Close Daily Workout | Fithub - Gym & Fitness',
            'workouttimes' => $workouttimes,
        ]);
    }

    public function update_daily_workout(Request $request) {
        date_default_timezone_set("Asia/Dhaka");
        $data_id = $request->data_id;
        $start_time = $request->start_time;
        $start_weight = $request->start_weight;
        $end_time = $request->end_time;
        $end_weight = $request->end_weight;

        $starttime = new \DateTime($start_time);
        $datetime2 = new \DateTime($end_time);
        $interval = $datetime2->diff($starttime);
        $ab = $interval->format('%h:%i');

        if ($end_weight < $start_weight) {
            $workout_result = 'Loss';
        } else {
            $workout_result = 'Gain';
        }

        $data = [
            'workout_status' => 2,
            'end_time' => $end_time,
            'workout_time' => $ab,
            'end_weight' => $end_weight,
            'workout_balance' => abs($start_weight - $end_weight),
            'workout_result' => $workout_result,
        ];
        DB::table('workouttimes')->where('id', $data_id)->update($data);
        $notification = array(
            'setmessage' => "End Today's Workout Successfully",
            'alerttype' => 'success'
        );
        return redirect('member')->with($notification);
    }

    public function reviewcorner() {
        return view('member.reviewcorner', [
            'title' => 'Review Corner Before Left | Fithub - Gym & Fitness',
        ]);
    }

    public function member_review_corner(Request $request) {
        $data = [
            'member_id' => $this->profile,
            'reviews' => $request->finalreviews,
            'status' => 1
        ];
        DB::table('member_reviews')->insert($data);
        User::where('id', $this->user)->where('profile_id', $this->profile)->update(['status' => 0]);
        Session::forget('role_id');
        Session::flush();
        Auth::logout();
        $notification = array(
            'setmessage' => "Thank You For Giving Your Review",
            'alerttype' => 'success'
        );
        return redirect('/')->with($notification);
    }

    public function member_diet_plan_chart() {
        return view('diet.memberdiet', [
            'title' => 'Diet Plan Chart',
            'dietcharts' => Dietchart::with('member', 'dietplan')->where('member_id', $this->profile)->get(),
        ]);
    }

    /*
     * *********************** Missing Workout Add *************************
     */

    //Close Start Daily Workout
    public function add_daily_workout() {
        $date = date('Y-m-d');
        $workouttimes = DB::table('workouttimes')->where('workout_date', $date)->where('workout_by', $this->profile)->where('workout_status', 1)->first();
        return view('member.addworkout', [
            'title' => 'Close Daily Workout | Fithub - Gym & Fitness',
            'workouttimes' => $workouttimes,
        ]);
    }

    public function update_missing_workout(Request $request) {
        date_default_timezone_set("Asia/Dhaka");
        $workout_date = $request->workout_date;
        $day = date('l', strtotime($workout_date));
        $day_order = Universal::get_days_order($day);
        $start_time = $request->start_time;
        $start_weight = $request->start_weight;
        $end_time = $request->end_time;
        $end_weight = $request->end_weight;

        $starttime = new \DateTime($start_time);
        $datetime2 = new \DateTime($end_time);
        $interval = $datetime2->diff($starttime);
        $ab = $interval->format('%h:%i');

        if ($end_weight < $start_weight) {
            $workout_result = 'Loss';
        } else {
            $workout_result = 'Gain';
        }

        $workoutsummary = Workoutsummary::where('profile_id', $this->profile)
                ->where('workout_date', $workout_date)
                ->where('workout_day', $day)
                ->count();

        $data = [
            'start_time' => $start_time,
            'start_weight' => $start_weight,
            'workout_date' => $workout_date,
            'workout_day' => $day,
            'dayserial' => $day_order,
            'workout_by' => $this->profile,
            'workout_status' => 1,
            'workout_month' => date('F-Y', strtotime($workout_date)),
            'workout_status' => 2,
            'end_time' => $end_time,
            'workout_time' => $ab,
            'end_weight' => $end_weight,
            'workout_balance' => abs($start_weight - $end_weight),
            'workout_result' => $workout_result,
        ];
        DB::table('workouttimes')->insert($data);
        $workdata = [
            'profile_id' => $this->profile,
            'workout_date' => $workout_date,
            'workout_day' => $day,
            'week_dayslno' => $day_order,
            'start_weight' => $start_weight,
            'end_weight' => $end_weight,
            'result' => $workout_result,
            'workout_month' => date('F-Y', strtotime($workout_date)),
        ];

        if ($workoutsummary == 0) {
            DB::table('workout_summaries')->insert($workdata);
        } else {
            Workoutsummary::where('profile_id', $this->profile)
                    ->where('workout_date', $workout_date)
                    ->where('workout_day', $day)->update($workdata);
        }

        $notification = array(
            'setmessage' => "Updated Missing Workout Successfully",
            'alerttype' => 'success'
        );
        return redirect('member_weight_gain_loss')->with($notification);
    }

}
