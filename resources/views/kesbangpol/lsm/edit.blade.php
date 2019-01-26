@extends('layouts.app')
@section('title','Data Lembaga Swadaya Masyarakat')

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
        <li class="breadcrumb-item"><a href="/diknas/">Badan Kesatuan Bangsa dan Politik</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Lembaga Swadaya Masyarakat</li>
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
        <b>Data Lembaga Swadaya Masyarakat</b>
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
              <canvas id="lsm" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Lembaga Swadaya Masyarakat</caption>
                <thead>
                  <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Tahun</th>
                    <th rowspan="2">Jumlah LSM</th>
                    <th colspan="2">Lokal</th>
                    <th colspan="2">Nasional</th>
                    <th colspan="2">Internasional</th>
                    <th rowspan="2">Proses</th>
                  </tr>
                  <tr>
                    <th>Terdaftar</th>
                    <th>Tidak Terdaftar</th>
                    <th>Terdaftar</th>
                    <th>Tidak Terdaftar</th>
                    <th>Terdaftar</th>
                    <th>Tidak Terdaftar</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/kesbangpol/lsm/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="lsm{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlLSM}}</td>
                    <td style="text-align: center">{{$dataM->jmlLokalterdaftar}}</td>
                    <td style="text-align: center">{{$dataM->jmlLokaltidakterdaftar}}</td>
                    <td style="text-align: center">{{$dataM->jmlNasionalterdaftar}}</td>
                    <td style="text-align: center">{{$dataM->jmlNasionaltidakterdaftar}}</td>
                    <td style="text-align: center">{{$dataM->jmlInterterdaftar}}</td>
                    <td style="text-align: center">{{$dataM->jmlIntertidakterdaftar}}</td>
                    <td nowrap>
                      <a href="/kesbangpol/lsm/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$dataM->id}}')">
                        <img src="/image/delete.png" alt="">
                      </a>
                    </td>
                  </tr>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{ method_field('DELETE') }}
                </form>
              <?php
                $nomor ++;
                }
               ?>
            </table>
          </div>
          <div id="menu2" class="container tab-pane fade"><br>

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
          <form class="form-group" action="/kesbangpol/lsm/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlLokalterdaftar" class="col-md-4 col-form-label text-md-right">LSM Lokal Terdaftar</label>
                <div class="col-md-6">
                    <input id="jmlLokalterdaftar" type="number" class="form-control" name="jmlLokalterdaftar" value="{{$dataE->jmlLokalterdaftar}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlLokaltidakterdaftar" class="col-md-4 col-form-label text-md-right">LSM Lokal Tidak Terdaftar</label>
                <div class="col-md-6">
                    <input id="jmlLokaltidakterdaftar" type="number" class="form-control" name="jmlLokaltidakterdaftar" value="{{$dataE->jmlLokaltidakterdaftar}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlNasionalterdaftar" class="col-md-4 col-form-label text-md-right">LSM Nasional Terdaftar</label>
                <div class="col-md-6">
                    <input id="jmlNasionalterdaftar" type="number" class="form-control" name="jmlNasionalterdaftar" value="{{$dataE->jmlNasionalterdaftar}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlNasionaltidakterdaftar" class="col-md-4 col-form-label text-md-right">LSM Nasional Tidak Terdaftar</label>
                <div class="col-md-6">
                    <input id="jmlNasionaltidakterdaftar" type="number" class="form-control" name="jmlNasionaltidakterdaftar" value="{{$dataE->jmlNasionaltidakterdaftar}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlInterterdaftar" class="col-md-4 col-form-label text-md-right">LSM Internasional Terdaftar</label>
                <div class="col-md-6">
                    <input id="jmlInterterdaftar" type="number" class="form-control" name="jmlInterterdaftar" value="{{$dataE->jmlInterterdaftar}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlIntertidakterdaftar" class="col-md-4 col-form-label text-md-right">LSM Internasional Tidak Terdaftar</label>
                <div class="col-md-6">
                    <input id="jmlIntertidakterdaftar" type="number" class="form-control" name="jmlIntertidakterdaftar" value="{{$dataE->jmlIntertidakterdaftar}}">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlLSM" class="col-md-4 col-form-label text-md-right">Jumlah LSM</label>
                <div class="col-md-6">
                    <input id="jmlLSM" type="number" class="form-control" name="jmlLSM" value="{{$dataE->jmlLSM}}" readonly>
                </div>
            </div>
        </div>{{ csrf_field() }}
        <div class="card-footer">
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
  </script>

<script>
$(document).ready(function() {
  $("#jmlLokalterdaftar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlLokaltidakterdaftar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlNasionalterdaftar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlNasionaltidakterdaftar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlInterterdaftar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlIntertidakterdaftar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlLokalterdaftar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlLokaltidakterdaftar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlNasionalterdaftar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlNasionaltidakterdaftar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlInterterdaftar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
  $("#jmlIntertidakterdaftar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlLokalterdaftar").val())
            + Number($("#jmlLokaltidakterdaftar").val())
            + Number($("#jmlNasionalterdaftar").val())
            + Number($("#jmlNasionaltidakterdaftar").val())
            + Number($("#jmlInterterdaftar").val())
            + Number($("#jmlIntertidakterdaftar").val());
      $("#jmlLSM").val(hc);
  });
});
</script>

<script>
  var ctx = document.getElementById("lsm");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['LSM Lokal Terdaftar'],
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
                   $kata = $kata . $jkg->jmlLokalterdaftar . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['LSM Lokal Tidak Terdaftar'],
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
                   $kata = $kata . $jkg->jmlLokaltidakterdaftar . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['LSM Nasional Terdaftar'],
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
                   $kata = $kata . $jkg->jmlNasionalterdaftar. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['LSM Nasional Tidak Terdaftar'],
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
                   $kata = $kata . $jkg->jmlNasionaltidakterdaftar. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
        ,

      },
      {
        borderWidth: 1,
        label: ['LSM Internasional Terdaftar'],
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
                   $kata = $kata . $jkg->jmlInterterdaftar. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
        ,

      },
      {
        borderWidth: 1,
        label: ['LSM Internasional Tidak Terdaftar'],
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
                   $kata = $kata . $jkg->jmlIntertidakterdaftar. ',';
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
                       text: 'Grafik Jumlah Lembaga Swadaya Masyarakat'
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
