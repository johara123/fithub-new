<li id="dashboard"><a href="{{URL::to('admin')}}"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
<li id="homebanner"><a  href="{{URL::to('homebanner')}}"><i class="fa fa-image"></i><span> Home Banner</span></a></li>
<li id="aboutus"><a  href="{{URL::to('aboutus')}}"><i class="fa fa-users"></i><span> About Us</span></a></li>
<li id="gympackages"><a  href="{{URL::to('gympackages')}}"><i class="fa fa-money"></i><span> Packages</span></a></li>
<li id="gymclass"><a  href="{{URL::to('gymclass')}}"><i class="fa fa-cubes"></i><span> Classes</span></a></li>
<li id="gymschedules"><a  href="{{URL::to('gymschedules')}}"><i class="fa fa-clock-o"></i><span> Schedule</span></a></li>
<li id="gymtraniners"><a  href="{{URL::to('gymtraniners')}}"><i class="fa fa-user-secret"></i><span> Trainers</span></a></li>
<!--<li id="contactus"><a  href="{{URL::to('contactus')}}"><i class="fa fa-address-book"></i><span> Contact Us</span></a></li>-->
<li id="customerlist"><a  href="{{URL::to('customerlist')}}"><i class="fa fa-users"></i><span> Membership</span></a></li>
<li id="weight_gain_loss"><a  href="{{URL::to('weight_gain_loss')}}"><i class="fa fa-balance-scale"></i><span> Gain & Loss</span></a></li>
<li id="allappointment"><a  href="{{URL::to('allappointment')}}"><i class="fa fa-table"></i><span> Appointments</span></a></li>
<li id="member_gym_payments"><a  href="{{URL::to('member_gym_payments')}}"><i class="fa fa-paypal"></i><span> Payments</span></a></li>
<li id="diet_plan_chart"><a  href="{{URL::to('diet_plan_chart')}}"><i class="fa fa-table"></i><span> Diet Plan Chart</span></a></li>
<li id="manage_galleries"><a  href="{{URL::to('manage_galleries')}}"><i class="fa fa-image"></i><span> Gallery</span></a></li>
<li id="settings" class="treeview">
    <a href="javascript:void(0)">
        <i class="fa fa-gears"></i> <span>Settings</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li id="sub_systemmail"><a href="<?= URL::to('presetdata/email') ?>"><i class="fa fa-circle-o"></i> System Email</a></li>
        <li id="sub_post"><a href="<?= URL::to('presetdata/post') ?>"><i class="fa fa-circle-o"></i> Trainer Post</a></li>
        <li id="sub_package"><a href="<?= URL::to('presetdata/plan') ?>"><i class="fa fa-circle-o"></i> Plan</a></li>
        <li id="sub_equipment"><a href="<?= URL::to('presetdata/equipment') ?>"><i class="fa fa-circle-o"></i> Equipments</a></li>
        <li id="sub_time"><a href="<?= URL::to('presetdata/time') ?>"><i class="fa fa-circle-o"></i> Times</a></li>
        <li id="sub_dietplan"><a href="<?= URL::to('presetdata/dietplan') ?>"><i class="fa fa-circle-o"></i> Diet Plan</a></li>
    </ul>
</li>
<li id="useraccess"><a  href="{{URL::to('useraccess')}}"><i class="fa fa-key"></i><span> User Access</span></a></li>
<li id="members_log_history"><a  href="{{URL::to('members_log_history')}}"><i class="fa fa-clock-o"></i><span> Log History</span></a></li>
<li><a href="{{URL::to('/')}}" target="_blank"><i class="fa fa-globe"></i><span> Go To Site</span></a></li>
