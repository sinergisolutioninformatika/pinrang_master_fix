@extends('layouts.app')
@section('title','Data Panjang Saluran Irigasi')

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
        <li class="breadcrumb-item"><a href="/psda/">Pengendalian Sumber Daya Air</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Panjang Saluran Irigasi</li>
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
        <b>Data Panjang Saluran Irigasi</b>
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
              <canvas id="irigasi" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Panjang Saluran Irigasi</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th style="text-align: center">Jaringan Tersier</th>
                  <th style="text-align: center">Jaringan Sekunder</th>
                  <th style="text-align: center">Jaringan Induk</th>
                  <th style="text-align: center">jaringan Kuarter</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/psda/irigasi/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="irigasiMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalTersier}}</td>
                    <td style="text-align: center">{{$dataM->totalSekunder}}</td>
                    <td style="text-align: center">{{$dataM->totalInduk}}</td>
                    <td style="text-align: center">{{$dataM->totalKuarter}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/psda/irigasi/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/psda/irigasi/update/{{$kodeEdit}}" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>UPTD</th>
                    <th>Jaringan Tersier</th>
                    <th>Jaringan Sekunder</th>
                    <th>Jaringan Induk</th>
                    <th>Jaringan Kuarter</th>
                  </tr>
              </thead>
              <input type="hidden" name="_method" value="PUT">
                <?php
                  $nomor = 1;
                  foreach ($dataDetail as $dataD) {
                      ?>
                    <tr>
                      <td style="text-align: center;">{{$nomor}}</td>
                      <td nowrap>{{$dataD->nmaUPTD}}</td>
                      <td>
                        <input type="number" id="jmlTersier{{$nomor}}" class="form-control" name="jmlTersier{{$nomor}}" value="{{$dataD->jmlTersier}}">
                      </td>
                      <td>
                        <input type="number" id="jmlSekunder{{$nomor}}" class="form-control" name="jmlSekunder{{$nomor}}" value="{{$dataD->jmlSekunder}}">
                      </td>
                      <td>
                        <input type="number" id="jmlInduk{{$nomor}}" class="form-control" name="jmlInduk{{$nomor}}" value="{{$dataD->jmlInduk}}">
                      </td>
                      <td>
                        <input type="number" id="jmlKuarter{{$nomor}}" class="form-control" name="jmlKuarter{{$nomor}}" value="{{$dataD->jmlKuarter}}">
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
                     <input type="number" id="totalTersier" class="form-control" name="totalTersier" value="{{$dataE->totalTersier}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalSekunder" class="form-control" name="totalSekunder" value="{{$dataE->totalSekunder}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalInduk" class="form-control" name="totalInduk" value="{{$dataE->totalInduk}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKuarter" class="form-control" name="totalKuarter" value="{{$dataE->totalKuarter}}" readonly>
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
          xmlhttp.open("GET","{{ url('psda/irigasi/detail') }}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
$(document).ready(function() {

  <?php
    $nopu = 1;
    foreach ($dataDetail as $pus) {
   ?>
    $("#jmlTersier{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataDetail as $pk){ ?>
          ksd = ksd + Number($("#jmlTersier{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalTersier").val(ksd);
      });
      $("#jmlSekunder{{$nopu}}").keyup(function() {
        ksd = 0;
        <?php
          $nojk = 1;
          foreach ($dataDetail as $pk){ ?>
            ksd = ksd + Number($("#jmlSekunder{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalSekunder").val(ksd);
        });
        $("#jmlInduk{{$nopu}}").keyup(function() {
          ksd = 0;
          <?php
            $nojk = 1;
            foreach ($dataDetail as $pk){ ?>
              ksd = ksd + Number($("#jmlInduk{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalInduk").val(ksd);
          });
          $("#jmlKuarter{{$nopu}}").keyup(function() {
            ksd = 0;
            <?php
              $nojk = 1;
              foreach ($dataDetail as $pk){ ?>
                ksd = ksd + Number($("#jmlKuarter{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalKuarter").val(ksd);
            });
            $("#jmlTersier{{$nopu}}").change(function() {
              ksd = 0;
              <?php
                $nojk = 1;
                foreach ($dataDetail as $pk){ ?>
                  ksd = ksd + Number($("#jmlTersier{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalTersier").val(ksd);
              });
              $("#jmlSekunder{{$nopu}}").change(function() {
                ksd = 0;
                <?php
                  $nojk = 1;
                  foreach ($dataDetail as $pk){ ?>
                    ksd = ksd + Number($("#jmlSekunder{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalSekunder").val(ksd);
                });
                $("#jmlInduk{{$nopu}}").change(function() {
                  ksd = 0;
                  <?php
                    $nojk = 1;
                    foreach ($dataDetail as $pk){ ?>
                      ksd = ksd + Number($("#jmlInduk{{$nojk}}").val());
                  <?php
                    $nojk ++;
                  } ?>
                    $("#totalInduk").val(ksd);
                  });
                  $("#jmlKuarter{{$nopu}}").change(function() {
                    ksd = 0;
                    <?php
                      $nojk = 1;
                      foreach ($dataDetail as $pk){ ?>
                        ksd = ksd + Number($("#jmlKuarter{{$nojk}}").val());
                    <?php
                      $nojk ++;
                    } ?>
                      $("#totalKuarter").val(ksd);
                    });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("irigasi");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Tersier'],
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
                   $kata = $kata . $jkg->totalTersier . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Sekunder'],
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
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalSekunder. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Induk'],
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
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalInduk . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Kuarter'],
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
        // load data
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalKuarter . ',';
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
                       text: 'Grafik Panjang Saluran Irigasi'
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
