@extends('layouts.app')
@section('title','Data Penerbitan Izin dan Realisasi Retribusi')

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
        <li class="breadcrumb-item"><a href="/diknas/kondisiSD">Penanaman Modal dan PTSP</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Penerbitan Izin dan Realisasi Retribusi</li>
      </ol>
    </nav>
  </div>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <b>Data Penerbitan Izin dan Realisasi Retribusi</b>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">Jumlah Penerbitan Izin</a>
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
          <canvas id="penerbitanizin" width="800px" height="400px"></canvas>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <b>Jumlah Penerbitan Izin</b>
          <table class="table table-striped" id="kepalaX">
            <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Jumlah Penerbitan Izin</th>
                <th>Jumlah Retribusi</th>
                <th>Proses</th>
              </tr>
            </thead>
            <?php
              $nomor = 1;
              foreach ($dataMaster as $dataM) {
                  ?>
              <form action="/pemodal/penerbitanizin/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                <tr>
                  <input type="hidden" name="penerbitanizinMaster{{$dataM->id}}" value="">
                  <td>{{$nomor}}</td>
                  <?php
                    $namabln =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                   ?>
                  <td>{{$namabln[$dataM->bln]}}</td>
                  <td>{{$dataM->totalPenerbitan}}</td>
                  <td>{{$dataM->totalRetribusi}}</td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->bln}})">
                      <img src="/pics/view.png" alt="">
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
        <!-- input data rekap baru -->
  <div class="collapse" id="collapseExample">
    <form class="form-group" id="formrekap" action="/pemodal/penerbitanizin/store" method="post">
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
                  <th>Bidang Usaha</th>
                  <th>Jumlah Penerbitan Izin</th>
                  <th>Jumlah Retribusi (.000)</th>
                </tr>
              </thead>
              <?php
                $nomor = 1;
                foreach ($databidang_izin as $dataB) {
                    ?>
                  <tr>
                    <td>{{$nomor}}</td>
                    <td>{{$dataB->nmaBidang}}</td>
                    <td>
                      <input type="number" id="jmlPenerbitan{{$nomor}}" class="form-control" name="jmlPenerbitan{{$nomor}}" value="0">
                    </td>
                    <td>
                      <input type="number" id="jmlRetribusi{{$nomor}}" class="form-control" name="jmlRetribusi{{$nomor}}" value="0">
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
                   <input type="number" id="totalPenerbitan" class="form-control" name="totalPenerbitan" value="0" readonly>
                 </td>
                 <td>
                   <input type="number" id="totalRetribusi" class="form-control" name="totalRetribusi" value="0" readonly>
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
          xmlhttp.open("GET","{{url('pemodal/penerbitanizin/detail')}}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

    <script>
     $(document).ready(function() {

       <?php
         $nopu = 1;
         foreach ($databidang_izin as $pus) {
           ?>
           $("#jmlPenerbitan{{$nopu}}").keyup(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($databidang_izin as $pk){ ?>
                 ksd = ksd + Number($("#jmlPenerbitan{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalPenerbitan").val(ksd);
           });

           $("#jmlRetribusi{{$nopu}}").keyup(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($databidang_izin as $pk){ ?>
                 ksd = ksd + Number($("#jmlRetribusi{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalRetribusi").val(ksd);
           });
           $("#jmlPenerbitan{{$nopu}}").change(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($databidang_izin as $pk){ ?>
                 ksd = ksd + Number($("#jmlPenerbitan{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalPenerbitan").val(ksd);
           });

           $("#jmlRetribusi{{$nopu}}").change(function() {
             var ksd = 0;
             var kk = 0;
             var pkk = 0;
             <?php
               $nojk = 1;
               foreach ($databidang_izin as $pk){ ?>
                 ksd = ksd + Number($("#jmlRetribusi{{$nojk}}").val());
             <?php
               $nojk ++;
              }
             ?>
             $("#totalRetribusi").val(ksd);
           });

             <?php
               $nopu ++;
             }
            ?>
        });
     </script>

     <script>
     var ctx = document.getElementById("penerbitanizin");
      var myLineChart = new Chart(ctx, {
       type: 'line',
       data: {
         datasets: [{
           borderWidth: 3,
           label: ['Jumlah Penerbitan Izin'],
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
                      $kata = $kata . $jkg->totalPenerbitan. ',';
                  }
                  $kata = $kata . "]";
                  $kata = str_replace(",]", "]", $kata);
                  echo $kata;
                 ?>
         },
         {
           borderWidth: 3,
           label: ['Jumlah Retribusi'],
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
                      $kata = $kata . $jkg->totalRetribusi. ',';
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
                text: 'Grafik Jumlah Penerbitan Izin'
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
