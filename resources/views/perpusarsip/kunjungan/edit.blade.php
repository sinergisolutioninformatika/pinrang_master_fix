@extends('layouts.app')
@section('title','Data Kunjungan Perpustakaan')

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
        <li class="breadcrumb-item"><a href="/diknas/">Perpustakaan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kunjungan Perpustakaan</li>
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
        <b>Data Kunjungan Perpustakaan</b>
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
              <canvas id="Perpustakaan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Kunjungan Perpustakaan</caption>
              <tr>
                <thead>
                  <th style="text-align: center">No.</th>
                  <th>Tahun</th>
                  <th style="text-align: center">Total Kunjungan</th>
                  <th style="text-align: center">Laki</th>
                  <th style="text-align: center">Perempuan</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/perpusarsip/kunjungan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="kunjunganMaster{{$dataM->id}}" value="">
                    <td style="text-align: center">{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalKunjungan}}</td>
                    <td style="text-align: center">{{$dataM->totalLaki}}</td>
                    <td style="text-align: center">{{$dataM->totalPerempuan}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/perpusarsip/kunjungan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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


    <div class="collapse show" id="collapseExample">
        <div class="card">
          <div class="card-header">
          
            {{-- <b>Edit Data : {{$dataEdit->ta}}</b> --}}
          </div>
          <div class="card-body">
            <form class="form-group" action="/perpusarsip/kunjungan/update/{{$kodeEdit}}" method="post">
              <input type="hidden" name="_method" value="PUT">
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <thead>
                            <th style="text-align: center">No.</th>
                            <th>Tahun</th>
                            <th style="text-align: center">Total Kunjungan</th>
                            <th style="text-align: center">Laki</th>
                            <th style="text-align: center">Perempuan</th>
                            <th>Proses</th>
                          </thead>
                        </tr>
                </thead>
                <?php
                $nomor = 1;
                foreach ($dataDetail as $dataL) {
                    ?>
                  <tr>
                    <td style="text-align: center">{{$nomor}}</td>
                    <td nowrap>{{$dataL->nmaLokasi}}</td>
                    <td>
                    <input type="number" id="jmlKunjungan{{$nomor}}" class="form-control" name="jmlKunjungan{{$nomor}}" value="{{ $dataL->jmlKunjungan }}" readonly>
                    </td>
                    <td>
                      <input type="number" id="jmlLaki{{$nomor}}" class="form-control" name="jmlLaki{{$nomor}}" value="{{ $dataL->jmlLaki }}">
                    </td>
                    <td>
                      <input type="number" id="jmlPerempuan{{$nomor}}" class="form-control" name="jmlPerempuan{{$nomor}}" value="{{ $dataL->jmlPerempuan}}">
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
                        <input type="number" id="totalKunjungan" class="form-control" name="totalKunjungan" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="totalLaki" class="form-control" name="totalLaki" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="totalPerempuan" class="form-control" name="totalPerempuan" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('perpusarsip/kunjungan/detail') }}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
$(document).ready(function() {

  <?php
    $nopu = 1;
    foreach ($dataLokasi as $pus) {
   ?>
    $("#jmlLaki{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataLokasi as $pk){ ?>
          hc = hc + Number($("#jmlLaki{{$nojk}}").val());
          jumlah = Number($("#jmlLaki{{$nojk}}").val()) + Number($("#jmlPerempuan{{$nojk}}").val());
          $("#jmlKunjungan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalLaki").val(hc);
        $("#totalKunjungan").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
    });
    $("#jmlPerempuan{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataLokasi as $pk){ ?>
          hc = hc + Number($("#jmlPerempuan{{$nojk}}").val());
          jumlah = Number($("#jmlLaki{{$nojk}}").val()) + Number($("#jmlPerempuan{{$nojk}}").val());
          $("#jmlKunjungan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPerempuan").val(hc);
        $("#totalKunjungan").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
    });
    $("#jmlSawah{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataLokasi as $pk){ ?>
          hc = hc + Number($("#jmlSawah{{$nojk}}").val());
          jumlah = Number($("#jmlLaki{{$nojk}}").val()) + Number($("#jmlPerempuan{{$nojk}}").val());
          $("#jmlKunjungan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalSawah").val(hc);
        $("#totalKunjungan").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
    });
    $("#jmlLaki{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataLokasi as $pk){ ?>
          hc = hc + Number($("#jmlLaki{{$nojk}}").val());
          jumlah = Number($("#jmlLaki{{$nojk}}").val()) + Number($("#jmlPerempuan{{$nojk}}").val());
          $("#jmlKunjungan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalLaki").val(hc);
        $("#totalKunjungan").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
    });
    $("#jmlPerempuan{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataLokasi as $pk){ ?>
          hc = hc + Number($("#jmlPerempuan{{$nojk}}").val());
          jumlah = Number($("#jmlLaki{{$nojk}}").val()) + Number($("#jmlPerempuan{{$nojk}}").val());
          $("#jmlKunjungan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPerempuan").val(hc);
        $("#totalKunjungan").val(Number($("#totalLaki").val()) + Number($("#totalPerempuan").val()));
    });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("Perpustakaan");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Total Kunjungan'],
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
                   $kata = $kata . $jkg->totalKunjungan. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Laki-laki'],
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
                   $kata = $kata . $jkg->totalLaki . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perempuan'],
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
                   $kata = $kata . $jkg->totalPerempuan. ',';
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
                       text: 'Grafik Data Kunjungan Perpustakaan'
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
