@extends('layouts.app')
@section('title',$title)
@section('content')
<div id="postloader"></div>
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <form method="post" action="{{route('update_system_email')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label>System Email Address <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="hidden" name="dataid" value="<?= $getsystemmail->id ?>">
                            <input class="form-control inputnumber" type="email" name="dataname" value="<?= $getsystemmail->name ?>">
                        </div> 
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Update</button>
                </div>   
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#settings').addClass('active');
        $('#system_email').addClass('active');
    });
</script>
@endsection