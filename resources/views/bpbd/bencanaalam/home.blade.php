@extends('layouts.app')
@section('title','Data Kejadian Bencana Alam')

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
        <li class="breadcrumb-item"><a href="/diknas/">Badan Penanggulangan Bencana Daerah</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kejadian Bencana Alam</li>
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
        <b>Data Kejadian Bencana Alam</b>
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
              <canvas id="bencanaalam" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Kejadian Bencana Alam</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jml. Kejadian</th>
                  <th>Banjir</th>
                  <th>Kebakaran</th>
                  <th>Kekeringan</th>
                  <th>Angin Kencang</th>
                  <th>Tanah Longsor</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/bpbd/bencanaalam/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="bencanaalamMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalKejadian}}</td>
                    <td style="text-align: center">{{$dataM->totalBanjir}}</td>
                    <td style="text-align: center">{{$dataM->totalKebakaran}}</td>
                    <td style="text-align: center">{{$dataM->totalKekeringan}}</td>
                    <td style="text-align: center">{{$dataM->totalAnginkencang}}</td>
                    <td style="text-align: center">{{$dataM->totalTanahlongsor}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/bpbd/bencanaalam/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/bpbd/bencanaalam/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jml. Kejadian</th>
                    <th>Banjir</th>
                    <th>Kebakaran</th>
                    <th>Kekeringan</th>
                    <th>Angin Kencang</th>
                    <th>Tanah Longsor</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($dataKecamatan as $dataK) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$dataK->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlKejadian{{$nomor}}" class="form-control" name="jmlKejadian{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlBanjir{{$nomor}}" class="form-control" name="jmlBanjir{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlKebakaran{{$nomor}}" class="form-control" name="jmlKebakaran{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlKekeringan{{$nomor}}" class="form-control" name="jmlKekeringan{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlAnginkencang{{$nomor}}" class="form-control" name="jmlAnginkencang{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlTanahlongsor{{$nomor}}" class="form-control" name="jmlTanahlongsor{{$nomor}}" value="0">
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
                     <input type="number" id="totalKejadian" class="form-control" name="totalKejadian" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalBanjir" class="form-control" name="totalBanjir" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKebakaran" class="form-control" name="totalKebakaran" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKekeringan" class="form-control" name="totalKekeringan" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalAnginkencang" class="form-control" name="totalAnginkencang" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalTanahlongsor" class="form-control" name="totalTanahlongsor" value="0" readonly>
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
          xmlhttp.open("GET","{{ url('bpbd/bencanaalam/detail') }}"+'/'+str,true);
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
      $("#jmlBanjir{{$nopu}}").keyup(function() {
        hc = 0;
        tk = 0;
        <?php
          $nojk = 1;
          foreach ($dataKecamatan as $pk){ ?>
            hc = hc + Number($("#jmlBanjir{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalBanjir").val(hc);
          $("#jmlKejadian{{$nopu}}").val(Number($("#jmlBanjir{{$nopu}}").val())+Number($("#jmlKebakaran{{$nopu}}").val())
           + Number($("#jmlKekeringan{{$nopu}}").val()) + Number($("#jmlAnginkencang{{$nopu}}").val()) + Number($("#jmlTanahlongsor{{$nopu}}").val()));
           <?php
             $no = 1;
             foreach ($dataKecamatan as $pk){ ?>
               tk = tk + Number($("#jmlKejadian{{$no}}").val());
           <?php
             $no ++;
           } ?>
          $("#totalKejadian").val(tk);
        });
        $("#jmlKebakaran{{$nopu}}").keyup(function() {
          hc = 0;
          tk = 0;
          <?php
            $nojk = 1;
            foreach ($dataKecamatan as $pk){ ?>
              hc = hc + Number($("#jmlKebakaran{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalKebakaran").val(hc);
            $("#jmlKejadian{{$nopu}}").val(Number($("#jmlBanjir{{$nopu}}").val())+Number($("#jmlKebakaran{{$nopu}}").val())
             + Number($("#jmlKekeringan{{$nopu}}").val()) + Number($("#jmlAnginkencang{{$nopu}}").val()) + Number($("#jmlTanahlongsor{{$nopu}}").val()));
             <?php
               $no = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 tk = tk + Number($("#jmlKejadian{{$no}}").val());
             <?php
               $no ++;
             } ?>
            $("#totalKejadian").val(tk);
          });
          $("#jmlKekeringan{{$nopu}}").keyup(function() {
            hc = 0;
            tk = 0;
            <?php
              $nojk = 1;
              foreach ($dataKecamatan as $pk){ ?>
                hc = hc + Number($("#jmlKekeringan{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalKekeringan").val(hc);
              $("#jmlKejadian{{$nopu}}").val(Number($("#jmlBanjir{{$nopu}}").val())+Number($("#jmlKebakaran{{$nopu}}").val())
               + Number($("#jmlKekeringan{{$nopu}}").val()) + Number($("#jmlAnginkencang{{$nopu}}").val()) + Number($("#jmlTanahlongsor{{$nopu}}").val()));
               <?php
                 $no = 1;
                 foreach ($dataKecamatan as $pk){ ?>
                   tk = tk + Number($("#jmlKejadian{{$no}}").val());
               <?php
                 $no ++;
               } ?>
              $("#totalKejadian").val(tk);
            });
            $("#jmlAnginkencang{{$nopu}}").keyup(function() {
              hc = 0;
              tk = 0;
              <?php
                $nojk = 1;
                foreach ($dataKecamatan as $pk){ ?>
                  hc = hc + Number($("#jmlAnginkencang{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalAnginkencang").val(hc);
                $("#jmlKejadian{{$nopu}}").val(Number($("#jmlBanjir{{$nopu}}").val())+Number($("#jmlKebakaran{{$nopu}}").val())
                 + Number($("#jmlKekeringan{{$nopu}}").val()) + Number($("#jmlAnginkencang{{$nopu}}").val()) + Number($("#jmlTanahlongsor{{$nopu}}").val()));
                 <?php
                   $no = 1;
                   foreach ($dataKecamatan as $pk){ ?>
                     tk = tk + Number($("#jmlKejadian{{$no}}").val());
                 <?php
                   $no ++;
                 } ?>
                $("#totalKejadian").val(tk);
              });
              $("#jmlTanahlongsor{{$nopu}}").keyup(function() {
                hc = 0;
                tk = 0;
                <?php
                  $nojk = 1;
                  foreach ($dataKecamatan as $pk){ ?>
                    hc = hc + Number($("#jmlTanahlongsor{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalTanahlongsor").val(hc);
                  $("#jmlKejadian{{$nopu}}").val(Number($("#jmlBanjir{{$nopu}}").val())+Number($("#jmlKebakaran{{$nopu}}").val())
                   + Number($("#jmlKekeringan{{$nopu}}").val()) + Number($("#jmlAnginkencang{{$nopu}}").val()) + Number($("#jmlTanahlongsor{{$nopu}}").val()));
                   <?php
                     $no = 1;
                     foreach ($dataKecamatan as $pk){ ?>
                       tk = tk + Number($("#jmlKejadian{{$no}}").val());
                   <?php
                     $no ++;
                   } ?>
                  $("#totalKejadian").val(tk);
                });
        <?php
          $nopu ++;
        }
         ?>
     });
  </script>
  <script>
  var ctx = document.getElementById("bencanaalam");
   var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      datasets: [{
        borderWidth: 3,
        label: ['Banjir'],
        borderColor: ['rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)',
                       'rgba(54, 162, 235, 0.5)'],
        backgroundColor:['rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)',
                         'rgba(54, 162, 235, 0.5)'],
        pointBackgroundColor:['rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)',
                              'rgba(54, 162, 235, 0.5)'],
        pointHoverBorderColor: ['rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)',
                               'rgba(54, 162, 235, 0.7)'],
        pointBorderWidth:2,
        fill:false,
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalBanjir . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 3,
        label: ['Kebakaran'],
        borderColor: ['rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)',
                       'rgba(70, 236, 112, 0.5)'],
        backgroundColor:['rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)',
                         'rgba(70, 236, 112, 0.5)'],
        pointBackgroundColor:['rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)',
                              'rgba(70, 236, 112, 0.5)'],
        pointHoverBorderColor: ['rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)',
                               'rgba(70, 236, 112, 0.7)'],
        pointBorderWidth:2,
        fill:false,
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalKebakaran . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 3,
        label: ['Kekeringan'],
        borderColor: ['rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)',
                       'rgba(232, 192, 33, 0.5)'],
        backgroundColor:['rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)',
                         'rgba(232, 192, 33, 0.5)'],
        pointBackgroundColor:['rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)',
                              'rgba(232, 192, 33, 0.5)'],
        pointHoverBorderColor: ['rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)',
                               'rgba(232, 192, 33, 0.7)'],
        pointBorderWidth:2,
        fill:false,
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalKekeringan . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 3,
        label: ['Angin Kencang'],
        borderColor: ['rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)',
                       'rgba(255, 77, 77, 0.5)'],
        backgroundColor:['rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)',
                         'rgba(255, 77, 77, 0.5)'],
        pointBackgroundColor:['rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)',
                              'rgba(255, 77, 77, 0.5)'],
        pointHoverBorderColor: ['rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)',
                               'rgba(255, 77, 77, 0.7)'],
        pointBorderWidth:2,
        fill:false,
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalAnginkencang . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 3,
        label: ['Tanah Longsor'],
        borderColor: ['rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)'],
        backgroundColor:['rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)',
                         'rgba(153, 102, 255, 0.5)'],
        pointBackgroundColor:['rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)',
                              'rgba(153, 102, 255, 0.5)'],
        pointHoverBorderColor: ['rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)',
                               'rgba(153, 102, 255, 0.7)'],
        pointBorderWidth:2,
        fill:false,
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalTanahlongsor . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      }],
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
             text: 'Grafik Jumlah Kejadian Bencana Alam'
         },
      animation: {
        duration: 2000, // general animation time
        },
        hover: {
             animationDuration: 1000, // duration of animations when hovering an item
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
