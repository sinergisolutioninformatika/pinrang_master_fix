@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row  center-block">
    <div class="col-md-12">
  <br>
<?php
  foreach ($dataSearch as $Search) {
    ?>
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <strong>{{$Search->nmaData}}</strong><br>
      <small>Walidata: {{$Search->nmaSKPD}}</small>
    </div>
    <div class="card-body">
      <p>{{$Search->keterangan}}</p>
      <p><a href="{{$Search->link_view}}">View</a> </p>
    </div>
  </div>
  <br>
        <?php
      }
     ?>
  </div>
  </div>
  <div class="row">
    {{$dataSearch->links()}}
  </div>

</div>
@endsection
