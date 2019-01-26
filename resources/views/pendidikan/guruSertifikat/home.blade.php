@extends('layouts.app')
@section('title','Data Jumlah Guru (Status Bersertifikat)')

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
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Guru (Status Bersertifikat)</li>
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
        <b>Data Jumlah Guru (Status Bersertifikat)</b>
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
              <canvas id="guruSertifikat" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Guru (Status Bersertifikat)</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Guru Bersertifikat</th>
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
                <form action="/pendidikan/guruSertifikat/destroy/{{$detA->id}}" id="form{{$detA->id}}" method="post">
                  <tr>
                    <input type="hidden" name="guruSertifikatMaster{{$detA->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$detA->ta}}</td>
                    <td style="text-align: center">{{$detA->totalGuruSertifikat}}</td>
                    <td style="text-align: center">{{$detA->totalGuruTKSertifikat}}</td>
                    <td style="text-align: center">{{$detA->totalGuruSDSertifikat}}</td>
                    <td style="text-align: center">{{$detA->totalGuruSMPSertifikat}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$detA->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pendidikan/guruSertifikat/edit/{{$detA->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="guruSertifikat/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Guru Bersertifikat</th>
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
                        <input type="number" id="jmlGuruSertifikat{{$nomor}}" class="form-control" name="jmlGuruSertifikat{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlGuruTKSertifikat{{$nomor}}" class="form-control" name="jmlGuruTKSertifikat{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlGuruSDSertifikat{{$nomor}}" class="form-control" name="jmlGuruSDSertifikat{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlGuruSMPSertifikat{{$nomor}}" class="form-control" name="jmlGuruSMPSertifikat{{$nomor}}" value="0">
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
                     <input type="number" id="totalGuruSertifikat" class="form-control" name="totalGuruSertifikat" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalGuruTKSertifikat" class="form-control" name="totalGuruTKSertifikat" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalGuruSDSertifikat" class="form-control" name="totalGuruSDSertifikat" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalGuruSMPSertifikat" class="form-control" name="totalGuruSMPSertifikat" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('pendidikan/guruSertifikat/detail') }}"+'/'+str,true);
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
    $("#jmlGuruTKSertifikat{{$nopu}}").keyup(function() {
      hc = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          hc = hc + Number($("#jmlGuruTKSertifikat{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalGuruTKSertifikat").val(hc);
        jumlahSMP=Number($("#jmlGuruTKSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSDSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSMPSertifikat{{$nopu}}").val());
        $("#jmlGuruSertifikat{{$nopu}}").val(jumlahSMP);
        td = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            td = td + Number($("#jmlGuruSertifikat{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalGuruSertifikat").val(td);
      });

      $("#jmlGuruSDSertifikat{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            hc = hc + Number($("#jmlGuruSDSertifikat{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalGuruSDSertifikat").val(hc);
          jumlahSMP=Number($("#jmlGuruTKSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSDSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSMPSertifikat{{$nopu}}").val());
          $("#jmlGuruSertifikat{{$nopu}}").val(jumlahSMP);
          td = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              td = td + Number($("#jmlGuruSertifikat{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalGuruSertifikat").val(td);
        });

        $("#jmlGuruSMPSertifikat{{$nopu}}").keyup(function() {
          hc = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              hc = hc + Number($("#jmlGuruSMPSertifikat{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalGuruSMPSertifikat").val(hc);
            jumlahSMP=Number($("#jmlGuruTKSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSDSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSMPSertifikat{{$nopu}}").val());
            $("#jmlGuruSertifikat{{$nopu}}").val(jumlahSMP);
            td = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                td = td + Number($("#jmlGuruSertifikat{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalGuruSertifikat").val(td);
          });

          $("#jmlGuruTKSertifikat{{$nopu}}").change(function() {
            hc = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                hc = hc + Number($("#jmlGuruTKSertifikat{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalGuruTKSertifikat").val(hc);
              jumlahSMP=Number($("#jmlGuruTKSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSDSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSMPSertifikat{{$nopu}}").val());
              $("#jmlGuruSertifikat{{$nopu}}").val(jumlahSMP);
              td = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  td = td + Number($("#jmlGuruSertifikat{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalGuruSertifikat").val(td);
            });

            $("#jmlGuruSDSertifikat{{$nopu}}").change(function() {
              hc = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  hc = hc + Number($("#jmlGuruSDSertifikat{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalGuruSDSertifikat").val(hc);
                jumlahSMP=Number($("#jmlGuruTKSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSDSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSMPSertifikat{{$nopu}}").val());
                $("#jmlGuruSertifikat{{$nopu}}").val(jumlahSMP);
                td = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    td = td + Number($("#jmlGuruSertifikat{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalGuruSertifikat").val(td);
              });

              $("#jmlGuruSMPSertifikat{{$nopu}}").change(function() {
                hc = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    hc = hc + Number($("#jmlGuruSMPSertifikat{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalGuruSMPSertifikat").val(hc);
                  jumlahSMP=Number($("#jmlGuruTKSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSDSertifikat{{$nopu}}").val()) + Number($("#jmlGuruSMPSertifikat{{$nopu}}").val());
                  $("#jmlGuruSertifikat{{$nopu}}").val(jumlahSMP);
                  td = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      td = td + Number($("#jmlGuruSertifikat{{$nojk}}").val());
                  <?php
                    $nojk ++;
                    } ?>
                    $("#totalGuruSertifikat").val(td);
                });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("guruSertifikat");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Guru Bersertifikat'],
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
                   $kata = $kata . $jkg->totalGuruSertifikat. ',';
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
                   $kata = $kata . $jkg->totalGuruTKSertifikat. ',';
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
                   $kata = $kata . $jkg->totalGuruSDSertifikat. ',';
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
                   $kata = $kata . $jkg->totalGuruSMPSertifikat. ',';
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
                       text: 'Grafik Jumlah Guru (Status Bersertifikat)'
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
