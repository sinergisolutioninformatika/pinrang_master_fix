@extends('layouts.app')
@section('title','Data Kantor Perbankan')

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
        <li class="breadcrumb-item"><a href="/koperasi/">Perbankan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kantor Perbankan</li>
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
        <b>Data Kantor Perbankan</b>
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
              <canvas id="perbankan" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Kantor Perbankan</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah Bank</th>
                  <th>Bank Umum Pemerintah</th>
                  <th>Bank Pembangunan Daerah</th>
                  <th>Bank Swasta Nasional</th>
                  <th>Bank Asing Campuran</th>
                  <th>Bank Perkreditan Rakyat</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/koperasi/perbankan/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="perbankanMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->jmlBank}}</td>
                    <td style="text-align: center">{{$dataM->BUP}}</td>
                    <td style="text-align: center">{{$dataM->BPD}}</td>
                    <td style="text-align: center">{{$dataM->BSN}}</td>
                    <td style="text-align: center">{{$dataM->BAC}}</td>
                    <td style="text-align: center">{{$dataM->BPR}}</td>
                    <td nowrap>
                      <a href="/koperasi/perbankan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <b>Edit Data</b>
        </div>
        <div class="card-body">
          <form class="form-group" action="/koperasi/perbankan/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="BUP" class="col-md-4 col-form-label text-md-right">Bank Umum Pemerintah</label>
                <div class="col-md-6">
                    <input id="BUP" type="number" class="form-control" name="BUP" value="{{$dataE->BUP}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="BPD" class="col-md-4 col-form-label text-md-right">Bank Pembangunan Daerah</label>
                <div class="col-md-6">
                    <input id="BPD" type="number" class="form-control" name="BPD" value="{{$dataE->BPD}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="BSN" class="col-md-4 col-form-label text-md-right">Bank Swasta Nasional</label>
                <div class="col-md-6">
                    <input id="BSN" type="number" class="form-control" name="BSN" value="{{$dataE->BSN}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="BAC" class="col-md-4 col-form-label text-md-right">Bank Asing Campuran</label>
                <div class="col-md-6">
                    <input id="BAC" type="number" class="form-control" name="BAC" value="{{$dataE->BAC}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="BPR" class="col-md-4 col-form-label text-md-right">Bank Perkreditan Rakyat</label>
                <div class="col-md-6">
                    <input id="BPR" type="number" class="form-control" name="BPR" value="{{$dataE->BPR}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlBank" class="col-md-4 col-form-label text-md-right">Jumlah Bank</label>
                <div class="col-md-6">
                    <input id="jmlBank" type="number" class="form-control" name="jmlBank" value="{{$dataE->jmlBank}}" readonly>
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
     $("#BUP").keyup(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BPD").keyup(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BSN").keyup(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BAC").keyup(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BPR").keyup(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BUP").change(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BPD").change(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BSN").change(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BAC").change(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
     $("#BPR").change(function() {
        $("#jmlBank").val(Number($("#BUP").val()) + Number($("#BPD").val())+ Number($("#BSN").val())+ Number($("#BAC").val()) + Number($("#BPR").val()));
     });
    });
</script>

<script>
  var ctx = document.getElementById("perbankan");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Bank'],
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
                   $kata = $kata . $jkg->jmlBank . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['BUP'],
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
                   $kata = $kata . $jkg->BUP . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['BPD'],
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
                   $kata = $kata . $jkg->BPD. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['BSN'],
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
                   $kata = $kata . $jkg->BSN . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['BAC'],
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
                   $kata = $kata . $jkg->BAC. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['BPR'],
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
                   $kata = $kata . $jkg->BPR . ',';
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
                       text: 'Graifik Data Kantor Perbankan'
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
