@extends('layouts.app')
@section('title','Data Kondisi Bangunan Sekolah TK Sederajat')

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
        <li class="breadcrumb-item active" aria-current="page">Data Kondisi Bangunan Sekolah TK Sederajat</li>
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
        <b>Data Kondisi Bangunan Sekolah TK Sederajat</b>
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
              <canvas id="kondisiTK" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Kondisi Bangunan Sekolah TK Sederajat</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah TK/Sederajat</th>
                  <th>Kondisi Baik</th>
                  <th>Rusak Ringan</th>
                  <th>Rusak Berat</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataA as $kTK) {
                    ?>
                <form action="/pendidikan/kondisiTK/destroy/{{$kTK->id}}" id="form{{$kTK->id}}" method="post">
                  <tr>
                    <input type="hidden" name="kondisiTKMaster{{$kTK->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$kTK->ta}}</td>
                    <td style="text-align: center">{{$kTK->totalTK}}</td>
                    <td style="text-align: center">{{$kTK->totalKondisiBaik}}</td>
                    <td style="text-align: center">{{$kTK->totalRusakRingan}}</td>
                    <td style="text-align: center">{{$kTK->totalRusakBerat}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$kTK->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pendidikan/kondisiTK/edit/{{$kTK->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$kTK->id}}')">
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
          <form class="form-group" action="kondisiTK/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah TK</th>
                    <th>Kondisi Baik</th>
                    <th>Rusak Ringan</th>
                    <th>Rusak Berat</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($kecamatan as $xkTK) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$xkTK->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlTK{{$nomor}}" class="form-control" name="jmlTK{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlKondisiBaik{{$nomor}}" class="form-control" name="jmlKondisiBaik{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlRusakRingan{{$nomor}}" class="form-control" name="jmlRusakRingan{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlRusakBerat{{$nomor}}" class="form-control" name="jmlRusakBerat{{$nomor}}" value="0">
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
                     <input type="number" id="totalTK" class="form-control" name="totalTK" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKondisiBaik" class="form-control" name="totalKondisiBaik" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalRusakRingan" class="form-control" name="totalRusakRingan" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalRusakBerat" class="form-control" name="totalRusakBerat" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('pendidikan/kondisiTK/detail') }}"+'/'+str,true);
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
      kTK = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          kTK = kTK + Number($("#jmlKondisiBaik{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalKondisiBaik").val(kTK);
        jumlahTK=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
        $("#jmlTK{{$nopu}}").val(jumlahTK);
        thetotalTK = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            thetotalTK = thetotalTK + Number($("#jmlTK{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalTK").val(thetotalTK);
      });

      $("#jmlRusakRingan{{$nopu}}").keyup(function() {
        kTK = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            kTK = kTK + Number($("#jmlRusakRingan{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalRusakRingan").val(kTK);
          jumlahTK=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
          $("#jmlTK{{$nopu}}").val(jumlahTK);
          thetotalTK = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              thetotalTK = thetotalTK + Number($("#jmlTK{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalTK").val(thetotalTK);
        });

        $("#jmlRusakBerat{{$nopu}}").keyup(function() {
          kTK = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              kTK = kTK + Number($("#jmlRusakBerat{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalRusakBerat").val(kTK);
            jumlahTK=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
            $("#jmlTK{{$nopu}}").val(jumlahTK);
            thetotalTK = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                thetotalTK = thetotalTK + Number($("#jmlTK{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalTK").val(thetotalTK);
          });

          $("#jmlKondisiBaik{{$nopu}}").change(function() {
            kTK = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                kTK = kTK + Number($("#jmlKondisiBaik{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalKondisiBaik").val(kTK);
              jumlahTK=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
              $("#jmlTK{{$nopu}}").val(jumlahTK);
              thetotalTK = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  thetotalTK = thetotalTK + Number($("#jmlTK{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalTK").val(thetotalTK);
            });

            $("#jmlRusakRingan{{$nopu}}").change(function() {
              kTK = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  kTK = kTK + Number($("#jmlRusakRingan{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalRusakRingan").val(kTK);
                jumlahTK=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
                $("#jmlTK{{$nopu}}").val(jumlahTK);
                thetotalTK = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    thetotalTK = thetotalTK + Number($("#jmlTK{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalTK").val(thetotalTK);
              });

              $("#jmlRusakBerat{{$nopu}}").change(function() {
                kTK = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    kTK = kTK + Number($("#jmlRusakBerat{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalRusakBerat").val(kTK);
                  jumlahTK=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
                  $("#jmlTK{{$nopu}}").val(jumlahTK);
                  thetotalTK = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      thetotalTK = thetotalTK + Number($("#jmlTK{{$nojk}}").val());
                  <?php
                    $nojk ++;
                    } ?>
                    $("#totalTK").val(thetotalTK);
                });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("kondisiTK");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah TK'],
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
                   $kata = $kata . $jkg->totalTK. ',';
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
                       text: 'Grafik Kondisi Bangunan Sekolah TK Sederajat'
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
