@extends('layouts.app')
@section('title',$title)
@section('content')
<style>
    b{
        text-align: justify;
    }
</style>
<div id="postloader"></div>
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <form method="post" action="{{route('savedupdate_messages')}}" name="getformdata">
                {{csrf_field()}}
                <div class="row"> 
                    <div class="col-md-4">
                        <input type="hidden" name="task_type" value="Updated">
                        <input type="hidden" name="task_id" value="{{$get_email_messages->id}}">
                        <div class="form-group">
                            <label>Type <span style="color: red">*</span></label>
                            <select name="message_type" class="form-control inputnumber" required="">
                                <option value="">Select Type</option>
                                <option value="verified">After Verified Account</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Subject <span style="color: red">*</span></label>
                            <input type="text" name="email_subject" class="form-control inputnumber" value="{{$get_email_messages->email_subject}}" required="">
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Messages (Email Body) <span style="color: red">*</span></label>
                            <textarea id="ckeditorplug" name="message_body">{{$get_email_messages->message_body}}</textarea>
                        </div>
                    </div>
                </div><br>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check"></i> Update</button>
                </div>   
            </form>
        </div>
    </div>
</section>
<script>
    document.forms['getformdata'].elements['message_type'].value = '{{$get_email_messages->message_type}}';
</script>
<script data-sample="2">
    CKEDITOR.replace('ckeditorplug', {
        height:300,
        extraPlugins: 'colorbutton,colordialog'
//        extraPlugins: 'colorbutton',
//        colorButton_colors: 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16',
//        colorButton_enableAutomatic: false
    });
</script>
<script>
    $(document).ready(function () {
        $('#emailSettings').addClass('active');
        $('#system_messages').addClass('active');
    });
</script>
@endsection