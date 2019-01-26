@extends('layouts.app')
@section('title','Data Pegawai Berdasarkan Pendidikan')

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
        <li class="breadcrumb-item"><a href="/bkd/">Kepegawaian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pegawai Berdasarkan Pendidikan</li>
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
        <b>Data Pegawai Berdasarkan Pendidikan</b>
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
              <canvas id="pegawaipendidikan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Pegawai Berdasarkan Pendidikan</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>SD</th>
                  <th>SMP</th>
                  <th>SMA</th>
                  <th>D1</th>
                  <th>D2</th>
                  <th>D3</th>
                  <th>S1</th>
                  <th>S2</th>
                  <th>S3</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/bkd/pegawaipendidikan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="pegawaipendidikanMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlSD}}</td>
                    <td style="text-align: center">{{$dataM->jmlSMP}}</td>
                    <td style="text-align: center">{{$dataM->jmlSMA}}</td>
                    <td style="text-align: center">{{$dataM->jmlD1}}</td>
                    <td style="text-align: center">{{$dataM->jmlD2}}</td>
                    <td style="text-align: center">{{$dataM->jmlD3}}</td>
                    <td style="text-align: center">{{$dataM->jmlS1}}</td>
                    <td style="text-align: center">{{$dataM->jmlS2}}</td>
                    <td style="text-align: center">{{$dataM->jmlS3}}</td>
                    <td nowrap>
                      <a href="/bkd/pegawaipendidikan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/bkd/pegawaipendidikan/store" method="post">
            <div class="form-group row">
                <label for="jmlSD" class="col-md-4 col-form-label text-md-right">Tamat SD</label>
                <div class="col-md-6">
                    <input id="jmlSD" type="number" class="form-control" name="jmlSD" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlSMP" class="col-md-4 col-form-label text-md-right">Tamat SMP</label>
                <div class="col-md-6">
                    <input id="jmlSMP" type="number" class="form-control" name="jmlSMP" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlSMA" class="col-md-4 col-form-label text-md-right">Tamat SMA</label>
                <div class="col-md-6">
                    <input id="jmlSMA" type="number" class="form-control" name="jmlSMA" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlD1" class="col-md-4 col-form-label text-md-right">Diploma 1</label>
                <div class="col-md-6">
                    <input id="jmlD1" type="number" class="form-control" name="jmlD1" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlD2" class="col-md-4 col-form-label text-md-right">Diploma 2</label>
                <div class="col-md-6">
                    <input id="jmlD2" type="number" class="form-control" name="jmlD2" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlD3" class="col-md-4 col-form-label text-md-right">Diploma 3</label>
                <div class="col-md-6">
                    <input id="jmlD3" type="number" class="form-control" name="jmlD3" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlS1" class="col-md-4 col-form-label text-md-right">Sarjana (S1)</label>
                <div class="col-md-6">
                    <input id="jmlS1" type="number" class="form-control" name="jmlS1" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlS2" class="col-md-4 col-form-label text-md-right">Master (S2)</label>
                <div class="col-md-6">
                    <input id="jmlS2" type="number" class="form-control" name="jmlS2" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="jmlS3" class="col-md-4 col-form-label text-md-right">Doktor (S3)</label>
                <div class="col-md-6">
                    <input id="jmlS3" type="number" class="form-control" name="jmlS3" value="0" autofocus>
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
  });
</script>

<script>
  var ctx = document.getElementById("pegawaipendidikan");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['SD'],
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
                   $kata = $kata . $jkg->jmlSD . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['SMP'],
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
                   $kata = $kata . $jkg->jmlSMP . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['SMA'],
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
                   $kata = $kata . $jkg->jmlSMA . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['D1'],
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
                   $kata = $kata . $jkg->jmlD1 . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['D2'],
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
                   $kata = $kata . $jkg->jmlD2 . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['D3'],
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
                   $kata = $kata . $jkg->jmlD3 . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['S1'],
        borderColor: ['rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)',
                      'rgba(0, 153, 153, 0.7)'],
        backgroundColor:['rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)',
                         'rgba(0, 153, 153, 0.5)'],
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->jmlS1 . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['S2'],
        borderColor: ['rgba(244, 66, 131, 0.7)',
                      'rgba(244, 66, 131, 0.7)',
                      'rgba(244, 66, 131, 0.7)',
                      'rgba(244, 66, 131, 0.7)',
                      'rgba(244, 66, 131, 0.7)',
                      'rgba(244, 66, 131, 0.7)',
                      'rgba(244, 66, 131, 0.7)'],
        backgroundColor:['rgba(244, 66, 131, 0.5)',
                         'rgba(244, 66, 131, 0.5)',
                         'rgba(244, 66, 131, 0.5)',
                         'rgba(244, 66, 131, 0.5)',
                         'rgba(244, 66, 131, 0.5)',
                         'rgba(244, 66, 131, 0.5)',
                         'rgba(244, 66, 131, 0.5)'],
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->jmlS2 . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['S3'],
        borderColor: ['rgba(244, 215, 66, 0.7)',
                      'rgba(244, 215, 66, 0.7)',
                      'rgba(244, 215, 66, 0.7)',
                      'rgba(244, 215, 66, 0.7)',
                      'rgba(244, 215, 66, 0.7)',
                      'rgba(244, 215, 66, 0.7)',
                      'rgba(244, 215, 66, 0.7)'],
        backgroundColor:['rgba(244, 215, 66, 0.5)',
                         'rgba(244, 215, 66, 0.5)',
                         'rgba(244, 215, 66, 0.5)',
                         'rgba(244, 215, 66, 0.5)',
                         'rgba(244, 215, 66, 0.5)',
                         'rgba(244, 215, 66, 0.5)',
                         'rgba(244, 215, 66, 0.5)'],
        data:
        <?php
               $kata = '[';
               foreach ($dataChart as $jkg) {
                   $kata = $kata . $jkg->jmlS3 . ',';
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
                       text: 'Graifik Data Pegawai Berdasarkan Pendidikan'
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
