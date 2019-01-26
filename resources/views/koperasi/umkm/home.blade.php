@extends('layouts.app')
@section('title','Data Jumlah Usaha Kecil Mikro dan Menengah')

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
        <li class="breadcrumb-item"><a href="/diknas/">Koperasi dan UMKM</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Usaha Kecil Mikro dan Menengah</li>
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
        <b>Data Jumlah Usaha Kecil Mikro dan Menengah</b>
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
              <caption style="caption-side:top;">Data Jumlah Usaha Kecil Mikro dan Menengah</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah</th>
                  <th>Perdagangan</th>
                  <th>Industri Pertanian</th>
                  <th>Industri Non Pertanian</th>
                  <th>Aneka Jasa</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/koperasi/umkm/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="koperasiMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalUMKM}}</td>
                    <td style="text-align: center">{{$dataM->totalPerdagangan}}</td>
                    <td style="text-align: center">{{$dataM->totalIndustriPertanian}}</td>
                    <td style="text-align: center">{{$dataM->totalIndustriNonPertanian}}</td>
                    <td style="text-align: center">{{$dataM->totalAnekaJasa}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/koperasi/umkm/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/koperasi/umkm/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Perdagangan</th>
                    <th>Industri Pertanian</th>
                    <th>Industri Non Pertanian</th>
                    <th>Aneka Jasa</th>
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
                        <input type="number" id="jmlUMKM{{$nomor}}" class="form-control" name="jmlUMKM{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlPerdagangan{{$nomor}}" class="form-control" name="jmlPerdagangan{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlIndustriPertanian{{$nomor}}" class="form-control" name="jmlIndustriPertanian{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlIndustriNonPertanian{{$nomor}}" class="form-control" name="jmlIndustriNonPertanian{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlAnekaJasa{{$nomor}}" class="form-control" name="jmlAnekaJasa{{$nomor}}" value="0">
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
                     <input type="number" id="totalUMKM" class="form-control" name="totalUMKM" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPerdagangan" class="form-control" name="totalPerdagangan" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalIndustriPertanian" class="form-control" name="totalIndustriPertanian" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalIndustriNonPertanian" class="form-control" name="totalIndustriNonPertanian" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalAnekaJasa" class="form-control" name="totalAnekaJasa" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('koperasi/umkm/detail') }}"+'/'+str,true);
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
    $("#jmlPerdagangan{{$nopu}}").keyup(function() {
      hc = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPerdagangan{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalPerdagangan").val(hc);
        jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
        $("#jmlUMKM{{$nopu}}").val(jumlah);
        td = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            td = td + Number($("#jmlUMKM{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalUMKM").val(td);
      });
      $("#jmlIndustriPertanian{{$nopu}}").keyup(function() {
        hc = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            hc = hc + Number($("#jmlIndustriPertanian{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalIndustriPertanian").val(hc);
          jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
          $("#jmlUMKM{{$nopu}}").val(jumlah);
          td = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              td = td + Number($("#jmlUMKM{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalUMKM").val(td);
        });
        $("#jmlIndustriNonPertanian{{$nopu}}").keyup(function() {
          hc = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              hc = hc + Number($("#jmlIndustriNonPertanian{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalIndustriNonPertanian").val(hc);
            jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
            $("#jmlUMKM{{$nopu}}").val(jumlah);
            td = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                td = td + Number($("#jmlUMKM{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalUMKM").val(td);
          });
          $("#jmlAnekaJasa{{$nopu}}").keyup(function() {
            hc = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                hc = hc + Number($("#jmlAnekaJasa{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalAnekaJasa").val(hc);
              jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
              $("#jmlUMKM{{$nopu}}").val(jumlah);
              td = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  td = td + Number($("#jmlUMKM{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalUMKM").val(td);
            });

            $("#jmlPerdagangan{{$nopu}}").change(function() {
              hc = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  hc = hc + Number($("#jmlPerdagangan{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalPerdagangan").val(hc);
                jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
                $("#jmlUMKM{{$nopu}}").val(jumlah);
                td = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    td = td + Number($("#jmlUMKM{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalUMKM").val(td);
              });
              $("#jmlIndustriPertanian{{$nopu}}").change(function() {
                hc = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    hc = hc + Number($("#jmlIndustriPertanian{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalIndustriPertanian").val(hc);
                  jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
                  $("#jmlUMKM{{$nopu}}").val(jumlah);
                  td = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      td = td + Number($("#jmlUMKM{{$nojk}}").val());
                  <?php
                    $nojk ++;
                    } ?>
                    $("#totalUMKM").val(td);
                });
                $("#jmlIndustriNonPertanian{{$nopu}}").change(function() {
                  hc = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      hc = hc + Number($("#jmlIndustriNonPertanian{{$nojk}}").val());
                  <?php
                    $nojk ++;
                  } ?>
                    $("#totalIndustriNonPertanian").val(hc);
                    jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
                    $("#jmlUMKM{{$nopu}}").val(jumlah);
                    td = 0;
                    <?php
                      $nojk = 1;
                      foreach ($kecamatan as $pk){ ?>
                        td = td + Number($("#jmlUMKM{{$nojk}}").val());
                    <?php
                      $nojk ++;
                      } ?>
                      $("#totalUMKM").val(td);
                  });
                  $("#jmlAnekaJasa{{$nopu}}").change(function() {
                    hc = 0;
                    <?php
                      $nojk = 1;
                      foreach ($kecamatan as $pk){ ?>
                        hc = hc + Number($("#jmlAnekaJasa{{$nojk}}").val());
                    <?php
                      $nojk ++;
                    } ?>
                      $("#totalAnekaJasa").val(hc);
                      jumlah=Number($("#jmlPerdagangan{{$nopu}}").val()) + Number($("#jmlIndustriPertanian{{$nopu}}").val()) + Number($("#jmlIndustriNonPertanian{{$nopu}}").val()) + Number($("#jmlAnekaJasa{{$nopu}}").val());
                      $("#jmlUMKM{{$nopu}}").val(jumlah);
                      td = 0;
                      <?php
                        $nojk = 1;
                        foreach ($kecamatan as $pk){ ?>
                          td = td + Number($("#jmlUMKM{{$nojk}}").val());
                      <?php
                        $nojk ++;
                        } ?>
                        $("#totalUMKM").val(td);
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
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalUMKM. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Perdagangan'],
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
                   $kata = $kata . $jkg->totalPerdagangan . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Industri Pertanian'],
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
                   $kata = $kata . $jkg->totalIndustriPertanian. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Industri Non Pertanian'],
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
                   $kata = $kata . $jkg->totalIndustriNonPertanian. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Aneka Jasa'],
        borderColor: ['rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(153, 102, 255, 0.7)'],
        backgroundColor:['rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)'],
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalAnekaJasa. ',';
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
                       text: 'Grafik Jumlah Usaha Kecil Mikro dan Menengah'
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
