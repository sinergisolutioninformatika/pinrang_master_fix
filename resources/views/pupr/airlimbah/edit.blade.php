@extends('layouts.app')
@section('title','Data Fasilitas Pengolahan Air Limbah')

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
        <li class="breadcrumb-item"><a href="/pupr/">Pekerjaan Umum</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Fasilitas Pengolahan Air Limbah</li>
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
        <b>Data Fasilitas Pengolahan Air Limbah</b>
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
              <canvas id="airlimbah" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Fasilitas Pengolahan Air Limbah</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Unit</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/pupr/airlimbah/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="airlimbahMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalUnit}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pupr/airlimbah/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <b>Input Data Rekap Baru</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/pupr/airlimbah/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Unit</th>
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
                        <input type="number" id="jmlUnit{{$nomor}}" class="form-control" name="jmlUnit{{$nomor}}" value="{{$dataD->jmlUnit}}">
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
                     <input type="number" id="totalUnit" class="form-control" name="totalUnit" value="{{$dataE->totalUnit}}" readonly>
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
          xmlhttp.open("GET","{{ url('pupr/airlimbah/detail') }}"+'/'+str,true);
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
      $("#jmlUnit{{$nopu}}").keyup(function() {
        hc = 0;
        tk = 0;
        <?php
             $no = 1;
             foreach ($dataKecamatan as $pk){ ?>
               tk = tk + Number($("#jmlUnit{{$no}}").val());
           <?php
             $no ++;
           } ?>
          $("#totalUnit").val(tk);
        });
        $("#jmlUnit{{$nopu}}").change(function() {
          hc = 0;
          tk = 0;
          <?php
               $no = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 tk = tk + Number($("#jmlUnit{{$no}}").val());
             <?php
               $no ++;
             } ?>
            $("#totalUnit").val(tk);
          });
        <?php
          $nopu ++;
        }
         ?>
     });
  </script>
  <script>
  var ctx = document.getElementById("airlimbah");
   var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      datasets: [{
        borderWidth: 3,
        label: ['Jumlah'],
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
                   $kata = $kata . $jkg->totalUnit . ',';
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
             text: 'Grafik Jumlah Fasilitas Pengolahan Air Limbah'
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
