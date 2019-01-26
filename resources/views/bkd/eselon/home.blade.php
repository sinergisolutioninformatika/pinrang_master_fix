@extends('layouts.app')
@section('title','Data Pegawai berdasarkan eselon')

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
        <li class="breadcrumb-item"><a href="/bkd/">Keeselonan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pegawai berdasarkan eselon</li>
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
        <b>Data Pegawai berdasarkan eselon</b>
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
              <canvas id="eselon" width="800px" height="400px"></canvas>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Data Data eselon berdasarkan eselon</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Eselon IIa</th>
                  <th>Eselon IIb</th>
                  <th>Eselon IIIa</th>
                  <th>Eselon IIIb</th>
                  <th>Eselon IVa</th>
                  <th>Eselon IVb</th>
                  <th>Eselon V</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataMaster as $dataM) {
                    ?>
                <form action="/bkd/eselon/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                  <tr>
                    <input type="hidden" name="eselonMaster{{$dataM->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$dataM->ta}}</td>
                    <td style="text-align: center">{{$dataM->eselonIIa}}</td>
                    <td style="text-align: center">{{$dataM->eselonIIb}}</td>
                    <td style="text-align: center">{{$dataM->eselonIIIa}}</td>
                    <td style="text-align: center">{{$dataM->eselonIIIb}}</td>
                    <td style="text-align: center">{{$dataM->eselonIVa}}</td>
                    <td style="text-align: center">{{$dataM->eselonIVb}}</td>
                    <td style="text-align: center">{{$dataM->eselonV}}</td>
                    <td nowrap>
                      <a href="/bkd/eselon/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/bkd/eselon/store" method="post">
            <div class="form-group row">
                <label for="eselonIIa" class="col-md-4 col-form-label text-md-right">Eselon IIa</label>
                <div class="col-md-6">
                    <input id="eselonIIa" type="number" class="form-control" name="eselonIIa" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="eselonIIb" class="col-md-4 col-form-label text-md-right">Eselon IIb</label>
                <div class="col-md-6">
                    <input id="eselonIIb" type="number" class="form-control" name="eselonIIb" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="eselonIIIa" class="col-md-4 col-form-label text-md-right">Eselon IIIa</label>
                <div class="col-md-6">
                    <input id="eselonIIIa" type="number" class="form-control" name="eselonIIIa" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="eselonIIIb" class="col-md-4 col-form-label text-md-right">Eselon IIIb</label>
                <div class="col-md-6">
                    <input id="eselonIIIb" type="number" class="form-control" name="eselonIIIb" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="eselonIVa" class="col-md-4 col-form-label text-md-right">Eselon IVa</label>
                <div class="col-md-6">
                    <input id="eselonIVa" type="number" class="form-control" name="eselonIVa" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="eselonIVb" class="col-md-4 col-form-label text-md-right">Eselon IVb</label>
                <div class="col-md-6">
                    <input id="eselonIVb" type="number" class="form-control" name="eselonIVb" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="eselonV" class="col-md-4 col-form-label text-md-right">Eselon V</label>
                <div class="col-md-6">
                    <input id="eselonV" type="number" class="form-control" name="eselonV" value="0" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="totalPejabat" class="col-md-4 col-form-label text-md-right">Jumlah Pejabat</label>
                <div class="col-md-6">
                    <input id="totalPejabat" type="number" class="form-control" name="totalPejabat" value="0" readonly>
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
     $("#eselonIIa").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIb").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIIa").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIIb").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIVa").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIVb").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonV").keyup(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIa").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIb").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIIa").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIIIb").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIVa").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonIVb").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
     $("#eselonV").change(function() {
        $("#totalPejabat").val(Number($("#eselonIIa").val()) + Number($("#eselonIIb").val())+ Number($("#eselonIIIa").val())+ Number($("#eselonIIIb").val())
        + Number($("#eselonIVa").val())+ Number($("#eselonIVb").val())+ Number($("#eselonV").val()));
     });
    });
</script>

<script>
  var ctx = document.getElementById("eselon");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah Pejabat'],
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
                   $kata = $kata . $jkg->totalPejabat . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon IIa'],
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
                   $kata = $kata . $jkg->eselonIIa . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon IIb'],
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
                   $kata = $kata . $jkg->eselonIIb. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon IIIa'],
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
                   $kata = $kata . $jkg->eselonIIIa . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon IIIb'],
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
                   $kata = $kata . $jkg->eselonIIIb. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon IVa'],
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
                   $kata = $kata . $jkg->eselonIVa . ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon IVb'],
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
                   $kata = $kata . $jkg->eselonIVb. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Eselon V'],
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
                   $kata = $kata . $jkg->eselonV . ',';
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
                       text: 'Graifik Data Pegawai berdasarkan eselon'
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
