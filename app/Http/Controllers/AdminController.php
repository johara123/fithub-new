<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\Universal;
use App\Models\User;
use App\Models\Company;
use App\Models\Gymclass;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\Singledata;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Packagerecord;
use App\Models\Trainerrecord;
use App\Models\Notification;
use App\Models\Log;
use App\Models\Gainloss;
use App\Models\Payment;
use App\Models\Memberschedule;
use App\Models\Dietchart;
use App\Models\Workoutsummary;

class AdminController extends Controller {

    public $user, $power, $months;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()) {
                return redirect('/');
            } else {
                $this->user = Auth::user()->id;
                $this->power = Auth::user()->power;
                $this->months = DB::table('months')->get();
            }
            return $next($request);
        });
    }

    //Admin Dashboard
    public function index() {
        $month = date('F-Y');
        return view('layouts.dashboard', [
            'title' => 'Dashboard | Fithub - Gym & Fitness',
            'total' => Customer::count(),
            'actives' => Customer::where('profilestatus', 1)->count(),
            'inactives' => Customer::where('profilestatus', 0)->count(),
            'newmembers' => Customer::where('addmonth', $month)->count(),
            'totaltrainer' => Trainer::count(),
            'totalclass' => Gymclass::count(),
        ]);
    }

    //Home Banner
    public function homebanner() {
        return view('banner.index', [
            'title' => 'Home Banner | Fithub - Gym & Fitness',
            'homebanners' => DB::table('homebanners')->get()
        ]);
    }

    public function save_home_banner(Request $request) {
        DB::table('homebanners')->update(['status' => 0]);
        $filelink = $request->file('filelink');
        $filename = date('dmi') . substr(md5(rand()), 0, 10);
        $ext = strtolower($filelink->getClientOriginalExtension());
        $filefullname = $filename . '.' . $ext;
        $uploadpath = './public/banner/';
        $filefulllink = $uploadpath . $filefullname;
        $filelink->move($uploadpath, $filefulllink);
        $data = [
            'filelink' => 'public/banner/' . $filefullname,
            'filetype' => 'video/' . $ext,
            'status' => 1,
        ];
        DB::table('homebanners')->insert($data);
        $notification = array(
            'setmessage' => "New Banner File Saved Successfully",
            'alerttype' => 'success'
        );
        return redirect('/homebanner')->with($notification);
    }

    public function change_home_banner_status(Request $request) {
        $id = $request->get('id');
        $value = $request->get('value');
        DB::table('homebanners')->update(['status' => 0]);
        if ($value == 1) {
            $setmessage = 'Banner Activated Successfully';
        } else {
            $setmessage = 'Banner Inactivated Successfully';
        }
        DB::table('homebanners')->where('id', $id)->update(['status' => $value]);

        $notification = array(
            'setmessage' => $setmessage,
            'alerttype' => 'success'
        );
        return redirect('/homebanner')->with($notification);
    }

    public function delete_home_banner($id) {
        $count = DB::table('homebanners')->count();
        if ($count == 1) {
            $notification = array(
                'setmessage' => "Last Banner Can Not Delete!",
                'alerttype' => 'error',
            );
            return redirect('/homebanner')->with($notification);
        }
        $homebanner = DB::table('homebanners')->select('filelink')->where('id', $id)->first();
        if (file_exists($homebanner->filelink)) {
            unlink($homebanner->filelink);
        }
        DB::table('homebanners')->where('id', $id)->delete();
        $notification = array(
            'setmessage' => "Banner Deleted Successfully",
            'alerttype' => 'success'
        );
        return redirect('/homebanner')->with($notification);
    }

    //About Us
    public function aboutus() {
        return view('aboutus.index', [
            'title' => 'About Us | Fithub - Gym & Fitness',
            'companyprofile' => Company::first()
        ]);
    }

    //Update About Us
    public function update_aboutus(Request $request) {
        $updateto = $request->updateto;
        $updatedata = $request->updatedata;
        if ($updateto == "photo") {
            $oldimagelink = $request->oldimagelink;
            if (file_exists($oldimagelink)) {
                unlink($oldimagelink);
            }
            $image = $request->file('imagedata');
            $ext = strtolower($image->getClientOriginalExtension());
            $imagefullname = 'fithub.' . $ext;
            $uploadpath = 'public/images/';
            $image_url = $uploadpath . $imagefullname;
            \Intervention\Image\Facades\Image::make($image)->resize(660, 650)->save($image_url);
            $data = [
                'profphoto' => $image_url,
            ];
            $message = "Photo Updated Successfully";
        } elseif ($updateto == "about") {
            $data = [
                'homeshorttext' => $request->hometitle,
                'abouttext' => $updatedata,
            ];
            $message = "About Info Updated Successfully";
        } elseif ($updateto == "contact") {
            $data = [
                'address' => $request->address,
                'contact' => $request->contact,
                'contacttwo' => $request->contacttwo,
                'email' => $request->email,
                'emailtwo' => $request->emailtwo,
            ];
            $message = "Contact Info Updated Successfully";
        } else {
            $data = [
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ];
            $message = "Social Info Updated Successfully";
        }
        DB::table('companies')->where('id', 1)->update($data);

        $notification = array(
            'setmessage' => $message,
            'alerttype' => 'success',
        );
        return redirect('aboutus')->with($notification);
    }

    /*
     * *********************** Classess**********************
     */

    //About Us
    public function gymclass() {
        return view('classes.index', [
            'title' => 'Gym classes | Fithub - Gym & Fitness',
            'gymclasses' => Gymclass::all()
        ]);
    }

    public function saveclass(Request $request) {
        $image = $request->file('gymphoto');
        $imagename = 'bra' . date('dmi') . substr(md5(rand()), 0, 10);
        $ext = strtolower($image->getClientOriginalExtension());
        $imagefullname = $imagename . '.' . $ext;
        $uploadpath = 'public/class/';
        $image_url = $uploadpath . $imagefullname;
        \Intervention\Image\Facades\Image::make($image)->resize(400, 200)->save($image_url);
        $classname = $request->name;
        $class_slug = Str::slug($classname);
        $data = [
            'photo' => $image_url,
            'name' => $classname,
            'slug' => $class_slug,
            'description' => @$request->description,
            'features' => implode('$$', $request->featuredesco),
        ];
        DB::table('gymclasses')->insert($data);
        $notification = array(
            'setmessage' => 'Class Info Saved Successfully',
            'alerttype' => 'success'
        );
        return redirect('gymclass')->with($notification);
    }

    //edit_class_data
    public function edit_class_data(Request $request) {
        $id = $request->get('id');
        return view('classes.edit', [
            'title' => 'Edit GYM class | Fithub - Gym & Fitness',
            'getgymclasse' => Gymclass::find($id)
        ]);
    }

    public function updateclass(Request $request) {
        $dataid = $request->dataid;
        $datatype = $request->datatype;
        if ($datatype == 'Photo') {
            $image = $request->file('photo');
            $imagename = date('dmi') . substr(md5(rand()), 0, 10);
            $ext = strtolower($image->getClientOriginalExtension());
            $imagefullname = $imagename . '.' . $ext;
            $uploadpath = 'public/class/';
            $image_url = $uploadpath . $imagefullname;
            \Intervention\Image\Facades\Image::make($image)->resize(400, 200)->save($image_url);
            $oldphoto = $request->oldphoto;
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data = [
                'photo' => $image_url,
            ];
        } else {
            $classname = $request->name;
            $class_slug = Str::slug($classname);
            $data = [
                'name' => $classname,
                'slug' => $class_slug,
                'description' => @$request->description,
                'features' => implode('$$', $request->features),
            ];
        }
        DB::table('gymclasses')->where('id', $dataid)->update($data);

        $notification = array(
            'setmessage' => "Class $datatype Updated Successfully",
            'alerttype' => 'success'
        );
        return redirect('gymclass')->with($notification);
    }

    public function delete_class_data($id) {
        $result = Gymclass::find($id);
        if (file_exists($result->photo)) {
            unlink($result->photo);
        }
        DB::table('gymclasses')->where('id', $id)->delete();
        $notification = array(
            'setmessage' => "Class Deleted Successfully",
            'alerttype' => 'success'
        );
        return redirect('gymclass')->with($notification);
    }

    //Admin Dashboard
    public function customerlist() {
        return view('customer.index', [
            'title' => 'GYM Member Info',
            'getweekdays' => DB::table('weekdays')->get(),
            'customerlist' => Customer::orderByRaw('id desc')->get()
        ]);
    }

    function view_membership_details(Request $request) {
        $id = $request->get('id');
        return view('customer.details', [
            'title' => 'View Membership Info',
            'memberinfo' => Customer::where('id', $id)->first(),
            'getdays' => Memberschedule::select('day')->distinct()->where('profile_id', $id)->get(),
            'gettrainers' => Memberschedule::select('trainer_id')->distinct()->where('profile_id', $id)->get(),
            'getpackagerecords' => Packagerecord::where('profile_id', $id)->orderBy('id', 'desc')->get(),
            'gympaymentstatus' => Payment::with('profile')->where('profile_id', $id)->orderBy('id', 'desc')->get(),
        ]);
    }

    function viewcustomerinfo(Request $request) {
        $id = $request->get('id');
        return view('customer.view', [
            'title' => 'View Membership Info',
            'customerlist' => Customer::where('id', $id)->first(),
        ]);
    }

    function reapprovedmember(Request $request) {
        $month = date('F-Y');
        $id = $request->get('id');
        Customer::where('id', $id)->update(['exmember' => 0, 'paid_month' => $month]);
        User::where('profile_id', $id)->update(['status' => 1]);

        $message = array(
            'setmessage' => "Profile Access Re Approved Successfully",
            'alerttype' => 'success'
        );
        return redirect('/customerlist')->with($message);
    }

    function exgymmemberstatus(Request $request) {
        $date = date('Y-m-d');
        $id = $request->get('id');
        Customer::where('id', $id)->update(['exmember' => 1, 'exmember_date' => $date]);
        $message = array(
            'setmessage' => "Profile Access Ex-Member Done Successfully",
            'alerttype' => 'success'
        );
        return redirect('/customerlist')->with($message);
    }

    function members_log_history(Request $request) {
        if (empty($request->get('date'))) {
            $date = date('Y-m-d');
        } else {
            $date = $request->get('date');
        }
        return view('customer.logs', [
            'title' => 'Log History',
            'loghistory' => Log::where('logdate', $date)->where('role_id', 3)->get(),
        ]);
    }

    function delete_member_access($id) {
        Customer::where('id', $id)->delete();
        User::where('profile_id', $id)->delete();
        Payment::where('profile_id', $id)->delete();
        Memberschedule::where('profile_id', $id)->delete();
        Gainloss::where('profile_id', $id)->delete();
        DB::table('member_reviews')->where('member_id', $id)->delete();
        DB::table('packagerecords')->where('profile_id', $id)->delete();
        DB::table('trainerrecords')->where('profile_id', $id)->delete();
        DB::table('workouttimes')->where('workout_by', $id)->delete();
        $message = array(
            'setmessage' => "Member Profile Deleted Successfully",
            'alerttype' => 'success'
        );
        return redirect('/customerlist')->with($message);
    }

    /*
     * *********************** Traniners**********************
     */

    //About Us
    public function gymtraniners() {
        return view('trainers.index', [
            'title' => 'Gym Traniners | Fithub - Gym & Fitness',
            'gymtraniners' => Trainer::all(),
            'getpresetdata' => Singledata::where('types', 'post')->orderBy('name', 'asc')->get(),
        ]);
    }

    public function savetraniner(Request $request) {
        $image = $request->file('photo');
        $imagename = 'bra' . date('dmi') . substr(md5(rand()), 0, 10);
        $ext = strtolower($image->getClientOriginalExtension());
        $imagefullname = $imagename . '.' . $ext;
        $uploadpath = 'public/trainer/';
        $image_url = $uploadpath . $imagefullname;
        \Intervention\Image\Facades\Image::make($image)->resize(350, 350)->save($image_url);

        $data = [
            'photo' => $image_url,
            'name' => $request->name,
            'post' => $request->post,
            'about' => $request->about,
            'skill' => implode('$$', $request->skill),
            'award' => implode('$$', $request->award),
            'joindate' => $request->joindate,
            'experience' => $request->experience,
            'contact' => $request->contact,
            'email' => $request->email,
            'social_link' => implode('$$', $request->link),
            'social_icon' => implode('$$', $request->icon),
        ];
        DB::table('traniners')->insert($data);
        $notification = array(
            'setmessage' => 'Trainer Info Saved Successfully',
            'alerttype' => 'success'
        );
        return redirect('gymtraniners')->with($notification);
    }

    public function edit_trainer_info(Request $request) {
        $id = $request->get('id');
        return view('trainers.edit', [
            'title' => 'Gym Traniners | Fithub - Gym & Fitness',
            'getpresetdata' => Singledata::where('types', 'post')->orderBy('name', 'asc')->get(),
            'gymtraniner' => Trainer::find($id),
        ]);
    }

    public function updatetraniner(Request $request) {
        $dataid = $request->dataid;
        $datatype = $request->datatype;
        if ($datatype == 'Photo') {
            $image = $request->file('photo');
            $imagename = 'bra' . date('dmi') . substr(md5(rand()), 0, 10);
            $ext = strtolower($image->getClientOriginalExtension());
            $imagefullname = $imagename . '.' . $ext;
            $uploadpath = 'public/trainer/';
            $image_url = $uploadpath . $imagefullname;
            \Intervention\Image\Facades\Image::make($image)->resize(350, 350)->save($image_url);
            $oldphoto = $request->oldphoto;
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data = [
                'photo' => $image_url,
            ];
        } else {
            $data = [
                'name' => $request->name,
                'post' => $request->post,
                'about' => $request->about,
                'skill' => implode('$$', $request->skill),
                'award' => implode('$$', $request->award),
                'joindate' => $request->joindate,
                'experience' => $request->experience,
                'contact' => $request->contact,
                'email' => $request->email,
                'social_link' => implode('$$', $request->link),
                'social_icon' => implode('$$', $request->icon),
            ];
        }
        DB::table('traniners')->where('id', $dataid)->update($data);

        $notification = array(
            'setmessage' => "Trainer $datatype Updated Successfully",
            'alerttype' => 'success'
        );
        return redirect('gymtraniners')->with($notification);
    }

    /*
     * ************************* Gym Packages ********************************
     */

    //Packages
    public function gympackages() {
        return view('packages.index', [
            'title' => 'Packages With Equipments | Fithub - Gym & Fitness',
            'getplandata' => Singledata::where('types', 'plan')->get(),
            'getequipmentdata' => Singledata::where('types', 'equipment')->orderBy('name', 'asc')->get(),
            'getpackage' => Package::orderBy('id', 'asc')->get(),
        ]);
    }

    //About Us
    public function view_package_equipments() {
        return view('packages.index', [
            'title' => 'Packages With Equipments | Fithub - Gym & Fitness',
            'getplandata' => Singledata::where('types', 'plan')->get(),
            'getequipmentdata' => Singledata::where('types', 'equipment')->orderBy('name', 'asc')->get(),
            'getpackage' => Package::orderBy('id', 'asc')->get(),
        ]);
    }

    public function saveupdate_package(Request $request) {
        $datafor = $request->datafor;
        $id = $request->dataid;
        if ($datafor == 'Saved') {
            foreach ($request->equipment as $key => $value) {
                $data = [
                    'plan_id' => $request->plan_id,
                    'equipment_id' => $request->equipment[$key],
                ];
                DB::table('packages')->insert($data);
            }
        } else {
            $data = [
                'plan_id' => $request->plan_id,
                'equipment_id' => $request->equipment,
            ];
            DB::table('packages')->where('id', $id)->update($data);
        }

        $notification = array(
            'setmessage' => "Package Info $datafor Successfully",
            'alerttype' => 'success'
        );
        return redirect('gympackages')->with($notification);
    }

    public function change_membership_package(Request $request) {
        $id = $request->get('nid');
        $for = $request->get('for');
        return view('packages.change', [
            'title' => 'Package Change Request | Fithub - Gym & Fitness',
            'nid' => $id,
            'packagerecord' => Packagerecord::with('profile')->where('id', $for)->first(),
        ]);
    }

    public function update_member_package(Request $request) {
        $nid = $request->nid;
        $upd_id = $request->upd_id;
        $cp_id = $request->cp_id;
        $data = [
            'package' => $request->newpackage,
            'packageamt' => $request->newamount,
        ];
        Customer::where('id', $cp_id)->update($data);
        Packagerecord::where('id', $upd_id)->update(['status' => 1]);
        Notification::where('id', $nid)->update(['status' => 1]);

        $notification = array(
            'setmessage' => "Package Request Updated Successfully",
            'alerttype' => 'success'
        );
        return redirect('admin')->with($notification);
    }

    public function change_membership_trainer(Request $request) {
        $id = $request->get('nid');
        $for = $request->get('for');
        return view('trainers.change', [
            'title' => 'Trainer Change Request | Fithub - Gym & Fitness',
            'nid' => $id,
            'trainerrecord' => Trainerrecord::with('profile')->where('id', $for)->first(),
        ]);
    }

    public function update_member_trainer(Request $request) {
        $nid = $request->nid;
        $upd_id = $request->upd_id;
        $cp_id = $request->cp_id;
        $data = [
            'trainer' => $request->new_trainer,
        ];
        Customer::where('id', $cp_id)->update($data);
        Trainerrecord::where('id', $upd_id)->update(['status' => 1]);
        Notification::where('id', $nid)->update(['status' => 1]);

        $notification = array(
            'setmessage' => "Trainer Request Updated Successfully",
            'alerttype' => 'success'
        );
        return redirect('admin')->with($notification);
    }

    /*
     * ****************************************************
     */

    public function weight_gain_loss() {
        $month = date('F-Y');
        return view('weight.index', [
            'title' => 'Weight Gain & Loss | Fithub - Gym & Fitness',
            'datatitle' => 'Weight Gain & Loss | Workout Summary (Entry By GYM Member)',
            'getmembers' => Customer::select('id', 'fname', 'lname', 'change_weight')->orderBy('id', 'asc')->get(),
            'workouttimes' => Workoutsummary::with('profile')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function update_weight_gain_loss(Request $request) {
        $profileid = $request->profile_id;
        $dayname = $wrokout_weight = $request->wrokout_weight;
        $day = date('l');
        $day_order = Universal::get_days_order($day);
        $data = [
            'profile_id' => $profileid,
            'initial_weight' => $request->initial_weight,
            'wrokout_weight' => $wrokout_weight,
            'gym_result' => $request->gym_result,
            'gym_status' => $request->gym_status,
            'report_date' => date('Y-m-d'),
            'dayname' => $day,
            'day_order' => $day_order,
            'report_month' => date('F-Y'),
        ];
        Gainloss::insert($data);
        Customer::where('id', $profileid)->update(['change_weight' => $wrokout_weight]);
        $notification = array(
            'setmessage' => "Daily Workout Status Saved Successfully",
            'alerttype' => 'success'
        );
        return redirect('weight_gain_loss')->with($notification);
    }

    public function delete_weight_gain_loss(Request $request) {
        $ids = explode('-', $request->get('ids'));
        $lastweight = $request->get('lastweight');
        Gainloss::where('id', $ids[0])->delete();
        Customer::where('id', $ids[1])->update(['change_weight' => $lastweight]);
        $notification = array(
            'setmessage' => "Workout Status Deleted Successfully",
            'alerttype' => 'success'
        );
        return redirect('weight_gain_loss')->with($notification);
    }

    //member_gym_payments
    public function member_gym_payments() {
        $month = date('F-Y');
        return view('payment.index', [
            'title' => 'GYM Payments Status | Fithub - Gym & Fitness',
            'getmembers' => Customer::select('id', 'fname', 'lname', 'memberidno', 'packageamt', 'due_amount')->orderBy('id', 'asc')->get(),
            'getmonths' => $this->months,
            'gympaymentstatus' => Payment::with('profile')->orderBy('id', 'desc')->get(),
//            'gympaymentstatus' => Payment::with('profile')->orderBy('id', 'desc')->where('paidmonth', $month)->get(),
        ]);
    }

    //gym_payment_update
    public function gym_payment_update(Request $request) {
        $profileid = $request->profile_id;
        $paid_month = $request->paid_month;
        $result = Payment::where('profile_id', $profileid)->where('paidmonth', $paid_month)->count();
        if ($result == 1) {
            $notification = array(
                'setmessage' => "Already Paid This Month",
                'alerttype' => 'error'
            );
            return redirect('member_gym_payments')->with($notification);
        }
        $due_amount = $request->due_amount;
        $data = [
            'profile_id' => $profileid,
            'amount' => $request->payable_amount,
            'paid' => $request->paid_amount,
            'due' => $request->due_amount,
            'ptype' => $request->paid_type,
            'paidmonth' => $paid_month,
        ];
        Payment::insert($data);
        Customer::where('id', $profileid)->update(['paid_month' => $paid_month, 'due_amount' => $due_amount]);
        $notification = array(
            'setmessage' => "Monthly Payment Paid Successfully",
            'alerttype' => 'success'
        );
        return redirect('member_gym_payments')->with($notification);
    }

    /*
     * **********************************************
     */

    public function allappointment() {
        return view('appointment.all', [
            'title' => 'Appointments',
            'appointments' => DB::table('appointments')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function view_new_appointment_info(Request $request) {
        $nid = $request->get('nid');
        $from = $request->get('from');
        return view('appointment.index', [
            'title' => 'View Appointment',
            'nid' => $nid,
            'appointment' => DB::table('appointments')->where('id', $from)->first(),
        ]);
    }

    public function feedbackmessage(Request $request) {
        $id = $request->dataid;
        $nid = $request->nid;
        $data = [
            'status' => 1,
            'replytime' => date('Y-m-d g:i A'),
            'mesreply' => $request->mesreply,
        ];
        DB::table('appointments')->where('id', $id)->update($data);
        DB::table('notifications')->where('id', $nid)->update(['status' => 1]);

        $notification = array(
            'setmessage' => "Message Feedback Successfully",
            'alerttype' => 'success'
        );
        return redirect('allappointment')->with($notification);
    }

    public function useraccess() {
        return view('settings.users', [
            'title' => 'Manage User Access',
            'authpower' => $this->power,
            'adminuseraccess' => User::orderBy('id', 'desc')->where('role_id', '!=', 3)->get(),
            'membersuseraccess' => User::orderBy('id', 'desc')->where('role_id', 3)->get(),
        ]);
    }

    public function check_duplicate_user(Request $request) {
        $value = $request->get('value');
        $result = User::where('username', $value)->first();
        if ($result) {
            if ($result->username == $value) {
                $message = "This User Already Exist !";
            }
        } else {
            $message = " ";
        }
        return $message;
    }

    public function save_user_access(Request $request) {
        $username = $request->username;
        $result = User::where('username', $username)->count();
        if ($result > 0) {
            $notification = array(
                'message' => 'This Username Already Exist',
                'alerttype' => 'waring'
            );
            return redirect('/useraccess')->with($notification);
        }
        $data = array(
            'name' => $request->name,
            'username' => $username,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        );
        User::insert($data);
        $notification = array(
            'setmessage' => 'New User Access Saved Successfully',
            'alerttype' => 'success',
        );
        return redirect('/useraccess')->with($notification);
    }

    public function manage_member_access($id, $value) {
        $message = $value == 1 ? 'Activated' : 'Deactivated';

        User::where('id', $id)->update(['status' => $value]);
        $notification = array(
            'setmessage' => "Member Access $message Successfully",
            'alerttype' => 'success',
        );
        return redirect('/useraccess')->with($notification);
    }

    public function update_user_access(Request $request) {
        $id = $request->userid;
        $status = $request->upstatus;
        if ($status == "Access") {
            $data = [
                'name' => $request->name,
                'status' => $request->status,
            ];
        } else {
            $data = [
                'password' => Hash::make($request->password),
            ];
        }
        User::where('id', $id)->update($data);
        $message = 'User ' . $status . ' Updated Successfully';
        $notification = array(
            'setmessage' => $message,
            'alerttype' => 'success',
        );
        return redirect('useraccess')->with($notification);
    }

    public function delete_user_access($id) {
        User::where('id', $id)->delete();
        $notification = array(
            'setmessage' => "User Access Deleted Successfully",
            'alerttype' => 'success',
        );
        return redirect('/useraccess')->with($notification);
    }

    /*
     * ******************* Diet Plan Chart **************************
     */

    public function diet_plan_chart() {
        return view('diet.index', [
            'title' => 'Manage Diet Plan Chart',
            'getcustomers' => Customer::where('profilestatus', 1)->get(),
            'getdietplantypes' => DB::table('singledata')->where('types', 'dietplan')->get(),
            'dietcharts' => Dietchart::with('member', 'dietplan')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function save_dietplan(Request $request) {
        $member_id = $request->member_id;
        $diet_plan_id = $request->diet_plan_id;
        $result = Dietchart::where('member_id', $member_id)->where('diet_plan_id', $diet_plan_id)->count();
        if ($result > 0) {
            $notification = array(
                'message' => 'This Diet Plan Already Exist For This Memeber',
                'alerttype' => 'waring'
            );
            return redirect('/useraccess')->with($notification);
        }
        $data = array(
            'member_id' => $member_id,
            'diet_plan_id' => $diet_plan_id,
            'early_morning' => $request->early_morning,
            'breakfast' => $request->breakfast,
            'mid_meal' => $request->mid_meal,
            'lunch' => $request->lunch,
            'before_workout' => $request->before_workout,
            'after_workout' => $request->after_workout,
            'dinner' => $request->dinner,
            'bed_time' => $request->bed_time,
        );
        DB::table('dietcharts')->insert($data);

        $notification = array(
            'setmessage' => 'Diet Plan Chart Saved Successfully',
            'alerttype' => 'success',
        );
        return redirect('/diet_plan_chart')->with($notification);
    }

    public function edit_diet_plan_chart($id) {
        return view('diet.edit', [
            'title' => 'Edit Diet Plan Chart',
            'getcustomers' => Customer::where('profilestatus', 1)->get(),
            'getdietplantypes' => DB::table('singledata')->where('types', 'dietplan')->get(),
            'dietchart' => Dietchart::where('id', $id)->first(),
        ]);
    }

    public function update_dietplan(Request $request) {
        $id = $request->data_id;
        $data = array(
            'member_id' => $request->member_id,
            'diet_plan_id' => $request->diet_plan_id,
            'early_morning' => $request->early_morning,
            'breakfast' => $request->breakfast,
            'mid_meal' => $request->mid_meal,
            'lunch' => $request->lunch,
            'before_workout' => $request->before_workout,
            'after_workout' => $request->after_workout,
            'dinner' => $request->dinner,
            'bed_time' => $request->bed_time,
        );
        DB::table('dietcharts')->where('id', $id)->update($data);
        $notification = array(
            'setmessage' => 'Diet Plan Chart Updated Successfully',
            'alerttype' => 'success',
        );
        return redirect('/diet_plan_chart')->with($notification);
    }
    public function delete_diet_plan_chart($id) {
        DB::table('dietcharts')->where('id', $id)->delete();
        $notification = array(
            'setmessage' => 'Diet Plan Chart Deleted Successfully',
            'alerttype' => 'success',
        );
        return redirect('/diet_plan_chart')->with($notification);
    }

    //Home Gallery
    public function manage_galleries() {
        return view('gallery.index', [
            'title' => 'Home Gallery | Fithub - Gym & Fitness',
            'getgalleries' => DB::table('galleries')->get()
        ]);
    }

    //Home Gallery Save
    public function save_home_gallery(Request $request) {
        $filelink = $request->file('filename');
        $filename = date('dmi') . substr(md5(rand()), 0, 10);
        $ext = strtolower($filelink->getClientOriginalExtension());
        $filefullname = $filename . '.' . $ext;
        $uploadpath = './public/gallery/';
        $filefulllink = $uploadpath . $filefullname;
        \Intervention\Image\Facades\Image::make($filelink)->resize(600, 600)->save($filefulllink);
        $data = [
            'title' => $request->title,
            'image' => 'public/gallery/' . $filefullname,
        ];
        DB::table('galleries')->insert($data);
        $notification = array(
            'setmessage' => "New Gallery Image Saved Successfully",
            'alerttype' => 'success'
        );
        return redirect('/manage_galleries')->with($notification);
    }

    public function change_home_gallery_status(Request $request) {
        $id = $request->get('id');
        $value = $request->get('value');
        if ($value == 1) {
            $setmessage = 'Gallery Published Successfully';
        } else {
            $setmessage = 'Gallery Upublished Successfully';
        }
        DB::table('galleries')->where('id', $id)->update(['status' => $value]);

        $notification = array(
            'setmessage' => $setmessage,
            'alerttype' => 'success'
        );
        return redirect('/manage_galleries')->with($notification);
    }

    //Home Gallery
    public function edit_gallery_info($id) {
        return view('gallery.edit', [
            'title' => 'Edit Gallery | Fithub - Gym & Fitness',
            'getgallery' => DB::table('galleries')->where('id', $id)->first()
        ]);
    }

    public function update_home_gallery(Request $request) {
        $task_id = $request->task_id;
        $task_type = $request->task_type;
        if ($task_type == 'Title') {
            $data = [
                'title' => $request->title,
            ];
        } else {
            $old_image = $request->old_image;
            $filelink = $request->file('filename');
            $filename = date('dmi') . substr(md5(rand()), 0, 10);
            $ext = strtolower($filelink->getClientOriginalExtension());
            $filefullname = $filename . '.' . $ext;
            $uploadpath = './public/gallery/';
            $filefulllink = $uploadpath . $filefullname;
            \Intervention\Image\Facades\Image::make($filelink)->resize(600, 600)->save($filefulllink);
            $data = [
                'image' => 'public/gallery/' . $filefullname,
            ];
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
        DB::table('galleries')->where('id', $task_id)->update($data);
        $notification = array(
            'setmessage' => "Gallery $task_type Updated Successfully",
            'alerttype' => 'success'
        );
        return redirect('/manage_galleries')->with($notification);
    }

    public function delete_home_gallery_image($id) {
        $getgallery = DB::table('galleries')->where('id', $id)->first();
        if (file_exists($getgallery->image)) {
            unlink($getgallery->image);
        }
        DB::table('galleries')->where('id', $id)->delete();
        $notification = array(
            'setmessage' => "Gallery Image Deleted Successfully",
            'alerttype' => 'success'
        );
        return redirect('/manage_galleries')->with($notification);
    }

}
