@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>Manage {{$title}}</h1>
<a class="btn" href="<?= URL::to('gymtraniners') ?>" style="border-radius:10px;float:right;margin-top:-30px;margin-left: 10px;background:#000;color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Trainer Info</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Trainer Photo</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form method="post" action="{{route('updatetraniner')}}" name="getformdata">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Trainer Name <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="hidden" name="dataid" value="<?= $gymtraniner->id ?>">
                                                <input type="hidden" name="datatype" value="Info">
                                                <input type="text" name="name" value="<?= $gymtraniner->name ?>" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <label>Trainer Post <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <select style="width: 100%" name="post" class="form-control getSelect" required="">
                                                    <option value="">Select Post</option>
                                                    @foreach($getpresetdata as $value)
                                                    <option value="{{$value->name}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div> 
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About <span style="color: red;font-weight: bold">*</span></label>
                                                <textarea rows="5" class="form-control inputnumber" name="about" required=""><?= $gymtraniner->about ?></textarea>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="tableheader">
                                                            <th style="text-align: center">S/N</th>
                                                            <th style="text-align: center">Skill</th>
                                                            <th style="text-align: center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center;" id="coreItems">
                                                        <?php
                                                        $skills = explode('$$', $gymtraniner->skill);
                                                        foreach ($skills as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td class="serial_no">{{$key+1}}</td>
                                                                <td><input type="text" name="skill[]" class="form-control inputnumber" value="<?= $value ?>" required=""></td>
                                                                <td><button class="btn btn-danger remCF" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <center>
                                                    <button  class="btn btn-info" type="button" id="addMore" style="border-radius:10px"><i class="fa fa-plus"></i> Add More Skills</button>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="tableheader">
                                                            <th style="text-align: center">S/N</th>
                                                            <th style="text-align: center">Award</th>
                                                            <th style="text-align: center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center;" id="coreItems2">
                                                        <?php
                                                        $awards = explode('$$', $gymtraniner->award);
                                                        foreach ($awards as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td class="serial_no">{{$key+1}}</td>
                                                                <td><input type="text" name="award[]" class="form-control inputnumber" value="<?= $value ?>" required=""></td>
                                                                <td><button class="btn btn-danger remCF2" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <center>
                                                    <button  class="btn btn-info" type="button" id="addMore2" style="border-radius:10px"><i class="fa fa-plus"></i> Add More Awards</button>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Joining Date <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="text" name="joindate" value="<?= $gymtraniner->joindate ?>" class="form-control allDate" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <label>Experience <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="text" name="experience" value="<?= $gymtraniner->experience ?>" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <label>Contact Number <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="text" name="contact" value="<?= $gymtraniner->contact ?>" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <label>Email Address <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="text" name="email" value="<?= $gymtraniner->email ?>" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Social Links & Icons</label>
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="tableheader">
                                                            <th style="text-align: center">S/N</th>
                                                            <th style="text-align: center">Link</th>
                                                            <th style="text-align: center">Icon</th>
                                                            <th style="text-align: center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center;" id="coreItemstwo">
                                                        <?php
                                                        $social_link = explode('$$', $gymtraniner->social_link);
                                                        $social_icon = explode('$$', $gymtraniner->social_icon);
                                                        foreach ($social_link as $key => $slink) {
                                                            ?>
                                                            <tr>
                                                                <td class="serial_notwo">{{$key+1}}</td>
                                                                <td><input type="text" name="link[]" class="form-control inputnumber" value="<?= $slink ?>"></td>
                                                                <td><input type="text" name="icon[]" class="form-control inputnumber" value="<?= $social_icon[$key] ?>" readonly=""></td>
                                                                <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
                                                            </tr>
                                                        <?php } ?>
<!--                                    <tr>
    <td class="serial_notwo">1</td>
    <td><input type="text" name="link[]" class="form-control inputnumber" placeholder="Enter Link"></td>
    <td><input type="text" name="icon[]" class="form-control inputnumber" value="facebook" readonly=""></td>
    <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
</tr>-->
<!--                                            <tr>
    <td class="serial_notwo">2</td>
    <td><input type="text" name="link[]" class="form-control inputnumber" placeholder="Enter Link"></td>
    <td><input type="text" name="icon[]" class="form-control inputnumber" value="twitter" readonly=""></td>
    <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
</tr>-->
<!--                                            <tr>
    <td class="serial_notwo">3</td>
    <td><input type="text" name="link[]" class="form-control inputnumber" placeholder="Enter Link"></td>
    <td><input type="text" name="icon[]" class="form-control inputnumber" value="linkedin" readonly=""></td>
    <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
</tr>-->
<!--                                    <tr>
    <td class="serial_notwo">4</td>
    <td><input type="text" name="link[]" class="form-control inputnumber" placeholder="Enter Link"></td>
    <td><input type="text" name="icon[]" class="form-control inputnumber" value="instagram" readonly=""></td>
    <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
</tr>
<tr>
    <td class="serial_notwo">5</td>
    <td><input type="text" name="link[]" class="form-control inputnumber" placeholder="Enter Link"></td>
    <td><input type="text" name="icon[]" class="form-control inputnumber" value="youtube" readonly=""></td>
    <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
</tr>-->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                                    </div>   
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <form method="post" action="{{route('updatetraniner')}}" enctype="multipart/form-data" name="getformdata">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Trainer Photo <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="hidden" name="dataid" value="<?= $gymtraniner->id ?>">
                                                <input type="hidden" name="datatype" value="Photo">
                                                <input type="hidden" name="oldphoto" value="<?= $gymtraniner->photo ?>">
                                                <input type="file" onchange="readURL(this);" name="photo" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{asset('/')}}<?= $gymtraniner->photo ?>" style="border: 5px solid #000;width: 200px;height:200px;"id="blah">
                                        </div>
                                    </div><br>
                                    <div style="text-align: center">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                                    </div>   
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#addMore").click(function () {
            var n = ($('#coreItems tr').length - 0) + 1;
            var tr = '';
            tr += '<tr>';
            tr += '<td class="serial_no">' + n + '</td>';
            tr += '<td><input type="text" name="skill[]" class="form-control inputnumber" placeholder="Enter Skill" required=""></td>';
            tr += '<td><button  class="btn btn-danger remCF" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>';
            tr += '</tr>';
            $("#coreItems").append(tr);
        });
        $(document).delegate('button.remCF', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#coreItems tr').each(function (index) {
                $(this).find('.serial_no').html(index + 1);
            });
            return true;
        });
        $(document).delegate('button.removeskill', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#coreItemstwo tr').each(function (index) {
                $(this).find('.serial_notwo').html(index + 1);
            });
            return true;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addMore2").click(function () {
            var n = ($('#coreItems2 tr').length - 0) + 1;
            var tr = '';
            tr += '<tr>';
            tr += '<td class="serial_no2">' + n + '</td>';
            tr += '<td><input type="text" name="award[]" class="form-control inputnumber" placeholder="Enter Award" required=""></td>';
            tr += '<td><button  class="btn btn-danger remCF2" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>';
            tr += '</tr>';
            $("#coreItems2").append(tr);
        });
        $(document).delegate('button.remCF2', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#coreItems2 tr').each(function (index) {
                $(this).find('.serial_no2').html(index + 1);
            });
            return true;
        });
    });
</script>
<script>
    document.forms['getformdata'].elements['post'].value = '<?= $gymtraniner->post ?>';
</script>
<script>
    $(document).ready(function () {
        $('#gymtraniners').addClass('active');
    });
</script>
@endsection