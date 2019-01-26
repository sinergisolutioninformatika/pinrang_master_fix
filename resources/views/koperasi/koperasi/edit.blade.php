@extends('layouts.app')
@section('title','Data Jumlah Koperasi')

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
        <li class="breadcrumb-item"><a href="/koperasi/">Koperasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Koperasi</li>
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
        <b>Data Jumlah Koperasi</b>
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
              <canvas id="koperasi" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Jumlah Koperasi</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Koperasi</th>
                  <th>Aktif</th>
                  <th>Tidak Aktif</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataM as $ksd) {
                    ?>
                <form action="/koperasi/koperasi/destroy/{{$ksd->id}}" id="form{{$ksd->id}}" method="post">
                  <tr>
                    <input type="hidden" name="koperasiMaster{{$ksd->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$ksd->ta}}</td>
                    <td style="text-align: center">{{$ksd->totalKoperasi}}</td>
                    <td style="text-align: center">{{$ksd->totalAktif}}</td>
                    <td style="text-align: center">{{$ksd->totalTidakaktif}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$ksd->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/koperasi/koperasi/edit/{{$ksd->id}}"><img src="/image/edit.png" alt=""></a>
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
  foreach ($dataEdit as $dataE) {
  }
 ?>
    <!-- input data rekap baru -->
    <div class="collapse show" id="collapseExample">
      <div class="card">
        <div class="card-header">
          <b>Edit Data</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/koperasi/koperasi/update/{{$kodeEdit}}" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis Koperasi</th>
                    <th>Jumlah Koperasi</th>
                    <th>Aktif</th>
                    <th>Tidak Aktif</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($dataDetail as $dataK) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$dataK->nmaKoperasi}}</td>
                      <td>
                        <input type="number" id="jmlKoperasi{{$nomor}}" class="form-control" name="jmlKoperasi{{$nomor}}" value="{{$dataK->jmlKoperasi}}" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlAktif{{$nomor}}" class="form-control" name="jmlAktif{{$nomor}}" value="{{$dataK->jmlAktif}}">
                      </td>
                      <td>
                        <input type="number" id="jmlTidakaktif{{$nomor}}" class="form-control" name="jmlTidakaktif{{$nomor}}" value="{{$dataK->jmlTidakaktif}}">
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
                     <input type="number" id="totalKoperasi" class="form-control" name="totalKoperasi" value="{{$dataE->totalKoperasi}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalAktif" class="form-control" name="totalAktif" value="{{$dataE->totalAktif}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalTidakaktif" class="form-control" name="totalTidakaktif" value="{{$dataE->totalTidakaktif}}" readonly>
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
          xmlhttp.open("GET","{{ url('koperasi/koperasi/detail') }}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
$(document).ready(function() {

  <?php
    $nopu = 1;
    foreach ($dataKoperasi as $pus) {
   ?>
    $("#jmlAktif{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($dataKoperasi as $pk){ ?>
          ksd = ksd + Number($("#jmlAktif{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalAktif").val(ksd);
        jumlahSD=Number($("#jmlAktif{{$nopu}}").val()) + Number($("#jmlTidakaktif{{$nopu}}").val());
        $("#jmlKoperasi{{$nopu}}").val(jumlahSD);
        thetotalKoperasi = 0;
        <?php
          $nojk = 1;
          foreach ($dataKoperasi as $pk){ ?>
            thetotalKoperasi = thetotalKoperasi + Number($("#jmlKoperasi{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalKoperasi").val(thetotalKoperasi);
      });
      $("#jmlTidakaktif{{$nopu}}").keyup(function() {
        ksd = 0;
        <?php
          $nojk = 1;
          foreach ($dataKoperasi as $pk){ ?>
            ksd = ksd + Number($("#jmlTidakaktif{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalTidakaktif").val(ksd);
          jumlahSD=Number($("#jmlAktif{{$nopu}}").val()) + Number($("#jmlTidakaktif{{$nopu}}").val());
          $("#jmlKoperasi{{$nopu}}").val(jumlahSD);
          thetotalKoperasi = 0;
          <?php
            $nojk = 1;
            foreach ($dataKoperasi as $pk){ ?>
              thetotalKoperasi = thetotalKoperasi + Number($("#jmlKoperasi{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalKoperasi").val(thetotalKoperasi);
        });
        $("#jmlAktif{{$nopu}}").change(function() {
          ksd = 0;
          <?php
            $nojk = 1;
            foreach ($daftar_koperasi as $pk){ ?>
              ksd = ksd + Number($("#jmlAktif{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalAktif").val(ksd);
            jumlahSD=Number($("#jmlAktif{{$nopu}}").val()) + Number($("#jmlTidakaktif{{$nopu}}").val());
            $("#jmlKoperasi{{$nopu}}").val(jumlahSD);
            thetotalKoperasi = 0;
            <?php
              $nojk = 1;
              foreach ($daftar_koperasi as $pk){ ?>
                thetotalKoperasi = thetotalKoperasi + Number($("#jmlKoperasi{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalKoperasi").val(thetotalKoperasi);
          });
          $("#jmlTidakaktif{{$nopu}}").change(function() {
            ksd = 0;
            <?php
              $nojk = 1;
              foreach ($daftar_koperasi as $pk){ ?>
                ksd = ksd + Number($("#jmlTidakaktif{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalTidakaktif").val(ksd);
              jumlahSD=Number($("#jmlAktif{{$nopu}}").val()) + Number($("#jmlTidakaktif{{$nopu}}").val());
              $("#jmlKoperasi{{$nopu}}").val(jumlahSD);
              thetotalKoperasi = 0;
              <?php
                $nojk = 1;
                foreach ($daftar_koperasi as $pk){ ?>
                  thetotalKoperasi = thetotalKoperasi + Number($("#jmlKoperasi{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalKoperasi").val(thetotalKoperasi);
            });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("koperasi");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Koperasi'],
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
                   $kata = $kata . $jkg->totalKoperasi. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Aktif'],
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
                   $kata = $kata . $jkg->totalAktif. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Tidak aktif'],
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
                   $kata = $kata . $jkg->totalTidakaktif. ',';
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
                       text: 'Grafik Jumlah Koperasi'
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
