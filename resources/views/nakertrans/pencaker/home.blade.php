@extends('layouts.app')
@section('title','Data Pencari Kerja dan Penempatan')

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
        <li class="breadcrumb-item"><a href="/diknas/">Tenaga Kerja</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pencari Kerja dan Penempatan</li>
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
        <b>Data Pencari Kerja dan Penempatan</b>
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
              <canvas id="pencaker" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Pencari Kerja dan Penempatan</caption>
                <thead>
                  <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Tahun</th>
                    <th colspan="3">Pencari Kerja</th>
                    <th colspan="3">Ditempatkan/diterima</th>
                    <th rowspan="2">Proses</th>
                  </tr>
                  <tr>
                    <th>Jumlah</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/nakertrans/pencaker/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="pencakerMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlPencaker}}</td>
                    <td style="text-align: center">{{$dataM->pencakerLaki}}</td>
                    <td style="text-align: center">{{$dataM->pencakerPerempuan}}</td>
                    <td style="text-align: center">{{$dataM->jmlDitempatkan}}</td>
                    <td style="text-align: center">{{$dataM->ditempatkanLaki}}</td>
                    <td style="text-align: center">{{$dataM->ditempatkanPerempuan}}</td>
                    <td nowrap>
                      <a href="/nakertrans/pencaker/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
    <div class="card-footer">
      <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Input Data Baru
      </button>
    </div>
  </div>
<br>
    <!-- input data rekap baru -->
    <div class="collapse" id="collapseExample">
      <div class="card">
        <div class="card-header">
          <b>Input Data Rekap Baru</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/nakertrans/pencaker/store" method="post">
            <div class="form-group row">
                <label for="pencakerLaki" class="col-md-4 col-form-label text-md-right">Pencari Kerja Laki-laki</label>
                <div class="col-md-6">
                    <input id="pencakerLaki" type="number" class="form-control" name="pencakerLaki" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="pencakerPerempuan" class="col-md-4 col-form-label text-md-right">Pencari Kerja Perempuan</label>
                <div class="col-md-6">
                    <input id="pencakerPerempuan" type="number" class="form-control" name="pencakerPerempuan" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPencaker" class="col-md-4 col-form-label text-md-right">Jumlah Pencari Kerja</label>
                <div class="col-md-6">
                    <input id="jmlPencaker" type="number" class="form-control" name="jmlPencaker" value="0" readonly>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="ditempatkanLaki" class="col-md-4 col-form-label text-md-right">Ditempatkan Laki-laki</label>
                <div class="col-md-6">
                    <input id="ditempatkanLaki" type="number" class="form-control" name="ditempatkanLaki" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="ditempatkanPerempauan" class="col-md-4 col-form-label text-md-right">Ditempatkan Perempuan</label>
                <div class="col-md-6">
                    <input id="ditempatkanPerempuan" type="number" class="form-control" name="ditempatkanPerempuan" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlDitempatkan" class="col-md-4 col-form-label text-md-right">Jumlah Ditempatkan</label>
                <div class="col-md-6">
                    <input id="jmlDitempatkan" type="number" class="form-control" name="jmlDitempatkan" value="0" readonly>
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
  $("#pencakerLaki").keyup(function() {
    $("#jmlPencaker").val(Number($("#pencakerLaki").val()) +  Number($("#pencakerPerempuan").val()));
  });
  $("#pencakerPerempuan").keyup(function() {
    $("#jmlPencaker").val(Number($("#pencakerLaki").val()) +  Number($("#pencakerPerempuan").val()));
  });
  $("#pencakerLaki").change(function() {
    $("#jmlPencaker").val(Number($("#pencakerLaki").val()) +  Number($("#pencakerPerempuan").val()));
  });
  $("#pencakerPerempuan").change(function() {
    $("#jmlPencaker").val(Number($("#pencakerLaki").val()) +  Number($("#pencakerPerempuan").val()));
  });
  $("#ditempatkanLaki").keyup(function() {
    $("#jmlDitempatkan").val(Number($("#ditempatkanLaki").val()) +  Number($("#ditempatkanPerempuan").val()));
  });
  $("#ditempatkanPerempuan").keyup(function() {
    $("#jmlDitempatkan").val(Number($("#ditempatkanLaki").val()) +  Number($("#ditempatkanPerempuan").val()));
  });
  $("#ditempatkanLaki").change(function() {
    $("#jmlDitempatkan").val(Number($("#ditempatkanLaki").val()) +  Number($("#ditempatkanPerempuan").val()));
  });
  $("#ditempatkanPerempuan").change(function() {
    $("#jmlDitempatkan").val(Number($("#ditempatkanLaki").val()) +  Number($("#ditempatkanPerempuan").val()));
  });
});
</script>

<script>
var ctx = document.getElementById("pencaker");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Jumlah Pencari Kerja'],
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
                 $kata = $kata . $jkg->jmlPencaker . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Pencaker Laki-laki'],
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
                 $kata = $kata . $jkg->pencakerLaki . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Pencaker Perempuan'],
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
                 $kata = $kata . $jkg->pencakerPerempuan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Jumlah Ditempatkan'],
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
                 $kata = $kata . $jkg->jmlDitempatkan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Ditempatkan (Laki-laki)'],
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
                 $kata = $kata . $jkg->ditempatkanLaki . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Ditempatkan (Perempuan)'],
      borderColor: ['rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)'],
      backgroundColor:['rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)'],
      pointBackgroundColor:['rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)'],
      pointHoverBorderColor: ['rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->ditempatkanPerempuan . ',';
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
           text: 'Grafik Jumlah Pencari Kerja'
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
