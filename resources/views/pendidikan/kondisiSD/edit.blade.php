@extends('layouts.app')
@section('title','Data Kondisi Bangunan Sekolah SD Sederajat')

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
        <li class="breadcrumb-item"><a href="/diknas/">Pendidikan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kondisi Bangunan Sekolah SD Sederajat</li>
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
        <b>Data Kondisi Bangunan Sekolah SD Sederajat</b>
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
              <canvas id="kondisiSD" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Kondisi Bangunan Sekolah SD Sederajat</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah SD/Sederajat</th>
                  <th>Kondisi Baik</th>
                  <th>Rusak Ringan</th>
                  <th>Rusak Berat</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataM as $ksd) {
                    ?>
                <form action="/pendidikan/kondisiSD/destroy/{{$ksd->id}}" id="form{{$ksd->id}}" method="post">
                  <tr>
                    <input type="hidden" name="kondisiSDMaster{{$ksd->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$ksd->ta}}</td>
                    <td style="text-align: center">{{$ksd->totalSD}}</td>
                    <td style="text-align: center">{{$ksd->totalKondisiBaik}}</td>
                    <td style="text-align: center">{{$ksd->totalRusakRingan}}</td>
                    <td style="text-align: center">{{$ksd->totalRusakBerat}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$ksd->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pendidikan/kondisiSD/edit/{{$ksd->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$ksd->id}}')">
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
  foreach ($dataM as $totalM) {
    $id=$totalM->id;
    $tahun=$totalM->ta;
    $totSD=$totalM->totalSD;
    $totKB=$totalM->totalKondisiBaik;
    $totRR=$totalM->totalRusakRingan;
    $totRB=$totalM->totalRusakBerat;
  }
 ?>
    <!-- input data rekap baru -->
    <div class="collapse show" id="collapseExample">
      <div class="card">
        <div class="card-header">
          <b>Edit Data : {{$tahun}}</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/pendidikan/kondisiSD/update/{{$id}}" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah SD</th>
                    <th>Kondisi Baik</th>
                    <th>Rusak Ringan</th>
                    <th>Rusak Berat</th>
                  </tr>
              </thead>
              <input type="hidden" name="_method" value="PUT">
                <?php
                  $nomor = 1;
                  foreach ($dataD as $detailX) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$detailX->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlSD{{$nomor}}" class="form-control" name="jmlSD{{$nomor}}" value="{{$detailX->jmlSD}}" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlKondisiBaik{{$nomor}}" class="form-control" name="jmlKondisiBaik{{$nomor}}" value="{{$detailX->jmlKondisiBaik}}">
                      </td>
                      <td>
                        <input type="number" id="jmlRusakRingan{{$nomor}}" class="form-control" name="jmlRusakRingan{{$nomor}}" value="{{$detailX->jmlRusakRingan}}">
                      </td>
                      <td>
                        <input type="number" id="jmlRusakBerat{{$nomor}}" class="form-control" name="jmlRusakBerat{{$nomor}}" value="{{$detailX->jmlRusakBerat}}">
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
                     <input type="number" id="totalSD" class="form-control" name="totalSD" value="{{$totSD}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKondisiBaik" class="form-control" name="totalKondisiBaik" value="{{$totKB}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalRusakRingan" class="form-control" name="totalRusakRingan" value="{{$totRR}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalRusakBerat" class="form-control" name="totalRusakBerat" value="{{$totRB}}" readonly>
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
          xmlhttp.open("GET","{{url('pendidikan/kondisiSD/detail/')}}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
$(document).ready(function() {

  <?php
    $nopu = 1;
    foreach ($kecamatan as $pus) {
   ?>
    $("#jmlKondisiBaik{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlKondisiBaik{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalKondisiBaik").val(ksd);
        jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
        $("#jmlSD{{$nopu}}").val(jumlahSD);
        thetotalSD = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalSD").val(thetotalSD);
      });

      $("#jmlRusakRingan{{$nopu}}").keyup(function() {
        ksd = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            ksd = ksd + Number($("#jmlRusakRingan{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalRusakRingan").val(ksd);
          jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
          $("#jmlSD{{$nopu}}").val(jumlahSD);
          thetotalSD = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalSD").val(thetotalSD);
        });

        $("#jmlRusakBerat{{$nopu}}").keyup(function() {
          ksd = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              ksd = ksd + Number($("#jmlRusakBerat{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalRusakBerat").val(ksd);
            jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
            $("#jmlSD{{$nopu}}").val(jumlahSD);
            thetotalSD = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalSD").val(thetotalSD);
          });

          $("#jmlKondisiBaik{{$nopu}}").change(function() {
            ksd = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                ksd = ksd + Number($("#jmlKondisiBaik{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalKondisiBaik").val(ksd);
              jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
              $("#jmlSD{{$nopu}}").val(jumlahSD);
              thetotalSD = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalSD").val(thetotalSD);
            });

            $("#jmlRusakRingan{{$nopu}}").change(function() {
              ksd = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  ksd = ksd + Number($("#jmlRusakRingan{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalRusakRingan").val(ksd);
                jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
                $("#jmlSD{{$nopu}}").val(jumlahSD);
                thetotalSD = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalSD").val(thetotalSD);
              });

              $("#jmlRusakBerat{{$nopu}}").change(function() {
                ksd = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    ksd = ksd + Number($("#jmlRusakBerat{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalRusakBerat").val(ksd);
                  jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
                  $("#jmlSD{{$nopu}}").val(jumlahSD);
                  thetotalSD = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
                  <?php
                    $nojk ++;
                    } ?>
                    $("#totalSD").val(thetotalSD);
                });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("kondisiSD");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah SD'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalSD. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Kondisi Baik'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalKondisiBaik. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Rusak Ringan'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalRusakRingan. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Rusak Berat'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalRusakBerat. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
        ,

      }],
      // define label
      <?php
        $katax = "['";
        foreach ($dataC as $jkg) {
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
                       text: 'Grafik Kondisi Bangunan Sekolah SD Sederajat'
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
