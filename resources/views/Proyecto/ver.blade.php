@extends('layouts.default')
@section('content')

<div class="row">

<div class="col-lg-9 col-md-9 col-sm-12">

    <div class="app-title">
        <h1><i class="fa fa-folder"></i> {{ $Proyecto->Nombre }}</h1>
    </div>


</div>

<div class="col-lg-3 col-md-9 col-sm-12">
@include('includes.chatbot')
</div>

</div>

@stop