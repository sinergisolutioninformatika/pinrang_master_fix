

@extends('layouts.app')
@section('title','Data Jaminan Kesehatan Penduduk')

@section('modals')
  <!-- Modal -->
<div class="container">
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
        <li class="breadcrumb-item"><a href="/diknas/kondisiSD">Kesehatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jaminan Kesehatan Penduduk</li>
      </ol>
    </nav>
  </div>
@endsection

@section('menu')
@include('menu')
@endsection

@section('content')
<?php
$namabln =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
?>
<div class="container">
  <div class="card">
    <div class="card-header">
      <b>Data Jaminan Kesehatan Penduduk</b>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">Jumlah Peserta Jaminan Kesehatan</a>
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
          <canvas id="jamkes" width="800px" height="400px"></canvas>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <b>Jumlah Peserta Jaminan Kesehatan</b>
          <table class="table table-striped" id="kepalaX">
            <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Jumlah Peserta</th>
                <th>Laki-laki</th>
                <th>Perempuan</th>
                <th>Proses</th>
              </tr>
            </thead>
            <?php
              $nomor = 1;
              foreach ($dataMaster as $dataM) {
                  ?>
              <form action="/kesehatan/jamkes/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                <tr>
                  <input type="hidden" name="jamkesMaster{{$dataM->id}}" value="">
                  <td>{{$nomor}}</td>
                 
                  <td>{{$namabln[$dataM->bln]}}</td>
                  <td>{{$dataM->totalPeserta}}</td>
                  <td>{{$dataM->totalLaki}}</td>
                  <td>{{$dataM->totalPerempuan}}</td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->id}})">
                      <img src="/pics/view.png" alt="">
                    </a>
                    <a href="/kesehatan/jamkes/edit/{{$dataM->id}}"><img src="/pics/edit.png" alt=""></a>
                    <a href="#" onclick="return confirm_delete('Are you sure?','form{{$dataM->id}}')">
                      <img src="/pics/delete.png" alt="">
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
    <form class="form-group" id="formrekap" action="/kesehatan/jamkes/update/{{$kodeEdit}}" method="post">
    <div class="card">
      <div class="card-header">
        <div class="row">
            <label for="bln" class="col-sm-2 col-form-label text-md-right">Edit Data Bulan</label>
            <div class="col-md-8">
              <select class="form-control" id="bln" style="max-width:200px" name="bln">
                <?php
                for ($x = 1; $x <= 12; $x++) {
                   if ($dataE->bln == $x) {
                    echo "<option value=" . $x . " selected>" . $namabln[$x] . "</option>";
                  } else {
                    echo "<option value=" . $x . ">" . $namabln[$x] . "</option>";
                  }
                }
                 ?>
              </select>
            </div>
        </div>
      </div>
      <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Puskesmas</th>
                  <th>Jumlah Peserta</th>
                  <th>Laki-laki</th>
                  <th>Perempuan</th>
                </tr>
              </thead>
              <input type="hidden" name="_method" value="PUT">
              <?php
                $nomor = 1;
                foreach ($dataDetail as $dataD) {
                    ?>
                  <tr>
                    <td>{{$nomor}}</td>
                    <td>{{$dataD->nmaPuskesmas}}</td>
                    <td>
                      <input type="number" id="jmlPeserta{{$nomor}}" class="form-control" name="jmlPeserta{{$nomor}}" value="{{$dataD->jmlPeserta}}" readonly>
                    </td>
                    <td>
                      <input type="number" id="jmlLaki{{$nomor}}" class="form-control" name="jmlLaki{{$nomor}}" value="{{$dataD->jmlLaki}}">
                    </td>
                    <td>
                      <input type="number" id="jmlPerempuan{{$nomor}}" class="form-control" name="jmlPerempuan{{$nomor}}" value="{{$dataD->jmlPerempuan}}">
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
                   <input type="number" id="totalPeserta" class="form-control" name="totalPeserta" value="{{$dataE->totalPeserta}}" readonly>
                 </td>
                 <td>
                   <input type="number" id="totalLaki" class="form-control" name="totalLaki" value="{{$dataE->totalLaki}}" readonly>
                 </td>
                 <td>
                   <input type="number" id="totalPerempuan" class="form-control" name="totalPerempuan" value="{{$dataE->totalPerempuan}}" readonly>
                 </td>
               </tr>
               {{csrf_field()}}
            </table>
      </div>
      <div class="card bg-light text-dark">
        <div class="car-footer" style="padding:10px">
          <button type="submit" name="simpan" id="simpan" class="btn btn-info" value="Simpan">Submit</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </div>
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
          xmlhttp.open("GET","/modals/kesehatan/getjamkes.php?q="+str,true);
          xmlhttp.send();
      }
  }
  </script>

    <script>
     $(document).ready(function() {

       <?php
         $nopu = 1;
         foreach ($dataPuskesmas as $pus) {
           ?>
           $("#jmlLaki{{$nopu}}").keyup(function() {
             var jml = 0;
             $("#jmlPeserta{{$nopu}}").val(Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val()))
             <?php
               $nojk = 1;
               foreach ($dataPuskesmas as $pk){ ?>
                 jml = jml + Number($("#jmlLaki{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalLaki").val(jml);
             $("#totalPeserta").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
           });
           $("#jmlPerempuan{{$nopu}}").keyup(function() {
             var jml = 0;
             $("#jmlPeserta{{$nopu}}").val(Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val()))
             <?php
               $nojk = 1;
               foreach ($dataPuskesmas as $pk){ ?>
                 jml = jml + Number($("#jmlPerempuan{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalPerempuan").val(jml);
             $("#totalPeserta").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
           });
           $("#jmlLaki{{$nopu}}").change(function() {
             var jml = 0;
             $("#jmlPeserta{{$nopu}}").val(Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val()))
             <?php
               $nojk = 1;
               foreach ($dataPuskesmas as $pk){ ?>
                 jml = jml + Number($("#jmlLaki{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalLaki").val(jml);
             $("#totalPeserta").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
           });
           $("#jmlPerempuan{{$nopu}}").change(function() {
             var jml = 0;
             $("#jmlPeserta{{$nopu}}").val(Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val()))
             <?php
               $nojk = 1;
               foreach ($dataPuskesmas as $pk){ ?>
                 jml = jml + Number($("#jmlPerempuan{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalPerempuan").val(jml);
             $("#totalPeserta").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
           });
             <?php
               $nopu ++;
             }
            ?>
        });
     </script>

     <script>
     var ctx = document.getElementById("jamkes");
      var myLineChart = new Chart(ctx, {
       type: 'line',
       data: {
         datasets: [{
           borderWidth: 3,
           label: ['Jumlah Peserta'],
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
                      $kata = $kata . $jkg->totalPeserta. ',';
                  }
                  $kata = $kata . "]";
                  $kata = str_replace(",]", "]", $kata);
                  echo $kata;
                 ?>
         },
         {
           borderWidth: 3,
           label: ['Laki-laki'],
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
                      $kata = $kata . $jkg->totalLaki. ',';
                  }
                  $kata = $kata . "]";
                  $kata = str_replace(",]", "]", $kata);
                  echo $kata;
                 ?>
         },
         {
           borderWidth: 3,
           label: ['Perempuan'],
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
                      $kata = $kata . $jkg->totalPerempuan. ',';
                  }
                  $kata = $kata . "]";
                  $kata = str_replace(",]", "]", $kata);
                  echo $kata;
                 ?>
         }],
         labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                 },
       options:{
         title: {
                display: true,
                position: 'top',
                fontsize: 14,
                text: 'Grafik Jumlah Peserta Jaminan Kesehatan'
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
