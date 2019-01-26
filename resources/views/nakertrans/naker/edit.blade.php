@extends('layouts.app')
@section('title','Data Jumlah PerPerusahaanan dan Tenaga Kerja')

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
        <li class="breadcrumb-item"><a href="/nakertrans/">Tenaga Kerja</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah PerPerusahaanan dan Tenaga Kerja</li>
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
        <b>Data Jumlah PerPerusahaanan dan Tenaga Kerja</b>
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
              <canvas id="nakertrans" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah PerPerusahaanan dan Tenaga Kerja</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Total PerPerusahaanan</th>
                  <th>Total Tenaga Kerja</th>
                  <th>Laki-laki</th>
                  <th>Perempuan</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/nakertrans/naker/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="nakerMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalPerusahaan}}</td>
                    <td style="text-align: center">{{$dataM->totalNaker}}</td>
                    <td style="text-align: center">{{$dataM->totalNakerlaki}}</td>
                    <td style="text-align: center">{{$dataM->totalNakerperempuan}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->id}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/nakertrans/naker/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <b>Edit Data : {{$dataE->$ta}}</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/nakertrans/naker/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Perusahaan</th>
                    <th>Jumlah Tenaga Kerja</th>
                    <th>Naker Laki-laki</th>
                    <th>Naker Perempuan</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($dataDetail as $dataD) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$dataD->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlPerusahaan{{$nomor}}" class="form-control" name="jmlPerusahaan{{$nomor}}" value="{{$dataD->jmlPerusahaan}}">
                      </td>
                      <td>
                        <input type="number" id="jmlNaker{{$nomor}}" class="form-control" name="jmlNaker{{$nomor}}" value="{{$dataD->jmlNaker}}" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlNakerlaki{{$nomor}}" class="form-control" name="jmlNakerlaki{{$nomor}}" value="{{$dataD->jmlNakerlaki}}">
                      </td>
                      <td>
                        <input type="number" id="jmlNakerperempuan{{$nomor}}" class="form-control" name="jmlNakerperempuan{{$nomor}}" value="{{$dataD->jmlNakerperempuan}}">
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
                     <input type="number" id="totalPerusahaan" class="form-control" name="totalPerusahaan" value="{{$dataE->totalPerusahaan}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalNaker" class="form-control" name="totalNaker" value="{{$dataE->totalNaker}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalNakerlaki" class="form-control" name="totalNakerlaki" value="{{$dataE->totalNakerlaki}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalNakerperempuan" class="form-control" name="totalNakerperempuan" value="{{$dataE->totalNakerperempuan}}" readonly>
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
          xmlhttp.open("GET","/modals/nakertrans/getnaker.php?q="+str,true);
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
   $("#jmlPerusahaan{{$nopu}}").keyup(function() {
     jumlah = 0;
     <?php
       $no = 1;
       foreach ($dataKecamatan as $p) {
      ?>
        jumlah = jumlah + Number($("#jmlPerusahaan{{$no}}").val());
      <?php
        $no ++;
        }
       ?>
       $("#totalPerusahaan").val(jumlah);
    });

    $("#jmlNakerlaki{{$nopu}}").keyup(function() {
      $("#jmlNaker{{$nopu}}").val(Number($("#jmlNakerlaki{{$nopu}}").val())+Number($("#jmlNakerperempuan{{$nopu}}").val()));
      jml=0;
      <?php
        $noq = 1;
        foreach ($dataKecamatan as $x) {
       ?>
         jml = jml + Number($("#jmlNakerlaki{{$noq}}").val());
       <?php
         $noq ++;
         }
        ?>
        $("#totalNakerlaki").val(jml);
        $("#totalNaker").val(Number($("#totalNakerlaki").val())+Number($("#totalNakerperempuan").val()))
    });
    $("#jmlNakerperempuan{{$nopu}}").keyup(function() {
      $("#jmlNaker{{$nopu}}").val(Number($("#jmlNakerlaki{{$nopu}}").val())+Number($("#jmlNakerperempuan{{$nopu}}").val()));
      jml=0;
      <?php
        $noq = 1;
        foreach ($dataKecamatan as $x) {
       ?>
         jml = jml + Number($("#jmlNakerperempuan{{$noq}}").val());
       <?php
         $noq ++;
         }
        ?>
        $("#totalNakerperempuan").val(jml);
        $("#totalNaker").val(Number($("#totalNakerlaki").val())+Number($("#totalNakerperempuan").val()))
    });
    $("#jmlPerusahaan{{$nopu}}").change(function() {
      jumlah = 0;
      <?php
        $no = 1;
        foreach ($dataKecamatan as $p) {
       ?>
         jumlah = jumlah + Number($("#jmlPerusahaan{{$no}}").val());
       <?php
         $no ++;
         }
        ?>
        $("#totalPerusahaan").val(jumlah);
     });

     $("#jmlNakerlaki{{$nopu}}").change(function() {
       $("#jmlNaker{{$nopu}}").val(Number($("#jmlNakerlaki{{$nopu}}").val())+Number($("#jmlNakerperempuan{{$nopu}}").val()));
       jml=0;
       <?php
         $noq = 1;
         foreach ($dataKecamatan as $x) {
        ?>
          jml = jml + Number($("#jmlNakerlaki{{$noq}}").val());
        <?php
          $noq ++;
          }
         ?>
         $("#totalNakerlaki").val(jml);
         $("#totalNaker").val(Number($("#totalNakerlaki").val())+Number($("#totalNakerperempuan").val()))
     });
     $("#jmlNakerperempuan{{$nopu}}").change(function() {
       $("#jmlNaker{{$nopu}}").val(Number($("#jmlNakerlaki{{$nopu}}").val())+Number($("#jmlNakerperempuan{{$nopu}}").val()));
       jml=0;
       <?php
         $noq = 1;
         foreach ($dataKecamatan as $x) {
        ?>
          jml = jml + Number($("#jmlNakerperempuan{{$noq}}").val());
        <?php
          $noq ++;
          }
         ?>
         $("#totalNakerperempuan").val(jml);
         $("#totalNaker").val(Number($("#totalNakerlaki").val())+Number($("#totalNakerperempuan").val()))
     });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("nakertrans");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Perusahaan'],
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
                   $kata = $kata . $jkg->totalPerusahaan. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Jumlah Tenaga Kerja'],
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
                   $kata = $kata . $jkg->totalNaker . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Laki-laki'],
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
                   $kata = $kata . $jkg->totalNakerlaki. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perempuan'],
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
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalNakerperempuan. ',';
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
                       text: 'Grafik Data Jumlah PerPerusahaanan dan Tenaga Kerja'
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
