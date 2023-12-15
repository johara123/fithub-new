<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRegistrationMail;
use App\Models\User;
use App\Models\Singledata;
use App\Models\Customer;
use App\Models\Company;
use App\Models\Gymclass;
use App\Models\Trainer;
use App\Models\Notification;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Reviewcorner;

class FrontendController extends Controller {

    //Home Page Load
    public function index() {
        return view('frontend.home', [
            'title' => 'Fithub - Gym & Fitness',
            'homebanners' => DB::table('homebanners')->where('status', 1)->first(),
            'companyprofile' => Company::first(),
            'gymclasses' => Gymclass::all(),
            'gymtraniners' => Trainer::where('status', 1)->get(),
            'getplandata' => Singledata::where('types', 'plan')->get(),
            'getsystemmail' => Singledata::where('types', 'email')->first(),
            'getgymtimes' => Singledata::where('types', 'time')->get(),
            'getweekdays' => DB::table('weekdays')->get(),
        ]);
    }

    //GYM About Us
    public function aboutus() {
        return view('frontend.aboutus', [
            'title' => 'About Us | Fithub - Gym & Fitness',
            'companyprofile' => Company::first(),
        ]);
    }

    //GYM Class
    public function classes() {
        return view('frontend.class.index', [
            'title' => 'GYM Classes | Fithub - Gym & Fitness',
            'gymclasses' => Gymclass::all(),
        ]);
    }

    //GYM Classes
    public function gym_class($value) {
        $result = Gymclass::where('slug', $value)->count();
        if ($result == 0) {
            $notification = array(
                'setmessage' => 'Invalid URL Access!',
                'alerttype' => 'error'
            );
            return redirect('/')->with($notification);
        }
        return view('frontend.class.view', [
            'title' => 'View GYM Class | Fithub - Gym & Fitness',
            'gymclasse' => Gymclass::where('slug', $value)->first(),
        ]);
    }


    //GYM Class
    public function schedules() {
        return view('frontend.schedule.index', [
            'title' => 'Classe Schedules| Fithub - Gym & Fitness',
            'getgymtimes' => Singledata::where('types', 'time')->get(),
            'getweekdays' => DB::table('weekdays')->get(),
        ]);
    }
    
    //GYM Classes
    public function view_class_schedule($value) {
        $result = Schedule::where('id', $value)->count();
        if ($result == 0) {
            $notification = array(
                'setmessage' => 'Invalid URL Access!',
                'alerttype' => 'error'
            );
            return redirect('/')->with($notification);
        }
        return view('frontend.schedule.view', [
            'title' => 'View Class Schedule | Fithub - Gym & Fitness',
            'gymclasse' => Schedule::where('id', $value)->first(),
        ]);
    }

    //GYM Trainers
    public function trainers() {
        return view('frontend.trainer.index', [
            'title' => 'GYM Trainers | Fithub - Gym & Fitness',
            'gymtraniners' => Trainer::where('status', 1)->get(),
        ]);
    }

    //GYM Trainers
    public function view_trainer_info(Request $request) {
        $id = $request->get('id');
        return view('frontend.trainer.view', [
            'title' => 'GYM Trainers | Fithub - Gym & Fitness',
            'gymtraniner' => Trainer::where('id', $id)->first(),
        ]);
    }

    //GYM Packages
    public function packages() {
        return view('frontend.package.index', [
            'title' => 'GYM packages | Fithub - Gym & Fitness',
            'getplandata' => Singledata::where('types', 'plan')->get(),
        ]);
    }

    //Contact Us
    public function contactus() {
        return view('frontend.contactus', [
            'title' => 'Contact Us | Fithub - Gym & Fitness',
        ]);
    }

    //Registration
    public function registration(Request $request) {
        $plan = $request->get('plan');
        return view('frontend.registration', [
            'title' => 'Member Registration | Fithub - Gym & Fitness',
            'plan' => $plan,
            'getsystemmail' => Singledata::where('types', 'email')->first(),
            'plandata' => Singledata::where('id', $plan)->first(),
            'getplandata' => Singledata::where('types', 'plan')->get(),
            'gymtraniners' => Trainer::where('status', 1)->get(),
        ]);
    }

    public function check_duplicate_mailaddress(Request $request) {
        $email = $request->get('value');
        $result = Customer::where('email', $email)->count();
        return $result;
    }

    public function check_exist_emailaddress(Request $request) {
        $email = $request->get('value');
        $result = Appointment::where('email', $email)->count();
        return $result;
    }

    public function check_duplicate_username(Request $request) {
        $value = $request->get('value');
        $result = User::where('username', $value)->count();
        return $result;
    }

    //new Registration
    public function newregistration(Request $request) {
        $lastmeberidno = Customer::select('memberidno')->orderBy('id', 'desc')->first();
        if (empty(@$lastmeberidno->memberidno)) {
            $getresresult = "GYM01";
        } else {
            $resresult = explode('GYM0', @$lastmeberidno->memberidno);
            $number_res = $resresult[1] + 1;
            $getresresult = 'GYM0' . $number_res;
        }
        $paymethod = $request->paymethod;
        $systemmail = $request->systemmail;
        $fullname = $request->fname . ' ' . $request->lname;
        $data = [
            'memberidno' => $getresresult,
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
            'package' => $request->package,
            'packageamt' => $request->packageamt,
            'trainer' => $request->trainer,
            'addmonth' => date('F-Y'),
            'change_weight' => $request->weight,
            'paymethod' => $paymethod,
        ];

        try {
            $lastid = Customer::insertGetId($data);
        } catch (Exception $exc) {
            $error = $exc->getTraceAsString;
            $notification = array(
                'setmessage' => $error,
                'alerttype' => 'error'
            );
            return redirect('/registration')->with($notification);
        }


        User::create([
            'name' => $fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 3,
            'profile_id' => $lastid,
            'status' => 0,
        ]);
        $notidata = [
            'name' => $fullname,
            'from' => $lastid,
            'reason' => 'New Membership Request',
            'type' => 'registration',
            'for' => 0,
            'route' => 'view_new_registration_info',
        ];
        Notification::insert($notidata);

//        $sendmail = new SendRegistrationMail($data);
//        Mail::to($systemmail)->send($sendmail);

        if ($paymethod == 'Online') {
            $request->session()->put($data);
            return redirect('/onlinepayment');
        } else {
            $notification = array(
                'setmessage' => 'Your Request Sent successfully',
                'alerttype' => 'success'
            );
            return redirect('/')->with($notification);
        }
    }

    public function onlinepayment() {
        if (empty(Session::get('memberidno'))) {
            $notification = array(
                'setmessage' => 'Session is Expired!',
                'alerttype' => 'error'
            );
            return redirect('/')->with($notification);
        }
        return view('frontend.onlinepay', [
            'title' => 'Pay Online Payment | Fithub - Gym & Fitness',
        ]);
    }

    public function paymentstatus() {
        return view('frontend.paystatus', [
            'title' => 'Payment Status | Fithub - Gym & Fitness',
        ]);
    }

    //new Registration
    public function getappointment(Request $request) {
        $email = $request->email;
        $inputNumber = $request->contact;
        $result = Appointment::where('email', $email)->count();
        if ($result == 1) {
            $notification = array(
                'setmessage' => "This Email Address Already Exist!",
                'alerttype' => 'error',
            );
            return redirect('/#contactus')->with($notification);
        }
        $pattern = '/^01\d*$/';

        if (preg_match($pattern, $inputNumber)) {
            
        } else {
            $notification = array(
                'setmessage' => "Number should start with 01 and max length 11",
                'alerttype' => 'error',
            );
            return redirect('/#contactus')->with($notification);
        }

        $systemmail = $request->systemmail;
        $fullname = $request->fullname;
        $data = [
            'name' => $fullname,
            'email' => $request->email,
            'contact' => $request->contact,
            'location' => $request->location,
            'message' => $request->message,
        ];
        $lastid = Appointment::insertGetId($data);
        $notidata = [
            'name' => $fullname,
            'from' => $lastid,
            'reason' => 'New Appointment Request',
            'type' => 'appointment',
            'for' => 0,
            'route' => 'view_new_appointment_info',
        ];
        Notification::insert($notidata);

        $notification = array(
            'setmessage' => "Appointment Reqquest Sent Successfully",
            'alerttype' => 'success',
        );
        return redirect('/#contactus')->with($notification);
    }

    //Ex-Gym Members
    public function exmembers() {
        return view('frontend.exmembers.index', [
            'title' => 'Former Members | Fithub - Gym & Fitness',
            'getcustomers' => Customer::where('exmember', 1)->get(),
        ]);
    }

    //Ex-Gym Members
    public function exmember_review(Request $request) {
        $id = $request->get('id');
        $count = Reviewcorner::where('member_id', $id)->count();
        if ($count == 0) {
            $notification = array(
                'setmessage' => "Former Member Reviews Not Found!",
                'alerttype' => 'error',
            );
            return redirect('/exmembers')->with($notification);
        }

        return view('frontend.exmembers.view', [
            'title' => 'Former Members | Fithub - Gym & Fitness',
            'getmemberinfo' => Customer::where('id', $id)->first(),
            'getreviewcorner' => Reviewcorner::where('member_id', $id)->first(),
        ]);
    }
    
    //Home Gallery
    public function galleries() {
        return view('frontend.gallery', [
            'title' => 'Home Gallery | Fithub - Gym & Fitness',
            'getgalleries' => DB::table('galleries')->orderBy('id', 'desc')->where('status', 1)->get()
        ]);
    }


}
