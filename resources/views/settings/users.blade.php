@extends('layouts.app')
@section('title','Users')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Manage User Access</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add New User</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body tableborder">
                    <form method="post" action="{{ route('save_user_access') }}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control inputtext" placeholder="Enter Full Name" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Username  <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="username" id="getUsername" class="form-control inputnumber" placeholder="Enter Unique Username" required="">
                                    <span style="color: red;position: relative;left: 5px;top: 10px;" id="setwarning"></span>
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
                                    <span id="checkPasswordMatch"></span>
                                </div> 
                            </div>
                        </div><br>
                        <div style="text-align: center">
                            <button type="submit" id="submeetButton" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Save</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="box tableborder">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Members Access</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Admin Access</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped getTable">
                                        <thead>
                                            <tr class="tableheader">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Name</th>
                                                <th style="text-align: center">Username</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($membersuseraccess as $value) {
                                                ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $i ?></td>
                                                    <td style="text-align: center"><?= $value->name ?></td>
                                                    <td style="text-align: center"><?= $value->username ?></td>
                                                    <?php if ($value->status == 1) { ?>
                                                        <td style="text-align: center"><span style="border-radius:10px;background: green;color: #fff;padding: 5px">Active</span></td>
                                                    <?php } else { ?>
                                                        <td style="text-align: center"><span style="border-radius:10px;background: red;color: #fff;padding: 5px">Inactive</span></td>
                                                    <?php } ?>
                                                    <td style="text-align: center">    
                                                        <?php if ($value->status == 1) { ?>
                                                            <button class="btn btn-o btn-primary managamemberccess" style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="0" data-toggle="tooltip" title="Inactive"><i class="fa fa-lock"></i></button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-o btn-danger managamemberccess" style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="1" data-toggle="tooltip" title="Active"><i class="fa fa-unlock"></i></button>
                                                        <?php } ?>
                                                        <?php if ($authpower == 1) { ?>
                                                            <!--<button class="btn btn-o btn-danger manageuserAccess"  style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="Delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>-->
                                                        <?php } ?>                                                     </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped getTable">
                                        <thead>
                                            <tr class="tableheader">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Name</th>
                                                <th style="text-align: center">Username</th>
                                                <th style="text-align: center">Role</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($adminuseraccess as $value) {
                                                ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $i ?></td>
                                                    <td style="text-align: center"><?= $value->name ?></td>
                                                    <td style="text-align: center"><?= $value->username ?></td>
                                                    <td style="text-align: center"><?= $value->role->role ?></td>
                                                    <?php if ($value->status == 1) { ?>
                                                        <td style="text-align: center"><span style="border-radius:10px;background: green;color: #fff;padding: 5px">Active</span></td>
                                                    <?php } else { ?>
                                                        <td style="text-align: center"><span style="border-radius:10px;background: red;color: #fff;padding: 5px">Inactive</span></td>
                                                    <?php } ?>
                                                    <td style="text-align: center">      
                                                            <button class="btn btn-o btn-info edituseraccess"  style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="<?= $value->name ?>=<?= $value->status ?>" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-o btn-danger deleteuseraccess"  style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="Delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="updateModal">
    <div class="modal-dialog">
        <div class="modal-content tableborder">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Update User Access Info</h3>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#accessTab" class="updateDatatype" id="Info" data-toggle="tab">Access</a></li>
                        <li><a href="#passwordTab" class="updateDatatype" id="Password" data-toggle="tab">Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="accessTab">
                            <form method="post" action="{{route('update_user_access')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <input type="hidden" name="userid" class="setuseid">
                                    <input type="hidden" name="upstatus" class="setupstatus" value="Access">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="setname" class="form-control inputtext" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Access Status</label>
                                        <div class="form-group">
                                            <select name="status" id="setstatus" class="form-control inputnumber" required="">
                                                <option value=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <div style="text-align: center">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Updated</button>
                                </div>  
                            </form>
                        </div>
                        <div class="tab-pane" id="passwordTab">
                            <form method="post" action="{{route('update_user_access')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="userid" class="setuseid">
                                <input type="hidden" name="upstatus" value="Password">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Password<span style="color: red">*</span></label>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control inputnumber getPassword" required="">
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirm Password<span style="color: red">*</span></label>
                                        <div class="form-group">
                                            <input type="password" class="form-control inputnumber confirmPassword" required="">
                                            <span class="checkPasswordMatch"></span>
                                        </div> 
                                    </div>
                                </div><br>
                                <div style="text-align: center">
                                    <button type="submit" class="btn btn-primary submeetButton" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Updated</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('blur', '#getUsername', function () {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("check_duplicate_user")}}',
                    data: {value: value},
                    dataType: 'text',
                    success: function (data) {
                        $('#setwarning').html(data);
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            }
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
    $(document).ready(function () {
        $('body').on('click', '.managamemberccess', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            swal({
                title: "Are you sure ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(window.location.href = "{{URL::to('manage_member_access')}}" + '/' + id + '/' + value);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('body').on('click', '.edituseraccess', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            var getvalues = value.split('=');
            $(".setuseid").val(id);
            $("#setname").val(getvalues[0]);
            $("#setstatus").val(getvalues[1]);
            $("#updateModal").modal('show');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".confirmPassword").on('keyup', function () {
            var password = $(".getPassword").val();
            var confirmPassword = $(this).val();
            if (confirmPassword) {
                if (password !== confirmPassword) {
                    $(".checkPasswordMatch").html("Password does not match !").css("color", "red");
                    $('.submeetButton').hide();
                } else {
                    $(".checkPasswordMatch").html("Password match !").css("color", "green");
                    $('.submeetButton').show();
                }
            } else {
                $(".checkPasswordMatch").html(" ");
                $('.submeetButton').show();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('body').on('click', '.deleteuseraccess', function () {
            var id = $(this).attr('id');
            swal({
                title: "Are you sure ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(window.location.href = "{{URL::to('delete_user_access')}}" + '/' + id);
                } else {
                    swal("Cancelled");
                }
            });

        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#useraccess").addClass('active');
    });
</script>
@endsection