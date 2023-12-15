@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <form method="post" action="{{route('update_dietplan')}}" name="getformdata">
                {{csrf_field()}}
                <div class="form-group row">
                    <input type="hidden" name="data_id" value="<?= $dietchart->id ?>">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Members
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select style="width: 100%" name="member_id" class="form-control getSelect">
                                <option value="">Select Member</option>
                                @foreach($getcustomers as $value)
                                <option value="{{$value->id}}">{{$value->memberidno}} => {{$value->fname}} {{$value->lname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Diet Plan
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select style="width: 100%" name="diet_plan_id" class="form-control getSelect">
                                <option value="">Select PLan</option>
                                @foreach($getdietplantypes as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <h3>Diet Plan Eating Chart List</h3>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Early Morning Eating
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="early_morning" class="form-control inputnumber" value="<?= $dietchart->early_morning ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Breakfast
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="breakfast" class="form-control inputnumber" value="<?= $dietchart->breakfast ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Mid Meal
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="mid_meal" class="form-control inputnumber" value="<?= $dietchart->mid_meal ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Lunch
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="lunch" class="form-control inputnumber" value="<?= $dietchart->lunch ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Before Workout
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="before_workout" class="form-control inputnumber" value="<?= $dietchart->before_workout ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        After Workout
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="after_workout" class="form-control inputnumber" value="<?= $dietchart->after_workout ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Dinner
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="dinner" class="form-control inputnumber" value="<?= $dietchart->dinner ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                        Before Sleep/Bed Time
                    </label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="bed_time" class="form-control inputnumber" value="<?= $dietchart->bed_time ?>">
                        </div>
                    </div>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                </div>   
            </form>
        </div>
    </div>
</section>
<script>
    document.forms['getformdata'].elements['member_id'].value = '<?= $dietchart->member_id ?>';
    document.forms['getformdata'].elements['diet_plan_id'].value = '<?= $dietchart->diet_plan_id ?>';
</script>
<script>
    $(document).ready(function () {
        $('#diet_plan_chart').addClass('active');
    });
</script>
@endsection