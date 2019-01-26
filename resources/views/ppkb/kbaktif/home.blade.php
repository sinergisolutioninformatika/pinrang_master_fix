@extends('layouts.app')
@section('title','Data Pencapaian Peserta KB Aktif (CU)')

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
        <li class="breadcrumb-item"><a href="/psda/">Pengendalian Penduduk dan KB</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pencapaian Peserta KB Aktif (CU)</li>
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
        <b>Data Pencapaian Peserta KB Aktif (CU)</b>
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
          <!-- grafik bertingkat -->
          <div id="home" class="container tab-pane active">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#homeA">Perkiraan Permintaan Masyarakat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1A">MIK Kontrasepsi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2A">Persentase</a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="homeA" class="container tab-pane active">
                <canvas id="chart_ppm" width="800px" height="400px"></canvas>
              </div>
              <div id="menu1A" class="container tab-pane fade">
                <canvas id="chart_MIK" width="800px" height="400px"></canvas>
              </div>
              <div id="menu2A" class="container tab-pane fade">
                <canvas id="chart_persen" width="800px" height="400px"></canvas>
              </div>
            </div>
          </div>
          <!-- rekap bertingkat -->
          <div id="menu1" class="container tab-pane fade">
            <table class="table table-striped table-bordered">
              <caption style="caption-side:top;">Perkiraan Permintaan Masyarakat (PPM)</caption>
                <thead>
                  <tr>
                    <th rowspan="3" style="text-align: center;vertical-align: middle;">No.</th>
                    <th rowspan="3" style="vertical-align: middle;">Tahun</th>
                    <th colspan="3" style="text-align: center">PPM</th>
                    <th colspan="9" style="text-align: center">MIK Kontrasepsi</th>
                    <th rowspan="3" style="text-align: center;vertical-align: middle;">Total</th>
                    <th rowspan="3" style="text-align: center;vertical-align: middle;">Proses</th>
                  </tr>
                  <tr>
                    <th rowspan="2" style="text-align: center;vertical-align: middle;">Kab</th>
                    <th rowspan="2" style="text-align: center;vertical-align: middle;">Prov</th>
                    <th rowspan="2" style="text-align: center;vertical-align: middle;">Pusat</th>
                    <th colspan="5" style="text-align: center">MJP</th>
                    <th colspan="4" style="text-align: center">Non-MJP</th>
                  </tr>
                  <tr>
                    <th style="text-align: center">IUD</th>
                    <th style="text-align: center">MOP</th>
                    <th style="text-align: center">MOW</th>
                    <th style="text-align: center">IMP</th>
                    <th style="text-align: center">JML</th>
                    <th style="text-align: center">STK</th>
                    <th style="text-align: center">PIL</th>
                    <th style="text-align: center">KDM</th>
                    <th style="text-align: center">JML</th>
                  </tr>
                </thead>
                <?php
                  $nomor = 1;
                  foreach ($dataMaster as $dataM) {
                      ?>
                  <form action="/ppkb/kbaktif/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                    <tr>
                      <input type="hidden" name="irigasiMaster{{$dataM->id}}" value="">
                      <td>{{$nomor}}</td>
                      <td>{{$dataM->ta}}</td>
                      <td style="text-align: center">{{$dataM->totalPPMKab}}</td>
                      <td style="text-align: center">{{$dataM->totalPPMProv}}</td>
                      <td style="text-align: center">{{$dataM->totalPPMPusat}}</td>
                      <td style="text-align: center">{{$dataM->totalIUD}}</td>
                      <td style="text-align: center">{{$dataM->totalMOP}}</td>
                      <td style="text-align: center">{{$dataM->totalMOW}}</td>
                      <td style="text-align: center">{{$dataM->totalIMP}}</td>
                      <td style="text-align: center">{{$dataM->totalIUD + $dataM->totalMOP + $dataM->totalMOW + $dataM->totalIMP}}</td>
                      <td style="text-align: center">{{$dataM->totalSTK}}</td>
                      <td style="text-align: center">{{$dataM->totalPIL}}</td>
                      <td style="text-align: center">{{$dataM->totalKDM}}</td>
                      <td style="text-align: center">{{$dataM->totalSTK + $dataM->totalPIL + $dataM->totalKDM}}</td>
                      <td style="text-align: center">{{$dataM->totalIUD + $dataM->totalMOP + $dataM->totalMOW + $dataM->totalIMP + $dataM->totalSTK + $dataM->totalPIL + $dataM->totalKDM}}</td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                          <img src="/image/view.png" alt="">
                        </a>
                        <a href="/psda/irigasi/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
                        <a href="#" onclick="return confirm_delete('Are you sure?','form{{$dataM->id}}')">
                          <img src="/image/delete.png" alt="">
                        </a>
                      </td>
                    </tr>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('DELETE') }}
                  </form>
                <?php
                  $nomor ++;
                  }
                 ?>
            </table>
          </div>
          <div id="menu2" class="container tab-pane fade">

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
        <form class="form-group" action="/ppkb/kbaktif/store" method="post">
        <div class="card-body">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#homeX">Perkiraan Permintaan Masyarakat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menuY">MIK Kontrasepsi</a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="homeX" class="container tab-pane active">
              <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kecamatan</th>
                      <th>PPM Kabupaten</th>
                      <th>PPM Provinsi</th>
                      <th>PPM Pusat</th>
                    </tr>
                </thead>
                  <?php
                    $nomor = 1;
                    foreach ($dataKecamatan as $dataK) {
                        ?>
                      <tr>
                        <td style="text-align: center; max-width:5px;">{{$nomor}}</td>
                        <td nowrap style="min-width:25px;">{{$dataK->nmaKecamatan}}</td>
                        <td>
                          <input type="number" id="jmlPPMKab{{$nomor}}" class="form-control" name="jmlPPMKab{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlPPMProv{{$nomor}}" class="form-control" name="jmlPPMProv{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlPPMPusat{{$nomor}}" class="form-control" name="jmlPPMPusat{{$nomor}}" value="0">
                        </td>
                      </tr>
                  <?php
                    $nomor ++;
                    }
                   ?>
                   <tr>
                     <td></td>
                     <td><b>Total</b></td>
                     <td>
                       <input type="number" id="totalPPMKab" class="form-control" name="totalPPMKab" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalPPMProv" class="form-control" name="totalPPMProv" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalPPMPusat" class="form-control" name="totalPPMPusat" value="0" readonly>
                     </td>
                   </tr>
                </table>
            </div>
            <div id="menuY" class="container tab-pane fade">
              <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kecamatan</th>
                      <th>IUD</th>
                      <th>MOP</th>
                      <th>MOW</th>
                      <th>IMP</th>
                      <th>STK</th>
                      <th>PIL</th>
                      <th>KDM</th>
                    </tr>
                </thead>
                  <?php
                    $nomor = 1;
                    foreach ($dataKecamatan as $dataK) {
                        ?>
                      <tr>
                        <td style="text-align: center; max-width:5px;">{{$nomor}}</td>
                        <td nowrap style="min-width:25px;">{{$dataK->nmaKecamatan}}</td>
                        <td>
                          <input type="number" id="jmlIUD{{$nomor}}" class="form-control" name="jmlIUD{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlMOP{{$nomor}}" class="form-control" name="jmlMOP{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlMOW{{$nomor}}" class="form-control" name="jmlMOW{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlIMP{{$nomor}}" class="form-control" name="jmlIMP{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlSTK{{$nomor}}" class="form-control" name="jmlSTK{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlPIL{{$nomor}}" class="form-control" name="jmlPIL{{$nomor}}" value="0">
                        </td>
                        <td>
                          <input type="number" id="jmlKDM{{$nomor}}" class="form-control" name="jmlKDM{{$nomor}}" value="0">
                        </td>
                      </tr>
                  <?php
                    $nomor ++;
                    }
                   ?>
                   <tr>
                     <td></td>
                     <td><b>Total</b></td>
                     <td>
                       <input type="number" id="totalIUD" class="form-control" name="totalIUD" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalMOP" class="form-control" name="totalMOP" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalMOW" class="form-control" name="totalMOW" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalIMP" class="form-control" name="totalIMP" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalSTK" class="form-control" name="totalSTK" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalPIL" class="form-control" name="totalPIL" value="0" readonly>
                     </td>
                     <td>
                       <input type="number" id="totalKDM" class="form-control" name="totalKDM" value="0" readonly>
                     </td>
                   </tr>
                </table>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" name="simpan" id="simpan" class="btn btn-info" value="Simpan">Submit</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
         {{csrf_field()}}
      </div>
        </form>
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

  function showUser(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","{{ url('ppkb/kbaktif/detail') }}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
$(document).ready(function() {

  <?php
    $nopu = 1;
    foreach ($dataKecamatan as $dataK) {
   ?>
    $("#jmlPPMKab{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPPMKab{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPPMKab").val(ksd);
    });
    $("#jmlPPMProv{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPPMProv{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPPMProv").val(ksd);
    });
    $("#jmlPPMPusat{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPPMPusat{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPPMPusat").val(ksd);
    });
    $("#jmlPPMKab{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPPMKab{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPPMKab").val(ksd);
    });
    $("#jmlPPMProv{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPPMProv{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPPMProv").val(ksd);
    });
    $("#jmlPPMPusat{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPPMPusat{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPPMPusat").val(ksd);
    });

    $("#jmlIUD{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlIUD{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalIUD").val(ksd);
    });
    $("#jmlMOP{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlMOP{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalMOP").val(ksd);
    });
    $("#jmlMOW{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlMOW{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalMOW").val(ksd);
    });
    $("#jmlIMP{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlIMP{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalIMP").val(ksd);
    });
    $("#jmlSTK{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlSTK{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalSTK").val(ksd);
    });
    $("#jmlPIL{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPIL{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPIL").val(ksd);
    });
    $("#jmlKDM{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlKDM{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalKDM").val(ksd);
    });
    $("#jmlIUD{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlIUD{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalIUD").val(ksd);
    });
    $("#jmlMOP{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlMOP{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalMOP").val(ksd);
    });
    $("#jmlMOW{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlMOW{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalMOW").val(ksd);
    });
    $("#jmlIMP{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlIMP{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalIMP").val(ksd);
    });
    $("#jmlSTK{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlSTK{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalSTK").val(ksd);
    });
    $("#jmlPIL{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlPIL{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPIL").val(ksd);
    });
    $("#jmlKDM{{$nopu}}").change(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlKDM{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalKDM").val(ksd);
    });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("chart_ppm");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['PPM Kab.'],
        borderColor: ['rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)'],
        backgroundColor:['rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPPMKab . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['PPM Prov.'],
        borderColor: ['rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)'],
        backgroundColor:['rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPPMProv . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['PPM Pusat'],
        borderColor: ['rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)'],
        backgroundColor:['rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPPMPusat . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      }],
      // define label
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
                       text: 'Grafik Perkiraan Permintaan Masyarakat'
                   },
                animation: {
                  duration: 2000, // general aniCeraion time
                  },
                  hover: {
                       animationDuration: 1000, // duration of aniCeraions when hovering an item
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
  var ctx = document.getElementById("chart_MIK");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['IUD'],
        borderColor: ['rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(54, 162, 235, 0.7)'],
        backgroundColor:['rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalIUD . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['MOP'],
        borderColor: ['rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)',
                      'rgba(51, 204, 51, 0.7)'],
        backgroundColor:['rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)',
                         'rgba(51, 204, 51, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalMOP . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['MOW'],
        borderColor: ['rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)',
                      'rgba(232, 192, 33, 0.7)'],
        backgroundColor:['rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalMOW . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['IMP'],
        borderColor: ['rgba(255, 77, 77, 0.7)',
                      'rgba(255, 77, 77, 0.7)',
                      'rgba(255, 77, 77, 0.7)',
                      'rgba(255, 77, 77, 0.7)',
                      'rgba(255, 77, 77, 0.7)',
                      'rgba(255, 77, 77, 0.7)',
                      'rgba(255, 77, 77, 0.7)'],
        backgroundColor:['rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalIMP . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Suntik'],
        borderColor: ['rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)'],
        backgroundColor:['rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalSTK . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Pil'],
        borderColor: ['rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)'],
        backgroundColor:['rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPIL . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Kondom'],
        borderColor: ['rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)'],
        backgroundColor:['rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)'],
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalKDM . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      }],
      // define label
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
                       text: 'Grafik Perkiraan Permintaan Masyarakat'
                   },
                animation: {
                  duration: 2000, // general aniCeraion time
                  },
                  hover: {
                       animationDuration: 1000, // duration of aniCeraions when hovering an item
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
