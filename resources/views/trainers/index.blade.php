@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>Manage {{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('savetraniner')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <label>Trainer Name <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Enter Trainer Name" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <label>Trainer Photo <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="file" onchange="readURL(this);" name="photo" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('/')}}public/images/placeholder.png" style="border: 5px solid #000;width: 200px;height:200px;"id="blah">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>About <span style="color: red;font-weight: bold">*</span></label>
                                    <textarea rows="5" class="form-control inputnumber" name="about" required=""></textarea>
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
                                            <tr>
                                                <td class="serial_no">1</td>
                                                <td><input type="text" name="skill[]" class="form-control inputnumber" placeholder="Enter Skill" required=""></td>
                                                <td><button  class="btn btn-info" type="button" id="addMore" style="border-radius:10px"><i class="fa fa-plus"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <th style="text-align: center">Awards</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;" id="coreItems2">
                                            <tr>
                                                <td class="serial_no2">1</td>
                                                <td><input type="text" name="award[]" class="form-control inputnumber" placeholder="Enter Award" required=""></td>
                                                <td><button  class="btn btn-info" type="button" id="addMore2" style="border-radius:10px"><i class="fa fa-plus"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Joining Date <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="joindate" placeholder="Select Date" class="form-control allDate" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Experience <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="experience" placeholder="Enter Experience " class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Contact Number <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="contact" placeholder="Enter Contact Number" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Email Address <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Enter Contact Number" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
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
                                            <tr>
                                                <td class="serial_notwo">1</td>
                                                <td><input type="text" name="link[]" class="form-control inputnumber" placeholder="Enter Link"></td>
                                                <td><input type="text" name="icon[]" class="form-control inputnumber" value="facebook" readonly=""></td>
                                                <td><button  class="btn btn-danger removeskill" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
                                            </tr>
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
                                            <tr>
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
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Save</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Photo</th>
                            <th style="text-align: center">Post</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($gymtraniners as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->name ?></td>
                                <td style="text-align: center"><img style="width: 100px;height: 80px;" src="<?= URL::to($value->photo) ?>"></td>
                                <td style="text-align: center"><?= $value->post ?></td>
                                <td style="text-align: center">  
                                    <button class="btn btn-o btn-primary" onclick="window.location = '<?= URL::to('edit_trainer_info?id=' . $value->id) ?>'" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></button>
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
    $(document).ready(function () {
        $('#gymtraniners').addClass('active');
    });
</script>
@endsection