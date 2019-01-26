@extends('layouts.app')
@section('title','Data Kecalakaan Lalu Lintas')

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
        <li class="breadcrumb-item"><a href="/diknas/">Perhubungan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kecalakaan Lalu Lintas</li>
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
        <b>Data Kecalakaan Lalu Lintas</b>
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
              <canvas id="lakalantas" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Kecalakaan Lalu Lintas</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Jumlah Kejadian</th>
                    <th>Meninggal</th>
                    <th>Luka Berat</th>
                    <th>Luka Ringan</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/perhubungan/lakalantas/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="lakalantasMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlKejadian}}</td>
                    <td style="text-align: center">{{$dataM->Meninggal}}</td>
                    <td style="text-align: center">{{$dataM->Lukaberat}}</td>
                    <td style="text-align: center">{{$dataM->Lukaringan}}</td>
                    <td nowrap>
                      <a href="/perhubungan/lakalantas/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <b>Edit Data : {{$dataE->$ta}}</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/perhubungan/lakalantas/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlKejadian" class="col-md-4 col-form-label text-md-right">Jumlah Kejadian</label>
                <div class="col-md-6">
                    <input id="jmlKejadian" type="number" class="form-control" name="jmlKejadian" value="{{$dataE->jmlKejadian}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="Meninggal" class="col-md-4 col-form-label text-md-right">Korban Meninggal</label>
                <div class="col-md-6">
                    <input id="Meninggal" type="number" class="form-control" name="Meninggal" value="{{$dataE->Meninggal}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="Lukaberat" class="col-md-4 col-form-label text-md-right">Luka Berat</label>
                <div class="col-md-6">
                    <input id="Lukaberat" type="number" class="form-control" name="Lukaberat" value="{{$dataE->Lukaberat}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="Lukaringan" class="col-md-4 col-form-label text-md-right">Luka Ringan</label>
                <div class="col-md-6">
                    <input id="Lukaringan" type="number" class="form-control" name="Lukaringan" value="{{$dataE->Lukaringan}}" autofocus>
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
var ctx = document.getElementById("lakalantas");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Jumlah Kejadian'],
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
                 $kata = $kata . $jkg->jmlKejadian . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Korban Meninggal'],
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
                 $kata = $kata . $jkg->Meninggal . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Luka Berat'],
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
                 $kata = $kata . $jkg->Lukaberat . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Luka Ringan'],
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
                 $kata = $kata . $jkg->Lukaringan . ',';
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
           text: 'Grafik Jumlah Kecelakaan Lalu Lintas'
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
