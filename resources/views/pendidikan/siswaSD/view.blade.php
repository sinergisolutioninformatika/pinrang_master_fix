@extends('layouts.app')
@section('title','Data Jumlah Siswa (Sekolah Dasar)')

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
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Siswa (Sekolah Dasar)</li>
      </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Jumlah Siswa (Sekolah Dasar)</b>
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
              <canvas id="siswaSD" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Siswa (Sekolah Dasar)</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Siswa SD</th>
                  <th>Laki-laki</th>
                  <th>Perempuan</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataA as $detA) {
                    ?>
                <form action="/pendidikan/siswaSD/destroy/{{$detA->id}}" id="form{{$detA->id}}" method="post">
                  <tr>
                    <input type="hidden" name="siswaSDMaster{{$detA->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$detA->ta}}</td>
                    <td style="text-align: center">{{$detA->totalSiswaSD}}</td>
                    <td style="text-align: center">{{$detA->totalLaki}}</td>
                    <td style="text-align: center">{{$detA->totalPerempuan}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$detA->ta}})">
                        <img src="/image/view.png" alt="">
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
<br>  </div>
<br>
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
          xmlhttp.open("GET","{{ url('pendidikan/siswaSD/detail') }}"+'/'+str,true);
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
      hc = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          hc = hc + Number($("#jmlLaki{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalLaki").val(hc);
        jumlahSMP=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
        $("#jmlSiswaSD{{$nopu}}").val(jumlahSMP);
        td = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            td = td + Number($("#jmlSiswaSD{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalSiswaSD").val(td);
      });

      $("#jmlPerempuan{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            hc = hc + Number($("#jmlPerempuan{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalPerempuan").val(hc);
          jumlahSMP=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
          $("#jmlSiswaSD{{$nopu}}").val(jumlahSMP);
          td = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              td = td + Number($("#jmlSiswaSD{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalSiswaSD").val(td);
        });

          $("#jmlLaki{{$nopu}}").change(function() {
            hc = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                hc = hc + Number($("#jmlLaki{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalLaki").val(hc);
              jumlahSMP=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
              $("#jmlSiswaSD{{$nopu}}").val(jumlahSMP);
              td = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  td = td + Number($("#jmlSiswaSD{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalSiswaSD").val(td);
            });

            $("#jmlPerempuan{{$nopu}}").change(function() {
              hc = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  hc = hc + Number($("#jmlPerempuan{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalPerempuan").val(hc);
                jumlahSMP=Number($("#jmlLaki{{$nopu}}").val()) + Number($("#jmlPerempuan{{$nopu}}").val());
                $("#jmlSiswaSD{{$nopu}}").val(jumlahSMP);
                td = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    td = td + Number($("#jmlSiswaSD{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalSiswaSD").val(td);
              });

      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("siswaSD");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Siswa SD'],
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
                   $kata = $kata . $jkg->totalSiswaSD. ',';
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
                       text: 'Grafik Jumlah Siswa (Sekolah Dasar)'
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
