@extends('layouts.app')
@section('title','Data Kondisi Jalan')

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
        <li class="breadcrumb-item"><a href="/diknas/">Pekerjaan Umum</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kondisi Jalan</li>
      </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Kondisi Jalan</b>
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
              <canvas id="jalan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Kondisi Jalan</caption>
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tahun</th>
                    <th>Panjang (km)</th>
                    <th>Baik</th>
                    <th>Sedang</th>
                    <th>Rusak Ringan</th>
                    <th>Rusak Berat</th>
                    <th>Proses</th>
                  </tr>
                </thead>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/pupr/jalan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="jalan{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->panjang}}</td>
                    <td style="text-align: center">{{$dataM->baik}}</td>
                    <td style="text-align: center">{{$dataM->sedang}}</td>
                    <td style="text-align: center">{{$dataM->rusakringan}}</td>
                    <td style="text-align: center">{{$dataM->rusakberat}}</td>
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
  </div>
<br>
    <!-- input data rekap baru -->
    <div class="collapse" id="collapseExample">
      <div class="card">
        <div class="card-header">
          <b>Input Data Rekap Baru</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/pupr/jalan/store" method="post">
            <div class="form-group row">
                <label for="baik" class="col-md-4 col-form-label text-md-right">Kondisi Baik (km)</label>
                <div class="col-md-6">
                    <input id="baik" type="number" class="form-control" name="baik" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="sedang" class="col-md-4 col-form-label text-md-right">Kondisi Sedang</label>
                <div class="col-md-6">
                    <input id="sedang" type="number" class="form-control" name="sedang" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="rusakringan" class="col-md-4 col-form-label text-md-right">Rusak Ringan</label>
                <div class="col-md-6">
                    <input id="rusakringan" type="number" class="form-control" name="rusakringan" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="rusakberat" class="col-md-4 col-form-label text-md-right">Rusak Ringan</label>
                <div class="col-md-6">
                    <input id="rusakberat" type="number" class="form-control" name="rusakberat" value="0" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="panjang" class="col-md-4 col-form-label text-md-right">Jumlah Aparat Keamanan</label>
                <div class="col-md-6">
                    <input id="panjang" type="number" class="form-control" name="panjang" value="0" readonly>
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
  $("#baik").keyup(function() {
    hc = 0;
    hc = hc + Number($("#baik").val())
            + Number($("#sedang").val())
            + Number($("#rusakringan").val())
            + Number($("#rusakberat").val());
      $("#panjang").val(hc);
   });
   $("#sedang").keyup(function() {
     hc = 0;
     hc = hc + Number($("#baik").val())
             + Number($("#sedang").val())
             + Number($("#rusakringan").val())
             + Number($("#rusakberat").val());
       $("#panjang").val(hc);
    });
    $("#rusakringan").keyup(function() {
      hc = 0;
      hc = hc + Number($("#baik").val())
              + Number($("#sedang").val())
              + Number($("#rusakringan").val())
              + Number($("#rusakberat").val());
        $("#panjang").val(hc);
     });
     $("#rusakberat").keyup(function() {
       hc = 0;
       hc = hc + Number($("#baik").val())
               + Number($("#sedang").val())
               + Number($("#rusakringan").val())
               + Number($("#rusakberat").val());
         $("#panjang").val(hc);
      });
      $("#baik").change(function() {
        hc = 0;
        hc = hc + Number($("#baik").val())
                + Number($("#sedang").val())
                + Number($("#rusakringan").val())
                + Number($("#rusakberat").val());
          $("#panjang").val(hc);
       });
       $("#sedang").change(function() {
         hc = 0;
         hc = hc + Number($("#baik").val())
                 + Number($("#sedang").val())
                 + Number($("#rusakringan").val())
                 + Number($("#rusakberat").val());
           $("#panjang").val(hc);
        });
        $("#rusakringan").change(function() {
          hc = 0;
          hc = hc + Number($("#baik").val())
                  + Number($("#sedang").val())
                  + Number($("#rusakringan").val())
                  + Number($("#rusakberat").val());
            $("#panjang").val(hc);
         });
         $("#rusakberat").change(function() {
           hc = 0;
           hc = hc + Number($("#baik").val())
                   + Number($("#sedang").val())
                   + Number($("#rusakringan").val())
                   + Number($("#rusakberat").val());
             $("#panjang").val(hc);
          });
});
</script>

<script>
var ctx = document.getElementById("jalan");
 var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    datasets: [{
      borderWidth: 3,
      label: ['Baik'],
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
                 $kata = $kata . $jkg->baik . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Sedang'],
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
                 $kata = $kata . $jkg->sedang . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Rusak Ringan'],
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
                 $kata = $kata . $jkg->rusakringan . ',';
             }
             $kata = $kata . "]";
             $kata = str_replace(",]", "]", $kata);
             echo $kata;
            ?>
    },
    {
      borderWidth: 3,
      label: ['Rusak Berat'],
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
                 $kata = $kata . $jkg->rusakberat . ',';
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
           text: 'Grafik Data Kondisi Jalan'
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
