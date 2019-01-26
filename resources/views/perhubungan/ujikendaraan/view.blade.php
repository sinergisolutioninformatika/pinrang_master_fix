@extends('layouts.app')
@section('title','Data Jumlah Kendaraan Uji')

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
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Kendaraan Uji</li>
      </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Jumlah Kendaraan Uji</b>
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
              <canvas id="ujikendaraan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Jumlah Kendaraan Uji</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Jumlah Kendaraan</th>
                    <th>Mobil Penumpang</th>
                    <th>Mobil Barang</th>
                    <th>Mobil Khusus</th>
                    <th>Kereta Gandengan</th>
                    <th>Kereta Tempelan</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/perhubungan/ujikendaraan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="ujikendaraanMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlKendaraan}}</td>
                    <td style="text-align: center">{{$dataM->Mobilpenumpang}}</td>
                    <td style="text-align: center">{{$dataM->Mobilbarang}}</td>
                    <td style="text-align: center">{{$dataM->Mobilkhusus}}</td>
                    <td style="text-align: center">{{$dataM->Keretagandeng}}</td>
                    <td style="text-align: center">{{$dataM->Keretatempelan}}</td>
                    <td nowrap>
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
<br>  </div>
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
    var ctx = document.getElementById("ujikendaraan");
    var myLineChart = new Chart(ctx, {
      type: 'bar',
      data: {
        datasets: [{
          borderWidth: 1,
          label: ['Jumlah Kendaraan'],
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
                     $kata = $kata . $jkg->jmlKendaraan. ',';
                 }
                 $kata = $kata . "]";
                 $kata = str_replace(",]", "]", $kata);
                 echo $kata;
                ?>
        },
        {
          borderWidth: 1,
          label: ['Mobil Penumpang'],
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
                     $kata = $kata . $jkg->Mobilpenumpang. ',';
                 }
                 $kata = $kata . "]";
                 $kata = str_replace(",]", "]", $kata);
                 echo $kata;
                ?>
        },
        {
          borderWidth: 1,
          label: ['Mobil Barang'],
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
                     $kata = $kata . $jkg->Mobilbarang. ',';
                 }
                 $kata = $kata . "]";
                 $kata = str_replace(",]", "]", $kata);
                 echo $kata;
                ?>
        },
        {
          borderWidth: 1,
          label: ['Mobil Khusus'],
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
                     $kata = $kata . $jkg->Mobilkhusus. ',';
                 }
                 $kata = $kata . "]";
                 $kata = str_replace(",]", "]", $kata);
                 echo $kata;
                ?>
          ,

        },
        {
          borderWidth: 1,
          label: ['Kereta Gandengan'],
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
                     $kata = $kata . $jkg->Keretagandeng. ',';
                 }
                 $kata = $kata . "]";
                 $kata = str_replace(",]", "]", $kata);
                 echo $kata;
                ?>
          ,

        },
        {
          borderWidth: 1,
          label: ['Kereta Tempelan'],
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
                     $kata = $kata . $jkg->Keretatempelan. ',';
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
                         text: 'Grafik Jumlah Kendaraan Uji'
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
