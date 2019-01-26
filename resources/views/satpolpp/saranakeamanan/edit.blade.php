@extends('layouts.app')
@section('title','Data Jumlah Sarana Keamanan dan Ketertiban Umum')

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
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Sarana Keamanan dan Ketertiban Umum</li>
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
        <b>Data Jumlah Sarana Keamanan dan Ketertiban Umum</b>
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
              <canvas id="saranakeamanan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Sarana Keamanan dan Ketertiban Umum</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Jumlah Sarana</th>
                    <th>Pos Keamanan</th>
                    <th>Pos Kamling</th>
                    <th>Proses</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/satpolpp/saranakeamanan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="saranakeamanan{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlSarana}}</td>
                    <td style="text-align: center">{{$dataM->jmlPoskeamanan}}</td>
                    <td style="text-align: center">{{$dataM->jmlPoskamling}}</td>
                    <td nowrap>
                      <a href="/satpolpp/saranakeamanan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/satpolpp/saranakeamanan/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlPoskeamanan" class="col-md-4 col-form-label text-md-right">Pos Keamanan</label>
                <div class="col-md-6">
                    <input id="jmlPoskeamanan" type="number" class="form-control" name="jmlPoskeamanan" value="{{$dataE->jmlPoskeamanan}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlPoskamling" class="col-md-4 col-form-label text-md-right">Pos Kamling</label>
                <div class="col-md-6">
                    <input id="jmlPoskamling" type="number" class="form-control" name="jmlPoskamling" value="{{$dataE->jmlPoskamling}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlSarana" class="col-md-4 col-form-label text-md-right">Jumlah Sarana Keamanan</label>
                <div class="col-md-6">
                    <input id="jmlSarana" type="number" class="form-control" name="jmlSarana" value="{{$dataE->jmlSarana}}" readonly>
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
  $("#jmlPoskeamanan").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPoskamling").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPatroli").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlLainnya").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPelajar").keyup(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPoskeamanan").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPoskamling").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPatroli").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlLainnya").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
  $("#jmlPelajar").change(function() {
    hc = 0;
    hc = hc + Number($("#jmlPoskeamanan").val())
            + Number($("#jmlPoskamling").val());
      $("#jmlSarana").val(hc);
  });
});
</script>

<script>
var ctx = document.getElementById("saranakeamanan");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Pos Keamanan'],
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
                 $kata = $kata . $jkg->jmlPoskeamanan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Pos Kamling'],
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
                 $kata = $kata . $jkg->jmlPoskamling . ',';
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
           text: 'Grafik Data Jumlah Sarana Keamanan dan Ketertiban Umum'
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
