@extends('layouts.app')
@section('title','Data Pencari Kerja dan Penempatan')

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
        <li class="breadcrumb-item"><a href="/diknas/">Tenaga Kerja</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pencari Kerja dan Penempatan</li>
      </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Pencari Kerja dan Penempatan</b>
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
              <canvas id="pencaker" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Pencari Kerja dan Penempatan</caption>
                <thead>
                  <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Tahun</th>
                    <th colspan="3">Pencari Kerja</th>
                    <th colspan="3">Ditempatkan/diterima</th>
                    <th rowspan="2">Proses</th>
                  </tr>
                  <tr>
                    <th>Jumlah</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                  <tr>
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlPencaker}}</td>
                    <td style="text-align: center">{{$dataM->pencakerLaki}}</td>
                    <td style="text-align: center">{{$dataM->pencakerPerempuan}}</td>
                    <td style="text-align: center">{{$dataM->jmlDitempatkan}}</td>
                    <td style="text-align: center">{{$dataM->ditempatkanLaki}}</td>
                    <td style="text-align: center">{{$dataM->ditempatkanPerempuan}}</td>
                    <td nowrap>
                    </td>
                  </tr>
              <?php
                $nomor ++;
                }
               ?>
            </table>
          </div>
          <div id="menu2" class="container tab-pane fade"><br>

          </div>
        </div>
        <br>
    </div>
  </div>
<br>
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
var ctx = document.getElementById("pencaker");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Jumlah Pencari Kerja'],
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
                 $kata = $kata . $jkg->jmlPencaker . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Pencaker Laki-laki'],
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
                 $kata = $kata . $jkg->pencakerLaki . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Pencaker Perempuan'],
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
                 $kata = $kata . $jkg->pencakerPerempuan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Jumlah Ditempatkan'],
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
                 $kata = $kata . $jkg->jmlDitempatkan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Ditempatkan (Laki-laki)'],
      borderColor: ['rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)',
                     'rgba(153, 102, 255, 0.5)'],
      backgroundColor:['rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)',
                       'rgba(153, 102, 255, 0.5)'],
      pointBackgroundColor:['rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(153, 102, 255, 0.5)'],
      pointHoverBorderColor: ['rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)',
                             'rgba(153, 102, 255, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->ditempatkanLaki . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Ditempatkan (Perempuan)'],
      borderColor: ['rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)',
                     'rgba(119, 136, 153, 0.5)'],
      backgroundColor:['rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)',
                       'rgba(119, 136, 153, 0.5)'],
      pointBackgroundColor:['rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)',
                            'rgba(119, 136, 153, 0.5)'],
      pointHoverBorderColor: ['rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)',
                             'rgba(119, 136, 153, 0.7)'],
      pointBorderWidth:2,
      fill:false,
      data:
      <?php
             $kata = '[';
             foreach ($dataChart as $jkg) {
                 $kata = $kata . $jkg->ditempatkanPerempuan . ',';
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
           text: 'Grafik Jumlah Pencari Kerja'
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
