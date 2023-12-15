<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Singledata;
use App\Models\Gymclass;
use App\Models\Trainer;
use App\Models\Schedule;

class SettingController extends Controller {

    public $user;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()) {
                return redirect('/');
            } else {
                $this->user = Auth::user()->id;
            }
            return $next($request);
        });
    }

    public function presetdata($value) {
        return view('settings.index', [
            'title' => 'Preset Data of ' . ucwords($value),
            'datatype' => $value,
            'getpresetdata' => Singledata::where('types', $value)->orderBy('name', 'asc')->get(),
        ]);
    }

    public function saveupdate_presetdata(Request $request) {
        $datatype = $request->datatype;
        $datafor = $request->datafor;
        $id = $request->dataid;
        if ($datafor == 'Saved') {
            foreach ($request->dataname as $key => $value) {
                $data = [
                    'name' => $request->dataname[$key],
                    'types' => $datatype,
                    'extra' => $request->extradata[$key],
                ];
                DB::table('singledata')->insert($data);
            }
        } else {
            $data = [
                'name' => $request->dataname,
                'types' => $datatype,
                'extra' => $request->extradata,
            ];
            DB::table('singledata')->where('id', $id)->update($data);
        }

        $notification = array(
            'setmessage' => ucwords($datatype) . " $datafor Successfully",
            'alerttype' => 'success'
        );
        return redirect('presetdata/' . $datatype)->with($notification);
    }

    public function get_single_presetdata(Request $request) {
        $id = $request->get('id');
        $result = DB::table('singledata')->where('id', $id)->first();
        return response()->json($result);
    }

    public function delete_setting_data(Request $request) {
        $id = $request->get('id');
        $datatype = $request->get('type');
        DB::table('singledata')->where('id', $id)->delete();
        $notification = array(
            'setmessage' => ucwords($datatype) . " Deleted Successfully",
            'alerttype' => 'success'
        );
        return redirect('presetdata/' . $datatype)->with($notification);
    }

    public function schedules() {
        $schedule = Schedule::with('class', 'trainer')->get();
        return view('schedule.index', [
            'title' => 'GYM Schedules | Fithub - Gym & Fitness',
            'getgymtimes' => Singledata::where('types', 'time')->get(),
            'getgymclass' => Gymclass::get(),
            'gettrainers' => Trainer::get(),
            'getweekdays' => DB::table('weekdays')->get(),
            'getschedules' => $schedule,
        ]);
    }

    public function makeschedule(Request $request) {
        $day = $request->day;
        $result = DB::table('schedules')->where('day', $day)->count();
        if ($result >= 6) {
            $notification = array(
                'setmessage' => "Can Not Save More Then Six Data",
                'alerttype' => 'error'
            );
            return redirect('gymschedules')->with($notification);
        }

        foreach ($request->class_id as $key => $value) {
            $data = [
                'day' => $request->day,
                'time' => $request->time[$key],
                'class_id' => $request->class_id[$key],
                'trainer_id' => $request->trainer_id[$key],
            ];
            Schedule::insert($data);
        }

        $notification = array(
            'setmessage' => "Schedules Created Successfully",
            'alerttype' => 'success'
        );
        return redirect('gymschedules')->with($notification);
    }

    public function get_schedule_data(Request $request) {
        $id = $request->get('id');
        $result = DB::table('schedules')->where('id', $id)->first();
        return response()->json($result);
    }

    public function updateschedule(Request $request) {
        $id = $request->dataid;
        $data = [
            'time' => $request->time,
            'class_id' => $request->class_id,
            'trainer_id' => $request->trainer_id,
        ];
        DB::table('schedules')->where('id', $id)->update($data);

        $notification = array(
            'setmessage' => "Schedule Updated Successfully",
            'alerttype' => 'success'
        );
        return redirect('gymschedules')->with($notification);
    }

}
