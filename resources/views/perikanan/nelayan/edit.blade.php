@extends('layouts.app')
@section('title','Data Jumlah Nelayan dan Petani Ikan')

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
        <li class="breadcrumb-item"><a href="/diknas/">Perikanan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Nelayan dan Petani Ikan</li>
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
        <b>Data Jumlah Nelayan dan Petani Ikan</b>
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
              <canvas id="perikanan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Nelayan dan Petani Ikan</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Nelayan</th>
                  <th>Nelayan Laut</th>
                  <th>Nelayan Darat</th>
                  <th>Petani Sawah</th>
                  <th>Petani Kolam</th>
                  <th>Petani Tambak</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/perikanan/nelayan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="nelayanMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalNelayan}}</td>
                    <td style="text-align: center">{{$dataM->totalNelayanlaut}}</td>
                    <td style="text-align: center">{{$dataM->totalNelayandarat}}</td>
                    <td style="text-align: center">{{$dataM->totalPetanisawah}}</td>
                    <td style="text-align: center">{{$dataM->totalPetanikolam}}</td>
                    <td style="text-align: center">{{$dataM->totalPetanitambak}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/perikanan/nelayan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/perikanan/nelayan/update/{{$kodeEdit}}" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Nelayan</th>
                    <th>Nelayan Laut</th>
                    <th>Nelayan Darat</th>
                    <th>Petani Sawah</th>
                    <th>Petani Kolam</th>
                    <th>Petani Tambak</th>
                  </tr>
              </thead>
              <input type="hidden" name="_method" value="PUT">
                <?php
                  $nomor = 1;
                  foreach ($dataDetail as $dataD) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$dataD->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlNelayan{{$nomor}}" class="form-control" name="jmlNelayan{{$nomor}}" value="{{$dataD->jmlNelayan}}" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlNelayanlaut{{$nomor}}" class="form-control" name="jmlNelayanlaut{{$nomor}}" value="{{$dataD->jmlNelayanlaut}}">
                      </td>
                      <td>
                        <input type="number" id="jmlNelayandarat{{$nomor}}" class="form-control" name="jmlNelayandarat{{$nomor}}" value="{{$dataD->jmlNelayandarat}}">
                      </td>
                      <td>
                        <input type="number" id="jmlPetanisawah{{$nomor}}" class="form-control" name="jmlPetanisawah{{$nomor}}" value="{{$dataD->jmlPetanisawah}}">
                      </td>
                      <td>
                        <input type="number" id="jmlPetanikolam{{$nomor}}" class="form-control" name="jmlPetanikolam{{$nomor}}" value="{{$dataD->jmlPetanikolam}}">
                      </td>
                      <td>
                        <input type="number" id="jmlPetanitambak{{$nomor}}" class="form-control" name="jmlPetanitambak{{$nomor}}" value="{{$dataD->jmlPetanitambak}}">
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
                     <input type="number" id="totalNelayan" class="form-control" name="totalNelayan" value="{{$dataE->totalNelayan}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalNelayanlaut" class="form-control" name="totalNelayanlaut" value="{{$dataE->totalNelayanlaut}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalNelayandarat" class="form-control" name="totalNelayandarat" value="{{$dataE->totalNelayandarat}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPetanisawah" class="form-control" name="totalPetanisawah" value="{{$dataE->totalPetanisawah}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPetanikolam" class="form-control" name="totalPetanikolam" value="{{$dataE->totalPetanikolam}}" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalPetanitambak" class="form-control" name="totalPetanitambak" value="{{$dataE->totalPetanitambak}}" readonly>
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
          xmlhttp.open("GET","{{ url('perikanan/nelayan/detail') }}"+'/'+str,true);
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
    $("#jmlNelayanlaut{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlNelayanlaut{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalNelayanlaut").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlNelayandarat{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlNelayandarat{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalNelayandarat").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlPetanisawah{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPetanisawah{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPetanisawah").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlPetanikolam{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPetanikolam{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPetanikolam").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlPetanitambak{{$nopu}}").keyup(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPetanitambak{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPetanitambak").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlNelayanlaut{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlNelayanlaut{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalNelayanlaut").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlNelayandarat{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlNelayandarat{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalNelayandarat").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlPetanisawah{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPetanisawah{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPetanisawah").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlPetanikolam{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPetanikolam{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPetanikolam").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
    $("#jmlPetanitambak{{$nopu}}").change(function() {
      hc = 0;
      jumlah=0;
      total = 0;
      <?php
        $nojk = 1;
        foreach ($dataKecamatan as $pk){ ?>
          hc = hc + Number($("#jmlPetanitambak{{$nojk}}").val());
          jumlah = Number($("#jmlNelayanlaut{{$nojk}}").val()) + Number($("#jmlNelayandarat{{$nojk}}").val()) + Number($("#jmlPetanisawah{{$nojk}}").val()) + Number($("#jmlPetanikolam{{$nojk}}").val()) + Number($("#jmlPetanitambak{{$nojk}}").val());
          $("#jmlNelayan{{$nojk}}").val(jumlah);
      <?php
        $nojk ++;
      } ?>
        $("#totalPetanitambak").val(hc);
        $("#totalNelayan").val(Number($("#totalNelayanlaut").val()) + Number($("#totalNelayandarat").val()) + Number($("#totalPetanisawah").val()) + Number($("#totalPetanikolam").val()) + Number($("#totalPetanitambak").val()));
    });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("perikanan");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Nelayan'],
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
                   $kata = $kata . $jkg->totalNelayan. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Nelayan Laut'],
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
                   $kata = $kata . $jkg->totalNelayanlaut . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Nelayan Darat'],
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
                   $kata = $kata . $jkg->totalNelayandarat. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Petani Sawah'],
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
                   $kata = $kata . $jkg->totalPetanisawah. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Petani Kolam'],
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
                   $kata = $kata . $jkg->totalPetanikolam . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Petani Tambak'],
        borderColor: ['rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)',
                      'rgba(119, 136, 153, 0.7)'],
        backgroundColor:['rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)',
                         'rgba(119, 136, 153, 0.5)'],
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->totalPetanitambak . ',';
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
                       text: 'Grafik Data Jumlah Nelayan dan Petani Ikan'
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
