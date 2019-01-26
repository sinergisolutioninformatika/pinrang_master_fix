@extends('layouts.app')
@section('title','Data Anggaran Pendapatan Belanja Daerah')

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
        <li class="breadcrumb-item"><a href="/diknas/">Badan Keuangan Daerah</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Anggaran Pendapatan Belanja Daerah</li>
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
        <b>Data Anggaran Pendapatan Belanja Daerah</b>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Pendapatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Belanja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Pembiayaan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu3">Rekapitulasi</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
              <canvas id="apbd1" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <canvas id="apbd2" width="800px" height="400px"></canvas>
          </div>
          <div id="menu2" class="container tab-pane fade"><br>
            <canvas id="apbd3" width="800px" height="400px"></canvas>
          </div>
          <div id="menu3" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Rekap Pendapatan</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th style="text-align: center">Pendapatan (jt)</th>
                    <th style="text-align: center">Belanja (jt)</th>
                    <th style="text-align: center">Pembiayaan (jt)</th>
                    <th style="text-align: center">SILPA (jt)</th>
                    <th>Proses</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/bkud/apbd/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="apbd{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlPendapatan}}</td>
                    <td style="text-align: center">{{$dataM->jmlBelanja}}</td>
                    <td style="text-align: center">{{$dataM->jmlPembiayaan}}</td>
                    <td style="text-align: center">{{$dataM->jmlSilpa}}</td>
                    <td nowrap>
                      <a href="/bkud/apbd/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <b>Input Data Rekap Baru (diisi dalam satuan juta)</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/bkud/apbd/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlPAD" class="col-md-4 col-form-label text-md-right">Pendapatan Asli Daerah</label>
                <div class="col-md-6">
                    <input id="jmlPAD" type="number" class="form-control" name="jmlPAD" value="{{$dataE->jmlPAD}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlDanaperimbangan" class="col-md-4 col-form-label text-md-right">Dana Perimbangan</label>
                <div class="col-md-6">
                    <input id="jmlDanaperimbangan" type="number" class="form-control" name="jmlDanaperimbangan" value="{{$dataE->jmlDanaperimbangan}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPendapatanlain" class="col-md-4 col-form-label text-md-right">Lain-lain Pendapatan Daerah yang sah</label>
                <div class="col-md-6">
                    <input id="jmlPendapatanlain" type="number" class="form-control" name="jmlPendapatanlain" value="{{$dataE->jmlPendapatanlain}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPendapatan" class="col-md-4 col-form-label text-md-right">Jumlah Pendapatan</label>
                <div class="col-md-6">
                    <input id="jmlPendapatan" type="number" class="form-control" name="jmlPendapatan" value="{{$dataE->jmlPendapatan}}" readonly>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlBelanjatidaklangsung" class="col-md-4 col-form-label text-md-right">Belanja Tidak Langsung</label>
                <div class="col-md-6">
                    <input id="jmlBelanjatidaklangsung" type="number" class="form-control" name="jmlBelanjatidaklangsung" value="{{$dataE->jmlBelanjatidaklangsung}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlBelanjalangsung" class="col-md-4 col-form-label text-md-right">Belanja Langsung</label>
                <div class="col-md-6">
                    <input id="jmlBelanjalangsung" type="number" class="form-control" name="jmlBelanjalangsung" value="{{$dataE->jmlBelanjalangsung}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlBelanja" class="col-md-4 col-form-label text-md-right">Jumlah Belanja</label>
                <div class="col-md-6">
                    <input id="jmlBelanja" type="number" class="form-control" name="jmlBelanja" value="{{$dataE->jmlBelanja}}" readonly>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlPembiayaanpenerimaan" class="col-md-4 col-form-label text-md-right">Penerimaan Pembiayaan Daerah</label>
                <div class="col-md-6">
                    <input id="jmlPembiayaanpenerimaan" type="number" class="form-control" name="jmlPembiayaanpenerimaan" value="{{$dataE->jmlPembiayaanpenerimaan}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPembiayaanpengeluaran" class="col-md-4 col-form-label text-md-right">Pengeluaran Pembiayaan Daerah</label>
                <div class="col-md-6">
                    <input id="jmlPembiayaanpengeluaran" type="number" class="form-control" name="jmlPembiayaanpengeluaran" value="{{$dataE->jmlPembiayaanpengeluaran}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPembiayaan" class="col-md-4 col-form-label text-md-right">Pembiayaan Neto</label>
                <div class="col-md-6">
                    <input id="jmlPembiayaan" type="number" class="form-control" name="jmlPembiayaan" value="{{$dataE->jmlPembiayaan}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlSilpa" class="col-md-4 col-form-label text-md-right">Silpa</label>
                <div class="col-md-6">
                    <input id="jmlSilpa" type="number" class="form-control" name="jmlSilpa" value="{{$dataE->jmlSilpa}}" autofocus>
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
  $("#jmlPAD").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPAD").val())
            + Number($("#jmlDanaperimbangan").val())
            + Number($("#jmlPendapatanlain").val());
      $("#jmlPendapatan").val(hc);
  });
  $("#jmlDanaperimbangan").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPAD").val())
            + Number($("#jmlDanaperimbangan").val())
            + Number($("#jmlPendapatanlain").val());
      $("#jmlPendapatan").val(hc);
  });
  $("#jmlPendapatanlain").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPAD").val())
            + Number($("#jmlDanaperimbangan").val())
            + Number($("#jmlPendapatanlain").val());
      $("#jmlPendapatan").val(hc);
  });
  $("#jmlBelanjatidaklangsung").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlBelanjatidaklangsung").val())
            + Number($("#jmlBelanjalangsung").val());
      $("#jmlBelanja").val(hc);
  });
  $("#jmlBelanjalangsung").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlBelanjatidaklangsung").val())
            + Number($("#jmlBelanjalangsung").val());
      $("#jmlBelanja").val(hc);
  });
  $("#jmlPembiayaanpenerimaan").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPembiayaanpenerimaan").val())
            - Number($("#jmlPembiayaanpengeluaran").val());
      $("#jmlPembiayaan").val(hc);
  });
  $("#jmlPembiayaanpengeluaran").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPembiayaanpenerimaan").val())
            - Number($("#jmlPembiayaanpengeluaran").val());
      $("#jmlPembiayaan").val(hc);
  });
});
</script>

<script>
var ctx = document.getElementById("apbd1");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Pendapatan'],
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
                 $kata = $kata . $jkg->jmlPendapatan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['PAD'],
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
                 $kata = $kata . $jkg->jmlPAD . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Dana Perimbangan'],
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
                 $kata = $kata . $jkg->jmlDanaperimbangan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Dana Lainnya'],
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
                 $kata = $kata . $jkg->jmlPendapatanlain . ',';
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
           text: 'Grafik Data Anggaran Pendapatan Belanja Daerah (juta)'
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
<script>
var ctx = document.getElementById("apbd2");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Belanja'],
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
                 $kata = $kata . $jkg->jmlBelanja . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Belanja Tidak Langsung'],
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
                 $kata = $kata . $jkg->jmlBelanjatidaklangsung . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Belanja Langsung'],
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
                 $kata = $kata . $jkg->jmlBelanjalangsung . ',';
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
           text: 'Grafik Data Anggaran Pendapatan Belanja Daerah (juta)'
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
<script>
var ctx = document.getElementById("apbd3");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Pembiayaan Neto'],
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
                 $kata = $kata . $jkg->jmlPembiayaan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Penerimaan Pembiayaan'],
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
                 $kata = $kata . $jkg->jmlPembiayaanpenerimaan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Pengeluaran Pembiayaan'],
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
                 $kata = $kata . $jkg->jmlPembiayaanpengeluaran . ',';
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
           text: 'Grafik Data Anggaran Pendapatan Belanja Daerah (juta)'
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
