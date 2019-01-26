@extends('layouts.app')
@section('title','Data Kependudukan (Kartu Keluarga)')

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
        <li class="breadcrumb-item"><a href="/diknas/kondisiSD">Kependudukan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kependudukan (Kartu Keluarga)</li>
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
      <b>Data Jumlah Kepala Keluarga</b>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">Jumlah Kepala Keluarga</a>
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
          <canvas id="kartukeluarga" width="800px" height="400px"></canvas>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <b>Jumlah Kepala Keluarga</b>
          <table class="table table-striped" id="kepalaX">
            <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Jumlah Kepala Keluarga</th>
                <th>Jml. Kepemilikan KK</th>
                <th>Persentase</th>
                <th>Proses</th>
              </tr>
            </thead>
            <?php
              $nomor = 1;
              foreach ($dataMaster as $dataM) {
                  ?>
              <form action="/kependudukan/kartukeluarga/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                <tr>
                  <input type="hidden" name="KKMaster{{$dataM->id}}" value="">
                  <td>{{$nomor}}</td>
                 
                  <td>{{$namabln[$dataM->bln]}}</td>
                  <td>{{$dataM->totalKK}}</td>
                  <td>{{$dataM->totalMilikiKK}}</td>
                  <?php
                    if ($dataM->totalKK > 0) {
                      $persen = ($dataM->totalMilikiKK / $dataM->totalKK) * 100;
                    } else {$persen = 0;}
                   ?>
                  <td>{{round($persen,2)}}</td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->id}})">
                      <img src="/pics/view.png" alt="">
                    </a>
                    <a href="/kependudukan/kartukeluarga/edit/{{$dataM->id}}"><img src="/pics/edit.png" alt=""></a>
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
    <form class="form-group" id="formrekap" action="/kependudukan/kartukeluarga/update/{{$kodeEdit}}" method="post">
    <div class="card">
      <div class="card-header">
        <div class="row">
            <label for="bln" class="col-sm-2 col-form-label text-md-right">Bulan</label>
            <div class="col-md-8">
              <select class="form-control" id="bln" style="max-width:200px" name="bln">
                <?php
                for ($x = 1; $x <= 12; $x++) {
                  if ($x == $dataE->bln) {
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
                  <th>Bulan</th>
                  <th>Jumlah Kepala Keluarga</th>
                  <th>Jml.Kepemilikan KK</th>
                  <th>Persentase</th>
                </tr>
              </thead>
              <input type="hidden" name="_method" value="PUT">
              <?php
                $nomor = 1;
                foreach ($dataDetail as $dataD) {
                    ?>
                  <tr>
                    <td>{{$nomor}}</td>
                    <td>{{$dataD->nmaKecamatan}}</td>
                    <td>
                      <input type="number" id="jmlKK{{$nomor}}" class="form-control" name="jmlKK{{$nomor}}" value="{{$dataD->jmlKK}}">
                    </td>
                    <td>
                      <input type="number" id="jmlMilikiKK{{$nomor}}" class="form-control" name="jmlMilikiKK{{$nomor}}" value="{{$dataD->jmlMilikiKK}}">
                    </td>
                    <?php
                      if ($dataD->jmlKK > 0) {
                        $persenjml = ($dataD->jmlPunyaKK / $dataD->jmlKK) * 100;
                      } else {$persenjml = 0;}
                     ?>
                    <td>
                      <input type="number" id="persenKK{{$nomor}}" class="form-control" name="persenKK{{$nomor}}" value="{{$persenjml}}" readonly>
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
                   <input type="number" id="totalKK" class="form-control" name="totalKK" value="{{$dataE->totalKK}}" readonly>
                 </td>
                 <td>
                   <input type="number" id="totalMilikiKK" class="form-control" name="totalMilikiKK" value="{{$dataE->totalMilikiKK}}" readonly>
                 </td>
                 <?php
                   if ($dataE->totalKK > 0) {
                     $persenKK = ($dataE->totalPunyaKK / $dataM->totalKK) * 100;
                   } else {$persenKK = 0;}
                  ?>
                 <td>
                   <input type="text" id="totalpersenKK" class="form-control" name="totalpersenKK" value="{{$persenKK}}" readonly>
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
          xmlhttp.open("GET","/modals/kependudukan/getKartukeluarga.php?q="+str,true);
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
           $("#jmlKK{{$nopu}}").keyup(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlKK{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalKK").val(ksd);
             if ($("#jmlMilikiKK{{$nopu}}").val() > 0) {
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlKK{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalKK").val())) * 100);
             }
           });

           $("#jmlMilikiKK{{$nopu}}").keyup(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlMilikiKK{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalMilikiKK").val(ksd);
             if ($("#jmlMilikiKK{{$nopu}}").val() > 0) {
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlKK{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalKK").val())) * 100);
             }
           });
           $("#jmlKK{{$nopu}}").change(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlKK{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalKK").val(ksd);
             if ($("#jmlMilikiKK{{$nopu}}").val() > 0) {
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlKK{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalKK").val())) * 100);
             }
           });

           $("#jmlMilikiKK{{$nopu}}").change(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlMilikiKK{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalMilikiKK").val(ksd);
             if ($("#jmlMilikiKK{{$nopu}}").val() > 0) {
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlKK{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalKK").val())) * 100);
             }
           });

             <?php
               $nopu ++;
             }
            ?>
        });
     </script>

     <script>
     var ctx = document.getElementById("kartukeluarga");
      var myLineChart = new Chart(ctx, {
       type: 'line',
       data: {
         datasets: [{
           borderWidth: 3,
           label: ['Jumlah KK'],
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
                      $kata = $kata . $jkg->totalKK. ',';
                  }
                  $kata = $kata . "]";
                  $kata = str_replace(",]", "]", $kata);
                  echo $kata;
                 ?>
         },
         {
           borderWidth: 3,
           label: ['Memiliki KK'],
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
                      $kata = $kata . $jkg->totalMilikiKK. ',';
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
                text: 'Grafik Jumlah Kepala Keluarga dan Kartu Keluarga'
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
