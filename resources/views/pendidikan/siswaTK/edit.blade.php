@extends('layouts.app')
@section('title','Data Jumlah Siswa (Taman Kanak-kanak)')

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
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Siswa (Taman Kanak-kanak)</li>
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
        <b>Data Jumlah Siswa (Taman Kanak-kanak)</b>
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
              <canvas id="siswaTK" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Siswa (Taman Kanak-kanak)</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Siswa TK</th>
                  <th>Laki-laki</th>
                  <th>Perempuan</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataM as $detM) {
                    ?>
                <form action="/pendidikan/siswaTK/destroy/{{$detM->id}}" id="form{{$detM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="siswaTKMaster{{$detM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$detM->ta}}</td>
                    <td style="text-align: center">{{$detM->totalSiswaTK}}</td>
                    <td style="text-align: center">{{$detM->totalLaki}}</td>
                    <td style="text-align: center">{{$detM->totalPerempuan}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$detM->id}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pendidikan/siswaTK/edit/{{$detM->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$detM->id}}')">
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
    $totTK=$totalM->totalSiswaTK;
    $totKB=$totalM->totalLaki;
    $totRR=$totalM->totalPerempuan;
  }
 ?>
    <!-- input data rekap baru -->
    <div class="collapse show" id="collapseExample">
      <div class="card">
        <div class="card-header">
          <b>Edit Data : {{$tahun}}</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/pendidikan/siswaTK/update/{{$id}}" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Siswa TK</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
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
                        <input type="number" id="jmlSiswaTK{{$nomor}}" class="form-control" name="jmlSiswaTK{{$nomor}}" value="{{$detailX->jmlSiswaTK}}" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlLaki{{$nomor}}" class="form-control" name="jmlLaki{{$nomor}}" value="{{$detailX->jmlLaki}}">
                      </td>
                      <td>
                        <input type="number" id="jmlPerempuan{{$nomor}}" class="form-control" name="jmlPerempuan{{$nomor}}" value="{{$detailX->jmlPerempuan}}">
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
                     <input type="number" id="totalSiswaTK" class="form-control" name="totalSiswaTK" value="{{$totTK}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalLaki" class="form-control" name="totalLaki" value="{{$totKB}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPerempuan" class="form-control" name="totalPerempuan" value="{{$totRR}}" readonly>
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
          xmlhttp.open("GET","/modals/diknas/getsiswaTK.php?q="+str,true);
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
    $("#jmlLaki{{$nopu}}").keyup(function() {
      kTK = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          kTK = kTK + Number($("#jmlLaki{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalLaki").val(kTK);
        jumlahTK=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
        $("#jmlSiswaTK{{$nopu}}").val(jumlahTK);
        thetotalSiswaTK = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            thetotalSiswaTK = thetotalSiswaTK + Number($("#jmlSiswaTK{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalSiswaTK").val(thetotalSiswaTK);
      });

      $("#jmlPerempuan{{$nopu}}").keyup(function() {
        kTK = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            kTK = kTK + Number($("#jmlPerempuan{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalPerempuan").val(kTK);
          jumlahTK=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
          $("#jmlSiswaTK{{$nopu}}").val(jumlahTK);
          thetotalSiswaTK = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              thetotalSiswaTK = thetotalSiswaTK + Number($("#jmlSiswaTK{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalSiswaTK").val(thetotalSiswaTK);
        });

          $("#jmlLaki{{$nopu}}").change(function() {
            kTK = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                kTK = kTK + Number($("#jmlLaki{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalLaki").val(kTK);
              jumlahTK=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
              $("#jmlSiswaTK{{$nopu}}").val(jumlahTK);
              thetotalSiswaTK = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  thetotalSiswaTK = thetotalSiswaTK + Number($("#jmlSiswaTK{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalSiswaTK").val(thetotalSiswaTK);
            });

            $("#jmlPerempuan{{$nopu}}").change(function() {
              kTK = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  kTK = kTK + Number($("#jmlPerempuan{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalPerempuan").val(kTK);
                jumlahTK=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
                $("#jmlSiswaTK{{$nopu}}").val(jumlahTK);
                thetotalSiswaTK = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    thetotalSiswaTK = thetotalSiswaTK + Number($("#jmlSiswaTK{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalSiswaTK").val(thetotalSiswaTK);
              });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("siswaTK");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Siswa TK'],
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
                   $kata = $kata . $jkg->totalSiswaTK. ',';
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalLaki. ',';
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
               foreach ($dataC as $jkg) {
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
                       text: 'Grafik Jumlah Siswa (Taman Kanak-kanak))'
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
