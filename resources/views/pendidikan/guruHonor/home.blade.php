@extends('layouts.app')
@section('title','Data Jumlah Guru (Status Honor)')

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
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Guru (Status Honor)</li>
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
        <b>Data Jumlah Guru (Status Honor)</b>
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
              <canvas id="guruHonor" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Guru (Status Honor)</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Guru Honor</th>
                  <th>Guru TK</th>
                  <th>Guru SD</th>
                  <th>Guru SMP</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataA as $detA) {
                    ?>
                <form action="/pendidikan/guruHonor/destroy/{{$detA->id}}" id="form{{$detA->id}}" method="post">
                  <tr>
                    <input type="hidden" name="guruHonorMaster{{$detA->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$detA->ta}}</td>
                    <td style="text-align: center">{{$detA->totalGuruHonor}}</td>
                    <td style="text-align: center">{{$detA->totalGuruTKHonor}}</td>
                    <td style="text-align: center">{{$detA->totalGuruSDHonor}}</td>
                    <td style="text-align: center">{{$detA->totalGuruSMPHonor}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$detA->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pendidikan/guruHonor/edit/{{$detA->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$detA->id}}')">
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
          <form class="form-group" action="guruHonor/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Guru Honor</th>
                    <th>Guru TK</th>
                    <th>Guru SD</th>
                    <th>Guru SMP</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($kecamatan as $xhc) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$xhc->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlGuruHonor{{$nomor}}" class="form-control" name="jmlGuruHonor{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlGuruTKHonor{{$nomor}}" class="form-control" name="jmlGuruTKHonor{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlGuruSDHonor{{$nomor}}" class="form-control" name="jmlGuruSDHonor{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlGuruSMPHonor{{$nomor}}" class="form-control" name="jmlGuruSMPHonor{{$nomor}}" value="0">
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
                     <input type="number" id="totalGuruHonor" class="form-control" name="totalGuruHonor" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalGuruTKHonor" class="form-control" name="totalGuruTKHonor" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalGuruSDHonor" class="form-control" name="totalGuruSDHonor" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalGuruSMPHonor" class="form-control" name="totalGuruSMPHonor" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('pendidikan/guruHonor/detail') }}"+'/'+str,true);
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
    $("#jmlGuruTKHonor{{$nopu}}").keyup(function() {
      hc = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          hc = hc + Number($("#jmlGuruTKHonor{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalGuruTKHonor").val(hc);
        jumlahSMP=Number($("#jmlGuruTKHonor{{$nopu}}").val()) + Number($("#jmlGuruSDHonor{{$nopu}}").val()) + Number($("#jmlGuruSMPHonor{{$nopu}}").val());
        $("#jmlGuruHonor{{$nopu}}").val(jumlahSMP);
        td = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            td = td + Number($("#jmlGuruHonor{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalGuruHonor").val(td);
      });

      $("#jmlGuruSDHonor{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            hc = hc + Number($("#jmlGuruSDHonor{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalGuruSDHonor").val(hc);
          jumlahSMP=Number($("#jmlGuruTKHonor{{$nopu}}").val()) + Number($("#jmlGuruSDHonor{{$nopu}}").val()) + Number($("#jmlGuruSMPHonor{{$nopu}}").val());
          $("#jmlGuruHonor{{$nopu}}").val(jumlahSMP);
          td = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              td = td + Number($("#jmlGuruHonor{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalGuruHonor").val(td);
        });

        $("#jmlGuruSMPHonor{{$nopu}}").keyup(function() {
          hc = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              hc = hc + Number($("#jmlGuruSMPHonor{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalGuruSMPHonor").val(hc);
            jumlahSMP=Number($("#jmlGuruTKHonor{{$nopu}}").val()) + Number($("#jmlGuruSDHonor{{$nopu}}").val()) + Number($("#jmlGuruSMPHonor{{$nopu}}").val());
            $("#jmlGuruHonor{{$nopu}}").val(jumlahSMP);
            td = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                td = td + Number($("#jmlGuruHonor{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalGuruHonor").val(td);
          });

          $("#jmlGuruTKHonor{{$nopu}}").change(function() {
            hc = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                hc = hc + Number($("#jmlGuruTKHonor{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalGuruTKHonor").val(hc);
              jumlahSMP=Number($("#jmlGuruTKHonor{{$nopu}}").val()) + Number($("#jmlGuruSDHonor{{$nopu}}").val()) + Number($("#jmlGuruSMPHonor{{$nopu}}").val());
              $("#jmlGuruHonor{{$nopu}}").val(jumlahSMP);
              td = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  td = td + Number($("#jmlGuruHonor{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalGuruHonor").val(td);
            });

            $("#jmlGuruSDHonor{{$nopu}}").change(function() {
              hc = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  hc = hc + Number($("#jmlGuruSDHonor{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalGuruSDHonor").val(hc);
                jumlahSMP=Number($("#jmlGuruTKHonor{{$nopu}}").val()) + Number($("#jmlGuruSDHonor{{$nopu}}").val()) + Number($("#jmlGuruSMPHonor{{$nopu}}").val());
                $("#jmlGuruHonor{{$nopu}}").val(jumlahSMP);
                td = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    td = td + Number($("#jmlGuruHonor{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalGuruHonor").val(td);
              });

              $("#jmlGuruSMPHonor{{$nopu}}").change(function() {
                hc = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    hc = hc + Number($("#jmlGuruSMPHonor{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalGuruSMPHonor").val(hc);
                  jumlahSMP=Number($("#jmlGuruTKHonor{{$nopu}}").val()) + Number($("#jmlGuruSDHonor{{$nopu}}").val()) + Number($("#jmlGuruSMPHonor{{$nopu}}").val());
                  $("#jmlGuruHonor{{$nopu}}").val(jumlahSMP);
                  td = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      td = td + Number($("#jmlGuruHonor{{$nojk}}").val());
                  <?php
                    $nojk ++;
                    } ?>
                    $("#totalGuruHonor").val(td);
                });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("guruHonor");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Guru Honor'],
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
                   $kata = $kata . $jkg->totalGuruHonor. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Guru TK'],
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
                   $kata = $kata . $jkg->totalGuruTKHonor. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Guru SD'],
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
                   $kata = $kata . $jkg->totalGuruSDHonor. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Guru SMP'],
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
                   $kata = $kata . $jkg->totalGuruSMPHonor. ',';
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
                       text: 'Grafik Jumlah Guru (Status Honor)'
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
