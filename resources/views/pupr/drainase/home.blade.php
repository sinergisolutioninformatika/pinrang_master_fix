@extends('layouts.app')
@section('title','Data Panjang Drainase Terhubung Dengan Sungai')

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
        <li class="breadcrumb-item active" aria-current="page">Data Panjang Drainase Terhubung Dengan Sungai</li>
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
        <b>Data Panjang Drainase Terhubung Dengan Sungai</b>
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
              <canvas id="drainase" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Panjang Drainase Terhubung Dengan Sungai</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Volume (km)</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/pupr/drainase/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="drainaseMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->totalVol}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pupr/drainase/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/pupr/drainase/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Volume (km)</th>
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
                        <input type="number" id="jmlVol{{$nomor}}" class="form-control" name="jmlVol{{$nomor}}" value="0">
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
                     <input type="number" id="totalVol" class="form-control" name="totalVol" value="0" readonly>
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
          xmlhttp.open("GET","{{url('pupr/drainase/detail')}}"+'/'+str,true);
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
      $("#jmlVol{{$nopu}}").keyup(function() {
        hc = 0;
        tk = 0;
        <?php
             $no = 1;
             foreach ($dataKecamatan as $pk){ ?>
               tk = tk + Number($("#jmlVol{{$no}}").val());
           <?php
             $no ++;
           } ?>
          $("#totalVol").val(tk);
        });
        $("#jmlVol{{$nopu}}").change(function() {
          hc = 0;
          tk = 0;
          <?php
               $no = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 tk = tk + Number($("#jmlVol{{$no}}").val());
             <?php
               $no ++;
             } ?>
            $("#totalVol").val(tk);
          });
        <?php
          $nopu ++;
        }
         ?>
     });
  </script>
  <script>
  var ctx = document.getElementById("drainase");
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
                   $kata = $kata . $jkg->totalVol . ',';
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
             text: 'Grafik Data Panjang Drainase Terhubung Dengan Sungai'
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
