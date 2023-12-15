<?php
$profileid = Auth::user()->profile_id;
$result = DB::table('customers')->where('id', $profileid)->where('exmember', 1)->first();
?>
<li id="dashboard"><a href="{{URL::to('member')}}"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
<li id="gymprofile"><a href="{{URL::to('gymprofile')}}"><i class="fa fa-shield"></i><span> Profile</span></a></li>
<li id="gymmemschedule"><a href="{{URL::to('gymmemschedule')}}"><i class="fa fa-clock-o"></i><span> Class Schedule</span></a></li>
<li id="gympackages"><a href="{{URL::to('member_packages')}}"><i class="fa fa-cubes"></i><span> Packages</span></a></li>
<li id="gymtrainers"><a href="{{URL::to('member_gym_trainers')}}"><i class="fa fa-users"></i><span> Trainers</span></a></li>
<li id="weight_gain_loss"><a  href="{{URL::to('member_weight_gain_loss')}}"><i class="fa fa-balance-scale"></i><span> Gain & Loss</span></a></li>
<li id="gympaymentstatus"><a href="{{URL::to('gympaymentstatus')}}"><i class="fa fa-paypal"></i><span> Payment Status</span></a></li>
<li id="diet_plan_chart"><a  href="{{URL::to('diet_plan_chart')}}"><i class="fa fa-table"></i><span> Diet Plan Chart</span></a></li>

@if(@$result->exmember==1)
<li id="reviewcorner"><a href="{{URL::to('reviewcorner')}}"><i class="fa fa-commenting-o"></i><span> Review Corner</span></a></li>
@endif
