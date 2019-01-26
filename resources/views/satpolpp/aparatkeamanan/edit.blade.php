@extends('layouts.app')
@section('title','Data Jumlah Aparat Kemanan dan Ketertiban Umum')

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
        <li class="breadcrumb-item"><a href="/diknas/">Satuan Polisi Pamong Praja</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Aparat Kemanan dan Ketertiban Umum</li>
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
        <b>Data Jumlah Aparat Kemanan dan Ketertiban Umum</b>
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
              <canvas id="aparatkeamanan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Aparat Kemanan dan Ketertiban Umum</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Jumlah Aparat</th>
                    <th>Satpol PP</th>
                    <th>Linmas</th>
                    <th>Petugas Patroli</th>
                    <th>Proses</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/satpolpp/aparatkeamanan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="aparatkeamanan{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlAparat}}</td>
                    <td style="text-align: center">{{$dataM->jmlSatpol}}</td>
                    <td style="text-align: center">{{$dataM->jmlLinmas}}</td>
                    <td style="text-align: center">{{$dataM->jmlPatroli}}</td>
                    <td nowrap>
                      <a href="/satpolpp/aparatkeamanan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/satpolpp/aparatkeamanan/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlSatpol" class="col-md-4 col-form-label text-md-right">Satpol PP</label>
                <div class="col-md-6">
                    <input id="jmlSatpol" type="number" class="form-control" name="jmlSatpol" value="{{$dataE->jmlSatpol}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlLinmas" class="col-md-4 col-form-label text-md-right">Aparat Linmas</label>
                <div class="col-md-6">
                    <input id="jmlLinmas" type="number" class="form-control" name="jmlLinmas" value="{{$dataE->jmlLinmas}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPatroli" class="col-md-4 col-form-label text-md-right">Petugas Patroli</label>
                <div class="col-md-6">
                    <input id="jmlPatroli" type="number" class="form-control" name="jmlPatroli" value="{{$dataE->jmlPatroli}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlAparat" class="col-md-4 col-form-label text-md-right">Jumlah Aparat Keamanan</label>
                <div class="col-md-6">
                    <input id="jmlAparat" type="number" class="form-control" name="jmlAparat" value="{{$dataE->jmlAparat}}" readonly>
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
  $("#jmlSatpol").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlLinmas").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlPatroli").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlLainnya").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlPelajar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlSatpol").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlLinmas").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlPatroli").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlLainnya").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
  $("#jmlPelajar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlSatpol").val())
            + Number($("#jmlLinmas").val())
            + Number($("#jmlPatroli").val());
      $("#jmlAparat").val(hc);
  });
});
</script>

<script>
var ctx = document.getElementById("aparatkeamanan");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Satpol-PP'],
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
                 $kata = $kata . $jkg->jmlSatpol . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Linmas'],
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
                 $kata = $kata . $jkg->jmlLinmas . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Petugas Patroli'],
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
                 $kata = $kata . $jkg->jmlPatroli . ',';
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
           text: 'Grafik Data Jumlah Aparat Kemanan dan Ketertiban Umum'
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
