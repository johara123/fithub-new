@extends('layouts.app')
@section('title','Profile')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Update About Us Information </h1>
</section>
<section class="content animated fadeInRight">
    <div class="box tableborder">
        <div class="box-body">
            <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <h3 style="color: #000"><i class="fa fa-photo"></i> Photo <i class="fa fa-arrow-down"></i></h3>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <img style="width:480px;height: 180px" src="{{URL::to($companyprofile->profphoto)}}" id="blah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Change About Us Photo <span style="color: red;font-weight: bold">*</span></h3>
                                        </div>
                                        <form method="post" enctype="multipart/form-data" action="{{ route('update_aboutus') }}">
                                            {{csrf_field()}}
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="updateto" value="photo">
                                                    <input type="hidden" name="oldimagelink" value="{{$companyprofile->profphoto}}">
                                                    <input type="file" class="form-control" name="imagedata" onchange="readURL(this);" required="">
                                                </div>
                                            </div>
                                            <div class="box-footer pull-right">
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle-o"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <h3 style="color: #000"><i class="fa fa-file-text-o"></i> Info <i class="fa fa-arrow-down"></i></h3>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body" style="text-align: justify">
                            <form method="post" action="{{ route('update_aboutus') }}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control inputnumber" name="hometitle" value="{{$companyprofile->homeshorttext}}" required="">
                                </div><br>
                                <div class="form-group">
                                    <input type="hidden" name="updateto" value="about">
                                    <textarea id="editorone" name="updatedata">{{$companyprofile->abouttext}}</textarea>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="margin-top: 25px"><i class="fa fa-check-circle-o"></i> Update</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <h3 style="color: #000"><i class="fa fa-address-card-o"></i> Contact <i class="fa fa-arrow-down"></i></h3>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body" style="text-align: justify">
                            <form method="post" action="{{ route('update_aboutus') }}">
                                {{csrf_field()}}
                                <input type="hidden" name="profid" value="{{@$companyprofile->id}}">
                                <input type="hidden" name="updateto" value="contact">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Contact <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="text"  name="contact" class="form-control inputnumber" value="{{$companyprofile->contact}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>More Contact</label>
                                            <input type="text" name="contacttwo" class="form-control inputnumber" value="{{$companyprofile->contacttwo}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="email" name="email" class="form-control inputnumber" value="{{$companyprofile->email}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email Two</label>
                                            <input type="email" name="emailtwo" class="form-control inputnumber" value="{{$companyprofile->emailtwo}}" required="">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address <span style="color: red;font-weight: bold">*</span></label>
                                            <textarea rows="3" class="form-control inputnumber" name="address" required="">{{$companyprofile->address}}</textarea>
                                        </div>
                                    </div>
                                </div><br>
                                <center>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle-o"></i> Update</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <h3 style="color: #000"><i class="fa fa-cubes"></i> Social Sites <i class="fa fa-arrow-down"></i></h3>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="box-body" style="text-align: justify">
                            <div>
                                <form method="post" action="{{ route('update_aboutus') }}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="profid" value="{{@$companyprofile->id}}">
                                    <input type="hidden" name="updateto" value="social">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Facebook <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="text" name="facebook" class="form-control inputnumber" value="{{$companyprofile->facebook}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="text" name="twitter" class="form-control inputnumber" value="{{$companyprofile->twitter}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>LinkedIn <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="text" name="linkedin" class="form-control inputnumber" value="{{$companyprofile->linkedin}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="text" name="instagram" class="form-control inputnumber" value="{{$companyprofile->instagram}}" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>YouTube <span style="color: red;font-weight: bold">*</span></label>
                                            <input type="text" name="youtube" class="form-control inputnumber" value="{{$companyprofile->youtube}}" required="">
                                        </div>
                                    </div>
                                    <br>
                                    <center>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle-o"></i> Update</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<script data-sample="1">
    CKEDITOR.replace('editorone', {
        height: 250,
        extraPlugins: 'colorbutton,colordialog'
    });
</script>
<script data-sample="2">
    CKEDITOR.replace('editortwo', {
        height: 250,
        extraPlugins: 'colorbutton',
        colorButton_colors: 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16',
        colorButton_enableAutomatic: false
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.profileInfo', function () {
            var value = $(this).attr('id');
            if (value === "aboutus") {
                $('#showAboutText').show();
                $('#hideAboutText').hide();
            } else if (value === "mission") {
                $('#showMissionText').show();
                $('#hideMissionText').hide();
            } else if (value === "vision") {
                $('#showVisionText').show();
                $('#hideVisionText').hide();
            } else if (value === "contact") {
                $('#showContactText').show();
                $('#hideContactText').hide();
            } else {
                $('#showMapText').show();
                $('#hideMapText').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#aboutus").addClass('active');
    });
</script>
@endsection
