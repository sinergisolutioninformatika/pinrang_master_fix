@extends('layouts.app')
@section('title','Data Rekomendasi SPPL')

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
        <li class="breadcrumb-item"><a href="/diknas/kondisiSD">Lingkungan Hidup</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Rekomendasi SPPL</li>
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
      <b>Data Rekomendasi SPPL</b>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">Data Rekomendasi SPPL</a>
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
          <canvas id="sppl" width="800px" height="400px"></canvas>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <b>Jumlah Kepala Keluarga</b>
          <table class="table table-striped" id="kepalaX">
            <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Jumlah SPPL</th>
                <th>Proses</th>
              </tr>
            </thead>
            <?php
              $nomor = 1;
              foreach ($dataMaster as $dataM) {
                  ?>
              <form action="/lingkungan/sppl/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                <tr>
                  <input type="hidden" name="spplMaster{{$dataM->id}}" value="">
                  <td>{{$nomor}}</td>
                  <?php
                    $namabln =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                   ?>
                  <td>{{$namabln[$dataM->bln]}}</td>
                  <td>{{$dataM->totalSurat}}</td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->id}})">
                      <img src="/pics/view.png" alt="">
                    </a>
                    <a href="/lingkungan/sppl/edit/{{$dataM->id}}"><img src="/pics/edit.png" alt=""></a>
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
    <form class="form-group" id="formrekap" action="/lingkungan/sppl/update/{{$kodeEdit}}" method="post">
      <input type="hidden" name="_method" value="PUT">
    <div class="card">
      <div class="card-header">
        <div class="row">
            <label for="bln" class="col-sm-2 col-form-label text-md-right">Bulan</label>
            <div class="col-md-8">
              <select class="form-control" id="bln" style="max-width:200px" name="bln">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
        </div>
      </div>
      <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kecamatan</th>
                  <th>Jumlah SPPL</th>
                </tr>
              </thead>
              <?php
                $nomor = 1;
                foreach ($dataDetail as $dataD) {
                    ?>
                  <tr>
                    <td>{{$nomor}}</td>
                    <td>{{$dataD->nmaKecamatan}}</td>
                    <td>
                      <input type="number" id="jmlSurat{{$nomor}}" class="form-control" name="jmlSurat{{$nomor}}" value="{{$dataD->jmlSurat}}">
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
                   <input type="number" id="totalSurat" class="form-control" name="totalSurat" value="{{$dataE->totalSurat}}" readonly>
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
          xmlhttp.open("GET","/modals/lingkungan/getsppl.php?q="+str,true);
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
           $("#jmlSurat{{$nopu}}").keyup(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlSurat{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalSurat").val(ksd);
             if ($("#jmlMilikiKK{{$nopu}}").val() > 0) {
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlSurat{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalSurat").val())) * 100);
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
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlSurat{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalSurat").val())) * 100);
             }
           });
           $("#jmlSurat{{$nopu}}").change(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlSurat{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalSurat").val(ksd);
             if ($("#jmlMilikiKK{{$nopu}}").val() > 0) {
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlSurat{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalSurat").val())) * 100);
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
               $("#persenKK{{$nopu}}").val(Number($("#jmlMilikiKK{{$nopu}}").val())/Number($("#jmlSurat{{$nopu}}").val())*100);
               $("#totalpersenKK").val((Number($("#totalMilikiKK").val())/Number($("#totalSurat").val())) * 100);
             }
           });

             <?php
               $nopu ++;
             }
            ?>
        });
     </script>

     <script>
     var ctx = document.getElementById("sppl");
      var myLineChart = new Chart(ctx, {
       type: 'line',
       data: {
         datasets: [{
           borderWidth: 3,
           label: ['SPPL'],
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
                      $kata = $kata . $jkg->totalSurat. ',';
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
                text: 'Grafik Rekomendasi SPPL'
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
