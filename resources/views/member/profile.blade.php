@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1><?= $title ?></h1>
</section>
<?php
if (empty($profile->photo)) {
    $photodata = url('/') . '/' . 'public/images/placeholder.png';
} else {
    $photodata = url('/') . '/' . $profile->photo;
}
?>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?= $photodata ?>" alt="User profile picture">
                    <h3 class="profile-username text-center"><?= $profile->fname ?> <?= $profile->lname ?></h3><br>
                    <!--<p class="text-muted text-center">Software Engineer</p>-->
                    <!--                    <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Followers</b> <a class="pull-right">1,322</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Following</b> <a class="pull-right">543</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Friends</b> <a class="pull-right">13,287</a>
                                            </li>
                                        </ul>-->
                    <a href="javascript:void(0)" id="editPhoto" style="float: right"><i class="fa fa-edit"></i> Edit</a>

                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    <li><a href="#editProfile" data-toggle="tab">Edit Profile</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <table class="table table-bordered" style="">
                            <tr>
                                <td><span style=""><b>Membership ID</b> :</span></td>
                                <td><span style=""><?= $profile->memberidno ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Gender</b> :</span></td>
                                <td><span style=""><?= $profile->gender ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Email Address</b> :</span></td>
                                <td><span style=""><?= $profile->email ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Contact Number</b> :</span></td>
                                <td><span style=""><?= $profile->contact ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Occupation</b> :</span></td>
                                <td><span style=""><?= $profile->occupation ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Weight</b> :</span></td>
                                <td><span style=""><?= $profile->weight ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Reason</b> :</span></td>
                                <td><span style=""><?= $profile->reason ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Package</b> :</span></td>
                                <td><span style=""><?= $profile->package ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Package Amount</b> :</span></td>
                                <td><span style=""><?= $profile->packageamt ?> BDT</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a><i class="fa fa-edit"></i> Edit</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="settings">
                        <table class="table table-bordered" style="">
                            <tr>
                                <td><span style=""><b>Username</b> :</span></td>
                                <td><span style=""><?= $profile->user->username ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Password</b> :</span></td>
                                <td><span style="">*******************</span></td>
                            </tr>
                            <tr>
                                <td><span style=""></span></td>
                                <td><span style=""><a href="javascript:void(0)" id="editAccess"><i class="fa fa-edit"></i> Edit</a></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="editProfile">
                        <form action="{{route('updateprofiledata')}}" method="post" name="getformdata">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <lebel>First Name <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="fname" type="text" oninput="textOnly(this.id);" id="fname" maxlength="22" class="form-control inputnumber" value="<?= $profile->fname ?>" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <lebel>Last Name <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="lname" type="text" oninput="textOnly(this.id);" id="lname" maxlength="22" class="form-control inputnumber" value="<?= $profile->lname ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <lebel>Email Address <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="email" id="getmailaddress" type="text" class="form-control inputnumber"  pattern="[^ @]*@[^ @]*" value="<?= $profile->email ?>" required="">
                                    </div>
                                    <span style="float: left;margin-left: 10px;color:red" id="setexception"></span>
                                </div>
                                <div class="col-md-6">
                                    <lebel>Contact Number <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="contact" type="text" oninput="numberOnly(this.id);" id="contact" maxlength="11" class="form-control inputnumber" value="<?= $profile->contact ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <lebel>Present Address <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="address" type="text" class="form-control inputnumber" value="<?= $profile->address ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <lebel>Gender <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <select name="gender" class="form-control inputnumber" required="">
                                            <option value="" disabled selected>Select Gender **</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>                  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lebel>Occupation <span style="color:red">*</span></lebel>
                                        <select name="occupation" class="form-control inputnumber" required="">
                                            <option value="" disabled selected>Select Occupation **</option>
                                            <option value="Service">Service</option>
                                            <option value="Student">Student</option>
                                            <option value="Businessman">Businessman</option>
                                            <option value="Housewife">House Wife</option>
                                            <option value="Other">Other</option>
                                        </select>                 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <lebel>Height <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="height" type="text" class="form-control inputnumber" value="<?= $profile->height ?>" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <lebel>Last Name <span style="color:red">*</span></lebel>
                                    <div class="form-group">
                                        <input name="weight" type="text" class="form-control inputnumber" value="<?= $profile->weight ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lebel>Reason <span style="color:red">*</span></lebel>
                                        <select name="reason" class="form-control inputnumber" required="">
                                            <option value="" disabled selected>Why do you need GYM? **</option>
                                            <option value="Weight Loss">Weight Loss</option>
                                            <option value="Weight Gain">Weight Gain</option>
                                            <option value="Body Fit">Body Fit</option>
                                        </select>                 
                                    </div>
                                </div>
                            </div><br>
                            <center>
                                <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-primary" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                            </center>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="photoModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border:5px solid #3c8dbc">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Update User Access</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('updatephoto')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <label>Change Photo <span style="color: red">* (200x200 px)</span></label>
                            <div class="form-group">
                                <input type="hidden" name="oldphoto" value="{{$photodata}}">
                                <input type="file" name="photodata" class="form-control inputnumber" onchange="readURL(this);" required="">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <img style="width:200px;height:200px" src="<?= $photodata ?>" id="blah">
                        </div>
                    </div><br>
                    <div style="text-align: center">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" id="submeetButton" onclick="return confirm('Are you sure ?')" class="btn btn-primary user-submit-form" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Update</button>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border:5px solid #3c8dbc">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Update User Access</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('updatesettingdata')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="username" id="setUsername" value="<?= $profile->user->username ?>">
                            <label>Username <span style="color: red">*</span> <span style="margin-left:100px"><input type="checkbox" value="Y" name="change" id="get_username"> Change</span></label>
                            <div class="form-group">
                                <input type="text" class="form-control inputnumber" value="<?= $profile->user->username ?>" readonly="">
                            </div> 
                        </div>
                        <div class="col-md-6" id="showUserbox" style="display: none">
                            <label>Username <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" id="getUsername" class="form-control inputnumber needusername">
                                <span id="setalert" style="color: red"></span>
                            </div> 
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Password<span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="password" id="getPassword" name="password" class="form-control inputnumber" required="">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <label>Confirm Password<span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="password" id="confirmPassword" class="form-control inputnumber" required="">
                                <span id="checkPasswordMatch" style="color: red"></span>
                            </div> 
                        </div>
                    </div><br>
                    <div style="text-align: center">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" id="submeetButton" onclick="return confirm('Are you sure ?')" class="btn btn-primary user-submit-form" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Update</button>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '#editPhoto', function () {
            $("#photoModal").modal('show');
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script> 
<script>
    $(document).ready(function () {
        $(document).on('click', '#editAccess', function () {
            $("#addModal").modal('show');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#get_username', function () {
            if ($(this).is(':checked')) {
                $('#showUserbox').show();
                $('.needusername').prop('required', true);
            } else {
                $('#showUserbox').hide();
                $('.needusername').prop('required', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('body').on('blur', '#getUsername', function () {
            var value = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("check_duplicate_usernamer")}}',
                data: {value: value},
                async: false,
                dataType: 'text',
                success: function (data) {
                    if (data === '1') {
                        $('#setalert').html("This User Already Exist !");
                        $('#submeetButton').hide();
                    } else {
                        $('#setalert').html('');
                        $('#submeetButton').show();
                        $('#setUsername').val(value);
                    }
                },
                error: function () {
                    alert('Something is wrong !');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#confirmPassword").on('keyup', function () {
            var password = $("#getPassword").val();
            var confirmPassword = $(this).val();
            if (confirmPassword) {
                if (password !== confirmPassword) {
                    $("#checkPasswordMatch").html("Password does not match !").css("color", "red");
                    $('#submeetButton').hide();
                } else {
                    $("#checkPasswordMatch").html("Password match !").css("color", "green");
                    $('#submeetButton').show();
                }
            } else {
                $("#checkPasswordMatch").html(" ");
                $('#submeetButton').show();
            }
        });
    });
</script>
<script>
    function textOnly(id) {
        // Only Capital or Small Chracters will write
        var element = document.getElementById(id);
        var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
        element.value = element.value.replace(regex, "");
    }
    function numberOnly(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
    function subjectOnly(id) {
        // Only Capital or Small Chracters will write
        var element = document.getElementById(id);
        var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
<script>
    document.forms['getformdata'].elements['gender'].value = '<?= $profile->gender ?>';
    document.forms['getformdata'].elements['occupation'].value = '<?= $profile->occupation ?>';
    document.forms['getformdata'].elements['reason'].value = '<?= $profile->reason ?>';
</script>
<script>
    $(document).ready(function () {
        $('#gymprofile').addClass('active');
    });
</script>
@endsection