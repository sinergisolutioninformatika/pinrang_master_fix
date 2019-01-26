@extends('layouts.app')
@section('title','Data Kondisi Bangunan Sekolah SD Sederajat')

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
        <li class="breadcrumb-item"><a href="/diknas/">Pendidikan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kondisi Bangunan Sekolah SD Sederajat</li>
      </ol>
    </nav>
</div>
@endsection

@section('menu')
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <b>Data Kondisi Bangunan Sekolah SD Sederajat</b>
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
            <a class="nav-link" data-toggle="tab" id="menu2_" href="#menu2">Keterangan</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
            <div id="map"></div>
              <canvas id="kondisiSD" width="800px" height="400px"></canvas>
          </div>
          <div id="menu2" class="container tab-pane ">
            <button type="button" id="showMap">
              click
            </button>
            <div id="map" style="height: 100%"></div>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
              <caption style="caption-side:top;">Kondisi Bangunan Sekolah SD Sederajat</caption>
              <tr>
                <thead>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Jumlah SD/Sederajat</th>
                  <th>Kondisi Baik</th>
                  <th>Rusak Ringan</th>
                  <th>Rusak Berat</th>
                  <th>Proses</th>
                </thead>
              </tr>
              <?php
                $nomor = 1;
                foreach ($dataA as $ksd) {
                    ?>
                <form action="/pendidikan/kondisiSD/destroy/{{$ksd->id}}" id="form{{$ksd->id}}" method="post">
                  <tr>
                    <input type="hidden" name="kondisiSDMaster{{$ksd->id}}" value="">
                    <td>{{$nomor}}</td>
                    <td>{{$ksd->ta}}</td>
                    <td style="text-align: center">{{$ksd->totalSD}}</td>
                    <td style="text-align: center">{{$ksd->totalKondisiBaik}}</td>
                    <td style="text-align: center">{{$ksd->totalRusakRingan}}</td>
                    <td style="text-align: center">{{$ksd->totalRusakBerat}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#myModal" data-backdrop="static" onclick="showUser({{$ksd->ta}})">
                        <img src="/image/view.png" alt="">
                      </a>
                      <a href="/pendidikan/kondisiSD/edit/{{$ksd->id}}"><img src="/image/edit.png" alt=""></a>
                      <a href="#" onclick="return confirm_delete('Are you sure?','form{{$ksd->id}}')">
                        <img src="/image/delete.png" alt="">
                      </a>
                    </td>
                  </tr>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
          <form class="form-group" action="kondisiSD/store" method="post">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah SD</th>
                    <th>Kondisi Baik</th>
                    <th>Rusak Ringan</th>
                    <th>Rusak Berat</th>
                  </tr>
              </thead>
                <?php
                  $nomor = 1;
                  foreach ($kecamatan as $xksd) {
                      ?>
                    <tr>
                      <td>{{$nomor}}</td>
                      <td nowrap>{{$xksd->nmaKecamatan}}</td>
                      <td>
                        <input type="number" id="jmlSD{{$nomor}}" class="form-control" name="jmlSD{{$nomor}}" value="0" readonly>
                      </td>
                      <td>
                        <input type="number" id="jmlKondisiBaik{{$nomor}}" class="form-control" name="jmlKondisiBaik{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlRusakRingan{{$nomor}}" class="form-control" name="jmlRusakRingan{{$nomor}}" value="0">
                      </td>
                      <td>
                        <input type="number" id="jmlRusakBerat{{$nomor}}" class="form-control" name="jmlRusakBerat{{$nomor}}" value="0">
                      </td>
                    </tr>
                <?php
                  $nomor ++;
                  }
                 ?>
                 <tr>
                   <td></td>
                   <td><b>Total</b></td>
                   <td>
                     <input type="number" id="totalSD" class="form-control" name="totalSD" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalKondisiBaik" class="form-control" name="totalKondisiBaik" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalRusakRingan" class="form-control" name="totalRusakRingan" value="0" readonly>
                   </td>
                   <td>
                     <input type="number" id="totalRusakBerat" class="form-control" name="totalRusakBerat" value="0" readonly>
                   </td>
                 </tr>
                 {{csrf_field()}}
              </table>
              <hr>
              <button type="submit" name="simpan" id="simpan" class="btn btn-info" value="Simpan">Submit</button>
              <button type="reset" class="btn btn-warning">Reset</button>
        </div>
        </form>
      </div>
    </div>

  </div>
  <div id="cc" style="display: none;">
    <h3 id="judul"></h3>
   <!--   -->
     <!--  
      < -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#ket">Keterangan Bangunan</a>
        </li>
      </ul>
      <div class="tab-content">

        <div id="ket" class="container tab-pane active">
          
          <form id="form_">
     
      {{csrf_field()}}
      <input type="hidden" name="kec" >
      <input type="hidden" name="thn" >
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4" class="col-form-label">Nama Sekolah</label>
             <input type="text" name="nama" class="form-control"  placeholder="Nama Sekolah">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Lokasi Sekolah</label>
            <input type="text" name="lokasi" class="form-control" id="inputPassword4" placeholder="Lokasi Sekolah">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label class="col-form-label">Deskripsi</label>
          <textarea class="form-control" name="deskrib"></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-row">
          <button type="button" class="btn btn-primary save">Sisipkan Gambar</button>
        </div>
      </div>
      </form>
      <div id="pladeDrop" style="display: none;">
        <p id="ket"></p>
        <form id="_drop" class="dropzone" >
          {{csrf_field()}}
          <input type="hidden" name="access">
        </form>
        <p>
          <button type="button" class="btn btn-success">Kembali</button>
        </p>
      </div>
        </div>
      </div>
  </div>
</div>
<!-- <div id="map">
  
</div> -->


  <script type="text/javascript">

  function confirm_delete(question, ada) {
    if(confirm(question)){
       document.getElementById(ada).submit();
    }else{
      return false;
    }
  }

  function showUser(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","{{url('pendidikan/kondisiSD/detail/')}}"+'/'+str,true);
          xmlhttp.send();
      }
  }
  </script>

<script>
  function iniDrop() {
    $('#form_').hide();
    $('#pladeDrop').show();
    $('#pladeDrop #ket').text($('input[name=nama]').val());
    $('#pladeDrop .dropzone').each(function() {
        let dropzoneControl = $(this)[0].dropzone;
        if (dropzoneControl) {
          dropzoneControl.destroy()
        }
        else{
          $('#pladeDrop #_drop').dropzone({url : "{{url('pendidikan/kondisiSD/dataImage')}}" });
        }    
    })
  }
  $(document).on('click','.addschool',function() {
    $('#judul').text('Kecamatan : '+$(this).data('namekec').toString())
    $('input[name=kec]').val($(this).data('kec'));
    $('.modal-body').html($('#cc').html());
  })
  $(document).on('click','.location',function () {
   
  })
  $(document).on('click','.save',function() {
    $.ajax({
      url : "{{url('pendidikan/kondisiSD/dataDetail')}}",
      type : 'POST',
      data : $('#form_').serialize() ,
      datatype : 'JSON',
      success : function(data) {
        var a = JSON.parse(data);
        if (a.respon.execute) {
          $('input[name=access]').val(a.respon.access);
          iniDrop();
        }
        else{
          alert(a.respon.message);
        }

      },
      error : function(data) {
        alert('err');
      }
    })

  })
$(document).ready(function() {
  var map;
  $('#showMap').click(function () {    
   map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
   
  })
  // $('div#mydropzone').dropzone({ url: "/file/post" });
  // // var myDropzone = new Dropzone(".Dropzone", { url: "/file/post"});
  <?php
    $nopu = 1;
    foreach ($kecamatan as $pus) {
   ?>
    $("#jmlKondisiBaik{{$nopu}}").keyup(function() {
      ksd = 0;
      <?php
        $nojk = 1;
        foreach ($kecamatan as $pk){ ?>
          ksd = ksd + Number($("#jmlKondisiBaik{{$nojk}}").val());
      <?php
        $nojk ++;
      } ?>
        $("#totalKondisiBaik").val(ksd);
        jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
        $("#jmlSD{{$nopu}}").val(jumlahSD);
        thetotalSD = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
        <?php
          $nojk ++;
          } ?>
          $("#totalSD").val(thetotalSD);
      });

      $("#jmlRusakRingan{{$nopu}}").keyup(function() {
        ksd = 0;
        <?php
          $nojk = 1;
          foreach ($kecamatan as $pk){ ?>
            ksd = ksd + Number($("#jmlRusakRingan{{$nojk}}").val());
        <?php
          $nojk ++;
        } ?>
          $("#totalRusakRingan").val(ksd);
          jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
          $("#jmlSD{{$nopu}}").val(jumlahSD);
          thetotalSD = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
          <?php
            $nojk ++;
            } ?>
            $("#totalSD").val(thetotalSD);
        });

        $("#jmlRusakBerat{{$nopu}}").keyup(function() {
          ksd = 0;
          <?php
            $nojk = 1;
            foreach ($kecamatan as $pk){ ?>
              ksd = ksd + Number($("#jmlRusakBerat{{$nojk}}").val());
          <?php
            $nojk ++;
          } ?>
            $("#totalRusakBerat").val(ksd);
            jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
            $("#jmlSD{{$nopu}}").val(jumlahSD);
            thetotalSD = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
            <?php
              $nojk ++;
              } ?>
              $("#totalSD").val(thetotalSD);
          });

          $("#jmlKondisiBaik{{$nopu}}").change(function() {
            ksd = 0;
            <?php
              $nojk = 1;
              foreach ($kecamatan as $pk){ ?>
                ksd = ksd + Number($("#jmlKondisiBaik{{$nojk}}").val());
            <?php
              $nojk ++;
            } ?>
              $("#totalKondisiBaik").val(ksd);
              jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
              $("#jmlSD{{$nopu}}").val(jumlahSD);
              thetotalSD = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
              <?php
                $nojk ++;
                } ?>
                $("#totalSD").val(thetotalSD);
            });

            $("#jmlRusakRingan{{$nopu}}").change(function() {
              ksd = 0;
              <?php
                $nojk = 1;
                foreach ($kecamatan as $pk){ ?>
                  ksd = ksd + Number($("#jmlRusakRingan{{$nojk}}").val());
              <?php
                $nojk ++;
              } ?>
                $("#totalRusakRingan").val(ksd);
                jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
                $("#jmlSD{{$nopu}}").val(jumlahSD);
                thetotalSD = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
                <?php
                  $nojk ++;
                  } ?>
                  $("#totalSD").val(thetotalSD);
              });

              $("#jmlRusakBerat{{$nopu}}").change(function() {
                ksd = 0;
                <?php
                  $nojk = 1;
                  foreach ($kecamatan as $pk){ ?>
                    ksd = ksd + Number($("#jmlRusakBerat{{$nojk}}").val());
                <?php
                  $nojk ++;
                } ?>
                  $("#totalRusakBerat").val(ksd);
                  jumlahSD=Number($("#jmlKondisiBaik{{$nopu}}").val()) + Number($("#jmlRusakRingan{{$nopu}}").val()) + Number($("#jmlRusakBerat{{$nopu}}").val());
                  $("#jmlSD{{$nopu}}").val(jumlahSD);
                  thetotalSD = 0;
                  <?php
                    $nojk = 1;
                    foreach ($kecamatan as $pk){ ?>
                      thetotalSD = thetotalSD + Number($("#jmlSD{{$nojk}}").val());
                  <?php
                    $nojk ++;
                    } ?>
                    $("#totalSD").val(thetotalSD);
                });
      <?php
        $nopu ++;
      }
       ?>
   });
</script>
<script>
  var ctx = document.getElementById("kondisiSD");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        borderWidth: 1,
        label: ['Jumlah SD'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalSD. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Kondisi Baik'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalKondisiBaik. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Rusak Ringan'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalRusakRingan. ',';
               }
               $kata = $kata . "]";
               $kata = str_replace(",]", "]", $kata);
               echo $kata;
              ?>
      },
      {
        borderWidth: 1,
        label: ['Rusak Berat'],
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
               foreach ($dataC as $jkg) {
                   $kata = $kata . $jkg->totalRusakBerat. ',';
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
        foreach ($dataC as $jkg) {
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
                       text: 'Grafik Kondisi Bangunan Sekolah SD Sederajat'
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
