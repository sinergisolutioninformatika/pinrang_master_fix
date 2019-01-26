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

@section('menu')
@include('menu')
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
                      <a href="/perhubungan/ujikendaraan/edit/{{$dataM->id}}"><img src="/image/edit.png" alt=""></a>
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
          <form class="form-group" action="/perhubungan/ujikendaraan/update/{{$kodeEdit}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group row">
                <label for="Mobilpenumpang" class="col-md-4 col-form-label text-md-right">Mobil Penumpang</label>
                <div class="col-md-6">
                    <input id="Mobilpenumpang" type="number" class="form-control" name="Mobilpenumpang" value="{{$dataE->Mobilpenumpang}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="Mobilbarang" class="col-md-4 col-form-label text-md-right">Mobil Barang</label>
                <div class="col-md-6">
                    <input id="Mobilbarang" type="number" class="form-control" name="Mobilbarang" value="{{$dataE->Mobilbarang}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="Mobilkhusus" class="col-md-4 col-form-label text-md-right">Mobil Khusus</label>
                <div class="col-md-6">
                    <input id="Mobilkhusus" type="number" class="form-control" name="Mobilkhusus" value="{{$dataE->Mobilkhusus}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="Keretagandeng" class="col-md-4 col-form-label text-md-right">Kereta Gandengan</label>
                <div class="col-md-6">
                    <input id="Keretagandeng" type="number" class="form-control" name="Keretagandeng" value="{{$dataE->Keretagandeng}}" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="Keretatempelan" class="col-md-4 col-form-label text-md-right">Kereta Tempelan</label>
                <div class="col-md-6">
                    <input id="Keretatempelan" type="number" class="form-control" name="Keretatempelan" value="{{$dataE->Keretatempelan}}" autofocus>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="jmlKendaraan" class="col-md-4 col-form-label text-md-right">Jumlah Kendaraan</label>
                <div class="col-md-6">
                    <input id="jmlKendaraan" type="number" class="form-control" name="jmlKendaraan" value="{{$dataE->jmlKendaraan}}" readonly>
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
    $("#Mobilpenumpang").keyup(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Mobilbarang").keyup(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Mobilkhusus").keyup(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Keretagandeng").keyup(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Keretatempelan").keyup(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Mobilpenumpang").change(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Mobilbarang").change(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Mobilkhusus").change(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Keretagandeng").change(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
    $("#Keretatempelan").change(function() {
      $("#jmlKendaraan").val(Number($("#Mobilpenumpang").val())+Number($("#Mobilbarang").val())+Number($("#Mobilkhusus").val())+Number($("#Keretagandeng").val())+Number($("#Keretatempelan").val()));
    });
  });
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
