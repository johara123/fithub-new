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
            <form method="post" action="{{route('member_review_corner')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Final Reviews <span style="color:red">*</span></label>
                            <textarea rows="8" name="finalreviews" class="form-control inputnumber" required=""></textarea>
                        </div>
                    </div>
                </div><br>
                <center>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px"><i class="fa fa-send-o"></i> Send</button>
                </center>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#reviewcorner').addClass('active');
    });
</script>
@endsection