@extends('layouts.app')
@section('title','Data Jumlah Armada Penangkapan Ikan')

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
        <li class="breadcrumb-item"><a href="/diknas/">Perikanan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Armada Penangkapan Ikan</li>
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
        <b>Data Jumlah Armada Penangkapan Ikan</b>
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
              <canvas id="perikanan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Armada Penangkapan Ikan</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Armada</th>
                  <th>Kapal Motor</th>
                  <th>Perahu Motor</th>
                  <th>Perahu Tanpa Motor</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/perikanan/armada/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="armadaMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalArmada}}</td>
                    <td style="text-align: center">{{$dataM->totalKapalmotor}}</td>
                    <td style="text-align: center">{{$dataM->totalPerahumotor}}</td>
                    <td style="text-align: center">{{$dataM->totalPerahutanpamotor}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/perikanan/armada/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <b>Edit Data : {{$ta}}</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/perikanan/armada/update/{{$kodeEdit}}" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Armada</th>
                    <th>Kapal Motor</th>
                    <th>Perahu Motor</th>
                    <th>Perahu Tanpa Motor</th>
                  </tr>
              </thead><input type="hidden" name="_method" value="PUT">
                <?php
                  $nomor = 1;
                  foreach ($dataDetail as $dataD) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$dataD->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlArmada{{$nomor}}" class="form-control" name="jmlArmada{{$nomor}}" value="{{$dataD->jmlArmada}}" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlKapalmotor{{$nomor}}" class="form-control" name="jmlKapalmotor{{$nomor}}" value="{{$dataD->jmlKapalmotor}}">
                      </td>
                      <td>
                        <input type="number" id="jmlPerahumotor{{$nomor}}" class="form-control" name="jmlPerahumotor{{$nomor}}" value="{{$dataD->jmlPerahumotor}}">
                      </td>
                      <td>
                        <input type="number" id="jmlPerahutanpamotor{{$nomor}}" class="form-control" name="jmlPerahutanpamotor{{$nomor}}" value="{{$dataD->jmlPerahutanpamotor}}">
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
                     <input type="number" id="totalArmada" class="form-control" name="totalArmada" value="{{$dataE->totalArmada}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKapalmotor" class="form-control" name="totalKapalmotor" value="{{$dataE->totalKapalmotor}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPerahumotor" class="form-control" name="totalPerahumotor" value="{{$dataE->totalPerahumotor}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPerahutanpamotor" class="form-control" name="totalPerahutanpamotor" value="{{$dataE->totalPerahutanpamotor}}" readonly>
                   </td>
                 </tr>
                 {{csrf_field()}}
              </table>
              <hr>
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
          xmlhttp.open("GET","{{ url('perikanan/armada/detail') }}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
$(document).ready(function() {

  <?php
    $nopu = 1;
    foreach ($dataKecamatan as $pus) {
   ?>
    $("#jmlKapalmotor{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlKapalmotor{{$nojk}}").val());
          jumlah = Number($("#jmlKapalmotor{{$nojk}}").val()) + Number($("#jmlPerahumotor{{$nojk}}").val()) + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          $("#jmlArmada{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalKapalmotor").val(hc);
        $("#totalArmada").val(Number($("#totalKapalmotor").val()) + Number($("#totalPerahumotor").val()) + Number($("#totalPerahutanpamotor").val()));
    });
    $("#jmlPerahumotor{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPerahumotor{{$nojk}}").val());
          jumlah = Number($("#jmlKapalmotor{{$nojk}}").val()) + Number($("#jmlPerahumotor{{$nojk}}").val()) + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          $("#jmlArmada{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPerahumotor").val(hc);
        $("#totalArmada").val(Number($("#totalKapalmotor").val()) + Number($("#totalPerahumotor").val()) + Number($("#totalPerahutanpamotor").val()));
    });
    $("#jmlPerahutanpamotor{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          jumlah = Number($("#jmlKapalmotor{{$nojk}}").val()) + Number($("#jmlPerahumotor{{$nojk}}").val()) + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          $("#jmlArmada{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPerahutanpamotor").val(hc);
        $("#totalArmada").val(Number($("#totalKapalmotor").val()) + Number($("#totalPerahumotor").val()) + Number($("#totalPerahutanpamotor").val()));
    });
    $("#jmlKapalmotor{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlKapalmotor{{$nojk}}").val());
          jumlah = Number($("#jmlKapalmotor{{$nojk}}").val()) + Number($("#jmlPerahumotor{{$nojk}}").val()) + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          $("#jmlArmada{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalKapalmotor").val(hc);
        $("#totalArmada").val(Number($("#totalKapalmotor").val()) + Number($("#totalPerahumotor").val()) + Number($("#totalPerahutanpamotor").val()));
    });
    $("#jmlPerahumotor{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPerahumotor{{$nojk}}").val());
          jumlah = Number($("#jmlKapalmotor{{$nojk}}").val()) + Number($("#jmlPerahumotor{{$nojk}}").val()) + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          $("#jmlArmada{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPerahumotor").val(hc);
        $("#totalArmada").val(Number($("#totalKapalmotor").val()) + Number($("#totalPerahumotor").val()) + Number($("#totalPerahutanpamotor").val()));
    });
    $("#jmlPerahutanpamotor{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          jumlah = Number($("#jmlKapalmotor{{$nojk}}").val()) + Number($("#jmlPerahumotor{{$nojk}}").val()) + Number($("#jmlPerahutanpamotor{{$nojk}}").val());
          $("#jmlArmada{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPerahutanpamotor").val(hc);
        $("#totalArmada").val(Number($("#totalKapalmotor").val()) + Number($("#totalPerahumotor").val()) + Number($("#totalPerahutanpamotor").val()));
    });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("perikanan");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Armada'],
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
                   $kata = $kata . $jkg->totalArmada. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Kapal Motor'],
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
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalKapalmotor . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perahu Motor'],
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
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPerahumotor. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perahu Tanpa Motor'],
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
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPerahutanpamotor. ',';
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
                       text: 'Grafik Data Jumlah Armada Penangkapan Ikan'
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
