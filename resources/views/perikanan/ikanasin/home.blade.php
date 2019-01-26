@extends('layouts.app')
@section('title','Data Produksi Ikan Asin/Olahan')

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
        <li class="breadcrumb-item active" aria-current="page">Data Produksi Ikan Asin/Olahan</li>
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
        <b>Data Produksi Ikan Asin/Olahan</b>
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
              <caption style="caption-side:top;">Data Produksi Ikan Asin/Olahan</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Total Produksi (ton)</th>
                  <th>Perikanan Laut</th>
                  <th>Perikanan Darat</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/perikanan/ikanasin/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="ikanasinMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalProduksi}}</td>
                    <td style="text-align: center">{{$dataM->totalLaut}}</td>
                    <td style="text-align: center">{{$dataM->totalDarat}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/perikanan/ikanasin/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/perikanan/ikanasin/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Produksi (ton)</th>
                    <th>Perikanan Laut</th>
                    <th>Perikanan Darat</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($dataKecamatan as $dataK) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$dataK->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlProduksi{{$nomor}}" class="form-control" name="jmlProduksi{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlLaut{{$nomor}}" class="form-control" name="jmlLaut{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlDarat{{$nomor}}" class="form-control" name="jmlDarat{{$nomor}}" value="0">
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
                     <input type="number" id="totalProduksi" class="form-control" name="totalProduksi" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalLaut" class="form-control" name="totalLaut" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalDarat" class="form-control" name="totalDarat" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('perikanan/ikanasin/detail') }}"+'/'+str,true);
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
    $("#jmlLaut{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlLaut{{$nojk}}").val());
          jumlah = Number($("#jmlLaut{{$nojk}}").val()) + Number($("#jmlDarat{{$nojk}}").val());
          $("#jmlProduksi{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalLaut").val(hc);
        $("#totalProduksi").val(Number($("#totalLaut").val()) + Number($("#totalDarat").val()));
    });
    $("#jmlDarat{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlDarat{{$nojk}}").val());
          jumlah = Number($("#jmlLaut{{$nojk}}").val()) + Number($("#jmlDarat{{$nojk}}").val());
          $("#jmlProduksi{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalDarat").val(hc);
        $("#totalProduksi").val(Number($("#totalLaut").val()) + Number($("#totalDarat").val()));
    });
    $("#jmlLaut{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlLaut{{$nojk}}").val());
          jumlah = Number($("#jmlLaut{{$nojk}}").val()) + Number($("#jmlDarat{{$nojk}}").val());
          $("#jmlProduksi{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalLaut").val(hc);
        $("#totalProduksi").val(Number($("#totalLaut").val()) + Number($("#totalDarat").val()));
    });
    $("#jmlDarat{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlDarat{{$nojk}}").val());
          jumlah = Number($("#jmlLaut{{$nojk}}").val()) + Number($("#jmlDarat{{$nojk}}").val());
          $("#jmlProduksi{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalDarat").val(hc);
        $("#totalProduksi").val(Number($("#totalLaut").val()) + Number($("#totalDarat").val()));
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
        label: ['Produksi (ton)'],
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
                   $kata = $kata . $jkg->totalProduksi. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perikanan Laut'],
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
                   $kata = $kata . $jkg->totalLaut . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perikanan Darat'],
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
                   $kata = $kata . $jkg->totalDarat. ',';
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
                       text: 'Grafik Data Produksi Ikan Asin/Olahan'
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
