@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header animated fadeInDown">
    <h1><?= $title ?></h1>
</section>
<section class="content">

</section>
<script>
    $(document).ready(function () {
        $('#gymclasses').addClass('active');
    });
</script>
@endsection