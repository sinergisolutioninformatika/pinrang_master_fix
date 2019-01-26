@extends('layouts.app')
@section('title','Data Layanan Telekomunikasi')

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
        <li class="breadcrumb-item"><a href="/diknas/">Komunikasi dan Informtatika</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Layanan Telekomunikasi</li>
      </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Layanan Telekomunikasi</b>
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
              <canvas id="telekomunikasi" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Layanan Telekomunikasi</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Desa Terlayani Telekomunikasi</th>
                  <th>Desa Belum Terlayani Telekomunikasi</th>
                  <th>Jumlah BTS</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/kominfo/telekomunikasi/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="telekomunikasiMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalDesaterlayani}}</td>
                    <td style="text-align: center">{{$dataM->totalDesabelumterlayani}}</td>
                    <td style="text-align: center">{{$dataM->totalBTS}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->id}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/kominfo/telekomunikasi/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          xmlhttp.open("GET","/modals/kominfo/gettelekomunikasi.php?q="+str,true);
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
      $("#jmlDesaterlayani{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlDesaterlayani{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalDesaterlayani").val(hc);
      });
      $("#jmlDesabelumterlayani{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlDesabelumterlayani{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalDesabelumterlayani").val(hc);
      });
      $("#jmlBTS{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlBTS{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalBTS").val(hc);
      });
      $("#jmlDesaterlayani{{$nopu}}").change(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlDesaterlayani{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalDesaterlayani").val(hc);
      });
      $("#jmlDesabelumterlayani{{$nopu}}").change(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlDesabelumterlayani{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalDesabelumterlayani").val(hc);
      });
      $("#jmlBTS{{$nopu}}").change(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlBTS{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalBTS").val(hc);
      });
        <?php
          $nopu ++;
        }
         ?>
     });
  </script>
<script>

  var ctx = document.getElementById("telekomunikasi");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Desa terlayani telekomunikasi'],
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
                   $kata = $kata . $jkg->totalDesaterlayani. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Desa belum terlayani telekomunikasi'],
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
                   $kata = $kata . $jkg->totalDesabelumterlayani . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Jumlah BTS'],
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
                   $kata = $kata . $jkg->totalBTS . ',';
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
                       text: 'Grafik Data Layanan Telekomunikasi'
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
