@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row  center-block">
    <div class="col-md-12">
  <br>
<?php
  foreach ($dataKategori as $kategori) {
    ?>
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <strong>{{$kategori->nmaData}}</strong><br>
      <small>Walidata: {{$kategori->nmaSKPD}}</small>
    </div>
    <div class="card-body">
      <p>{{$kategori->keterangan}}</p>
      <p><a href="{{$kategori->link_view}}">View</a> </p>
    </div>
  </div>
  <br>
        <?php
      }
     ?>
  </div>
  </div>
  <div class="row">
    {{$dataKategori->links()}}
  </div>

</div>
@endsection
