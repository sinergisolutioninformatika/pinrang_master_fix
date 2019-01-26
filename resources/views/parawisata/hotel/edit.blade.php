@extends('layouts.app')
@section('title','Data Hotel')

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
        <li class="breadcrumb-item"><a href="/diknas/">parawisata</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Hotel</li>
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
        <b>Data Hotel</b>
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
              <canvas id="hotel" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Hotel</caption>
                <thead>
                  <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Tahun</th>
                    <th rowspan="2">Wisma/Penginapan</th>
                    <th colspan="4">Hotel</th>
                    <th rowspan="2">Proses</th>
                  </tr>
                  <tr>
                    <th>Jumlah</th>
                    <th>Melati 1</th>
                    <th>Melati 2</th>
                    <th>Melati 3</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/parawisata/hotel/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="hotelMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlWisma}}</td>
                    <td style="text-align: center">{{$dataM->jmlHotel}}</td>
                    <td style="text-align: center">{{$dataM->jmlMelati1}}</td>
                    <td style="text-align: center">{{$dataM->jmlMelati2}}</td>
                    <td style="text-align: center">{{$dataM->jmlMelati3}}</td>
                    <td nowrap>
                      <a href="/parawisata/hotel/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/parawisata/hotel/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="jmlWisma" class="col-md-4 col-form-label text-md-right">Jumlah Wisma/Penginapan</label>
                <div class="col-md-6">
                    <input id="jmlWisma" type="number" class="form-control" name="jmlWisma" value="{{$dataE->jmlWisma}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlMelati1" class="col-md-4 col-form-label text-md-right">Hotel Melati 1</label>
                <div class="col-md-6">
                    <input id="jmlMelati1" type="number" class="form-control" name="jmlMelati1" value="{{$dataE->jmlMelati1}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlMelati2" class="col-md-4 col-form-label text-md-right">Hotel Melati 2</label>
                <div class="col-md-6">
                    <input id="jmlMelati2" type="number" class="form-control" name="jmlMelati2" value="{{$dataE->jmlMelati2}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlMelati3" class="col-md-4 col-form-label text-md-right">Hotel Melati 3</label>
                <div class="col-md-6">
                    <input id="jmlMelati3" type="number" class="form-control" name="jmlMelati3" value="{{$dataE->jmlMelati3}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlHotel" class="col-md-4 col-form-label text-md-right">Jumlah Hotel</label>
                <div class="col-md-6">
                    <input id="jmlHotel" type="number" class="form-control" name="jmlHotel" value="{{$dataE->jmlHotel}}" readonly>
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
  $("#jmlMelati1").keyup(function() {
    $("#jmlHotel").val(Number($("#jmlMelati1").val()) +  Number($("#jmlMelati2").val()) +  Number($("#jmlMelati3").val()));
  });
  $("#jmlMelati2").keyup(function() {
    $("#jmlHotel").val(Number($("#jmlMelati1").val()) +  Number($("#jmlMelati2").val()) +  Number($("#jmlMelati3").val()));
  });
  $("#jmlMelati3").keyup(function() {
    $("#jmlHotel").val(Number($("#jmlMelati1").val()) +  Number($("#jmlMelati2").val()) +  Number($("#jmlMelati3").val()));
  });
});
</script>

<script>
  var ctx = document.getElementById("hotel");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Wisma/Penginapan'],
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
                   $kata = $kata . $jkg->jmlWisma. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Hotel'],
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
                   $kata = $kata . $jkg->jmlHotel . ',';
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
                       text: 'Grafik Jumlah Wisma dan Hotel'
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
