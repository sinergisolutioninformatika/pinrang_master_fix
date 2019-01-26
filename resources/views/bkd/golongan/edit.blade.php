@extends('layouts.app')
@section('title','Data Pegawai berdasarkan golongan')

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
        <li class="breadcrumb-item"><a href="/bkd/">Kegolonganan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pegawai berdasarkan golongan</li>
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
        <b>Data Pegawai berdasarkan golongan</b>
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
              <canvas id="golongan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Data golongan berdasarkan golongan</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Golongan I</th>
                  <th>Golongan II</th>
                  <th>Golongan III</th>
                  <th>Golongan IV</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/bkd/golongan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="golonganMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->golI}}</td>
                    <td style="text-align: center">{{$dataM->golII}}</td>
                    <td style="text-align: center">{{$dataM->golIII}}</td>
                    <td style="text-align: center">{{$dataM->golIV}}</td>
                    <td nowrap>
                      <a href="/bkd/golongan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/bkd/golongan/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="golI" class="col-md-4 col-form-label text-md-right">Golongan I</label>
                <div class="col-md-6">
                    <input id="golI" type="number" class="form-control" name="golI" value="{{$dataE->golI}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="golII" class="col-md-4 col-form-label text-md-right">Golongan II</label>
                <div class="col-md-6">
                    <input id="golII" type="number" class="form-control" name="golII" value="{{$dataE->golII}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="golIII" class="col-md-4 col-form-label text-md-right">Golongan III</label>
                <div class="col-md-6">
                    <input id="golIII" type="number" class="form-control" name="golIII" value="{{$dataE->golIII}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="golIV" class="col-md-4 col-form-label text-md-right">Golongan IV</label>
                <div class="col-md-6">
                    <input id="golIV" type="number" class="form-control" name="golIV" value="{{$dataE->golIV}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="totalGol" class="col-md-4 col-form-label text-md-right">Jumlah Pegawai</label>
                <div class="col-md-6">
                    <input id="totalGol" type="number" class="form-control" name="totalGol" value="{{$dataE->totalGol}}" readonly>
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
     $("#golI").keyup(function() {
        $("#totalGol").val(Number($("#golI").val()) + Number($("#golII").val())+ Number($("#golIII").val())+ Number($("#golIV").val()));
     });
     $("#golII").keyup(function() {
        $("#totalGol").val(Number($("#golI").val()) + Number($("#golII").val())+ Number($("#golIII").val())+ Number($("#golIV").val()));
     });
     $("#golIII").keyup(function() {
        $("#totalGol").val(Number($("#golI").val()) + Number($("#golII").val())+ Number($("#golIII").val())+ Number($("#golIV").val()));
     });
     $("#golIV").keyup(function() {
        $("#totalGol").val(Number($("#golI").val()) + Number($("#golII").val())+ Number($("#golIII").val())+ Number($("#golIV").val()));
     });
    });
</script>

<script>
  var ctx = document.getElementById("golongan");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Gol I'],
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
                   $kata = $kata . $jkg->golI . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Gol II'],
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
                   $kata = $kata . $jkg->golII . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Gol III'],
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
                   $kata = $kata . $jkg->golIII . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Gol IV'],
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
                   $kata = $kata . $jkg->golIV . ',';
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
                       text: 'Graifik Data Pegawai berdasarkan golongan'
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
