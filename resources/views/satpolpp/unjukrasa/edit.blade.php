@extends('layouts.app')
@section('title','Data Kasus Unjuk Rasa')

@section('modals')
<div class="container">
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
          <div id="txtHint">
          </div>
    </div>
  </div>
</div>
@endsection

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <!-- mau diganti -->
        <li class="breadcrumb-item"><a href="/diknas/">Satuan Polisi Pamong Praja</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kasus Unjuk Rasa</li>
      </ol>
    </nav>
</div>
@endsection

@section('menu')
@include('menu')
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Kasus Unjuk Rasa</b>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Grafik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Rekapitulasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Keterangan</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
              <canvas id="unjukrasa" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Kasus Unjuk Rasa</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Jumlah Kasus</th>
                    <th>Politik</th>
                    <th>Ekonomi</th>
                    <th>Agama</th>
                    <th>Lainnya</th>
                    <th>Proses</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/satpolpp/unjukrasa/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="unjukrasa{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlKasus}}</td>
                    <td style="text-align: center">{{$dataM->jmlPolitik}}</td>
                    <td style="text-align: center">{{$dataM->jmlEkonomi}}</td>
                    <td style="text-align: center">{{$dataM->jmlAgama}}</td>
                    <td style="text-align: center">{{$dataM->jmlLainnya}}</td>
                    <td nowrap>
                      <a href="/satpolpp/unjukrasa/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$dataM->id}}')">
                        <img src="/image/delete.png" alt="">
                      </a>
                    </td>
                  </tr>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{ method_field('DELETE') }}
                </form>
              <?php
                $nomor ++;
                }
               ?>
            </table>
          </div>
          <div id="menu2" class="container tab-pane fade"><br>

          </div>
        </div>
    </div>
  </div>
<br>
<?php
  foreach ($dataEdit as $dataE) {
  }
 ?>
    <!-- input data rekap baru -->
    <div class="collapse show" id="collapseExample">
      <div class="card">
        <div class="card-header">
          <b>Edit Data</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/satpolpp/unjukrasa/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlPolitik" class="col-md-4 col-form-label text-md-right">Kasus Politik</label>
                <div class="col-md-6">
                    <input id="jmlPolitik" type="number" class="form-control" name="jmlPolitik" value="{{$dataE->jmlPolitik}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlEkonomi" class="col-md-4 col-form-label text-md-right">Kasus Ekonomi</label>
                <div class="col-md-6">
                    <input id="jmlEkonomi" type="number" class="form-control" name="jmlEkonomi" value="{{$dataE->jmlEkonomi}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlAgama" class="col-md-4 col-form-label text-md-right">Kasus Agama</label>
                <div class="col-md-6">
                    <input id="jmlAgama" type="number" class="form-control" name="jmlAgama" value="{{$dataE->jmlAgama}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlLainnya" class="col-md-4 col-form-label text-md-right">Kasus Lainnya</label>
                <div class="col-md-6">
                    <input id="jmlLainnya" type="number" class="form-control" name="jmlLainnya" value="{{$dataE->jmlLainnya}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlKasus" class="col-md-4 col-form-label text-md-right">Jumlah Kasus</label>
                <div class="col-md-6">
                    <input id="jmlKasus" type="number" class="form-control" name="jmlKasus" value="{{$dataE->jmlKasus}}" readonly>
                </div>
            </div>
        </div>{{ csrf_field() }}
        <div class="card-footer">
              <button type="submit" name="simpan" id="simpan" class="btn btn-info" value="Simpan">Submit</button>
              <button type="reset" class="btn btn-warning">Reset</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function confirm_delete(question, ada) {
    if(confirm(question)){
       document.getElementById(ada).submit();
    }else{
      return false;
    }
  }
  </script>

<script>
$(document).ready(function() {
  $("#jmlPolitik").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlEkonomi").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlAgama").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlLainnya").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlPelajar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlPolitik").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlEkonomi").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlAgama").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlLainnya").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
  $("#jmlPelajar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPolitik").val())
            + Number($("#jmlEkonomi").val())
            + Number($("#jmlAgama").val())
            + Number($("#jmlLainnya").val());
      $("#jmlKasus").val(hc);
  });
});
</script>

<script>
var ctx = document.getElementById("unjukrasa");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Politik'],
      borderColor: ['rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)',
                     'rgba(54, 162, 235, 0.5)'],
      backgroundColor:['rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)'],
      pointBackgroundColor:['rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(54, 162, 235, 0.5)'],
      pointHoverBorderColor: ['rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(54, 162, 235, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->jmlPolitik . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Antar Wilayah Desa'],
      borderColor: ['rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)',
                     'rgba(70, 236, 112, 0.5)'],
      backgroundColor:['rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)'],
      pointBackgroundColor:['rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)',
                            'rgba(70, 236, 112, 0.5)'],
      pointHoverBorderColor: ['rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)',
                             'rgba(70, 236, 112, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->jmlEkonomi . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Antar Agama'],
      borderColor: ['rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)',
                     'rgba(232, 192, 33, 0.5)'],
      backgroundColor:['rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)'],
      pointBackgroundColor:['rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)',
                            'rgba(232, 192, 33, 0.5)'],
      pointHoverBorderColor: ['rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)',
                             'rgba(232, 192, 33, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->jmlAgama . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Lainnya'],
      borderColor: ['rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)',
                     'rgba(255, 77, 77, 0.5)'],
      backgroundColor:['rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)'],
      pointBackgroundColor:['rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)',
                            'rgba(255, 77, 77, 0.5)'],
      pointHoverBorderColor: ['rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)',
                             'rgba(255, 77, 77, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->jmlLainnya . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Antar Pelajar'],
      borderColor: ['rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)'],
      backgroundColor:['rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)'],
      pointBackgroundColor:['rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)'],
      pointHoverBorderColor: ['rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->jmlPelajar . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    }],
    <?php
      $katax = "['";
      foreach ($dataChart as $jkg) {
        $katax = $katax . $jkg->ta . "','";
             }
             $katax = $katax . "']";
             $katax = str_replace(",'']", "],", $katax);
          ?>
    labels:
      <?php echo $katax; ?>
            },
  options:{
    title: {
           display: true,
           position: 'top',
           fontsize: 14,
           text: 'Grafik Data Kasus Unjuk Rasa'
       },
    animation: {
      duration: 2000, // general animation time
      },
      hover: {
           animationDuration: 1000, // duration of animations when hovering an item
       },
        scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          },
        }
      });
</script>

@endsection
