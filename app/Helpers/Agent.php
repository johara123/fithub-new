<?php

use Jenssegers\Agent\Facades\Agent;

//Get Browser Info
function ipaddress() {
//    return getHostByName(getHostName());
    return \Request::ip();
}

//Get Browser Info
function browser() {
    $browser = Agent::browser();
    $version = Agent::version($browser);
    return $browser . ' ' . $version;
}

//Get Platform Name
function platform() {
    $platform = Agent::platform();
    $version = Agent::version($platform);
    return $platform . ' ' . $version;
}

//Is Desktop
function device() {
    if (Agent::isDesktop() == 1) {
        return 'Desktop';
    }
    if (Agent::isTablet() == 1) {
        return 'Tablet';
    }
    if (Agent::isPhone() == 1) {
        return 'Phone';
    }
}

function activities($module, $action, $remarks, $profile) {
    $updata = [
        'module' => $module,
        'action' => $action,
        'remarks' => $remarks,
        'profile_id' => $profile,
        'actdate' => date('Y-m-d'),
        'actmonth' => date('F-Y'),
    ];
    DB::table('activities')->insert($updata);
}
