@extends('baseView')

<style type="text/css">


    #main {
        width: 100%;
        height: 100%;
        left: 0px;
        top: 0px;
    }

</style>




<!-- Main content -->
@section('main')

       <iframe id="main" src="{{url($data)}}">

       </iframe>

@endsection

