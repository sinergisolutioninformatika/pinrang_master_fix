@extends('layouts.app')
@section('title','Data Jumlah Penduduk dan Wajib KTP') 

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
        <li class="breadcrumb-item"><a href="/diknas/kondisiSD">Kependudukan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jumlah Penduduk dan Wajib KTP</li>
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
      <b>Data Jumlah Penduduk dan Wajib KTP</b>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">Jumlah Penduduk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">Wajib KTP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu2">Rekapitulasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu3">Keterangan</a>
        </li>
      </ul>
      <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
          <canvas id="penduduk1" width="800px" height="400px"></canvas>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <canvas id="penduduk2" width="800px" height="400px"></canvas>
        </div>
        <div id="menu2" class="container tab-pane fade">
          <br>
          <b>Jumlah Penduduk dan Wajib KTP</b>
          <table class="table table-striped" id="kepalaX">
            <thead>
              <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Bulan</th>
                <th colspan="3">Jumlah Penduduk</th>
                <th colspan="3">Wajib KTP</th>
                <th rowspan="2">Cetak <br>KTP-El</th>
                <th rowspan="2">Proses</th>
              </tr>
              <tr>
                <th><img src="/pics/sigma.png" alt="Jumlah"></th>
                <th><img src="/pics/male-sign.png" alt="Laki-laki"></th>
                <th><img src="/pics/female-sign.png" alt="Perempuan"></th>
                <th><img src="/pics/sigma.png" alt="Jumlah"></th>
                <th><img src="/pics/male-sign.png" alt="Laki-laki"></th>
                <th><img src="/pics/female-sign.png" alt="Perempuan"></th>
              </tr>
            </thead>
            <?php
              $nomor = 1;
              foreach ($dataMaster as $dataM) {
                  ?>
              <form action="/kependudukan/penduduk/destroy/{{$dataM->id}}" id="form{{$dataM->id}}" method="post">
                <tr>
                  <input type="hidden" name="pendudukMaster{{$dataM->id}}" value="">
                  <td>{{$nomor}}</td>
                  <?php
                    $namabulan =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                   ?>
                  <td>{{$namabulan[$dataM->bln]}}</td>
                  <td>{{$dataM->totalPenduduk}}</td>
                  <td>{{$dataM->totalPendLaki}}</td>
                  <td>{{$dataM->totalPendPerempuan}}</td>
                  <td>{{$dataM->totalWKTP}}</td>
                  <td>{{$dataM->totalWKTPLaki}}</td>
                  <td>{{$dataM->totalWKTPPerempuan}}</td>
                  <td>{{$dataM->totalCetak}}</td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="showUser({{$dataM->bln}})">
                      <img src="/pics/view.png" alt="">
                    </a>
                    <a href="/kependudukan/penduduk/edit/{{$dataM->id}}"><img src="/pics/edit.png" alt=""></a>
                    <a href="#" onclick="return confirm_delete('Are you sure?','form{{$dataM->id}}')">
                      <img src="/pics/delete.png" alt="">
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
        <!-- tab end -->
      </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Input Data Baru
      </button>
    </div>
  </div>
  <br>

<div class="collapse" id="collapseExample">
  <div class="card">
    <div class="card-header">
      <b>Input data rekap baru</b>
    </div>
    <div class="card-body">
      <form class="form-group" id="formrekap" action="/kependudukan/penduduk/store" method="post">
        <div class="row">
            <label for="bln" class="col-sm-2 col-form-label text-md-right">Bulan</label>
            <div class="col-md-8">
              <select class="form-control" id="bln" style="max-width:200px" name="bln">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select><br>
            </div>
        </div>
        <table class="table table-striped table-hover" id="kepala">
          <thead>
            <tr>
              <th rowspan="2"  style="vertical-align: middle;">No.</th>
              <th rowspan="2"  style="vertical-align: middle;">Kecamatan</th>
              <th colspan="3">Jumlah Penduduk</th>
              <th colspan="3">Wajib KTP</th>
              <th rowspan="2"  style="vertical-align: middle;">Cetak <br> KTP-El</th>
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
            foreach ($dataKecamatan as $dataK) {
                ?>
              <tr>
                <td>{{$nomor}}</td>
                <td nowrap>{{$dataK->nmaKecamatan}}</td>
                <td>
                  <input type="number" id="jmlPenduduk{{$nomor}}" class="form-control" name="jmlPenduduk{{$nomor}}" value="0" readonly>
                </td>
                <td>
                  <input type="number" id="jmlPendLaki{{$nomor}}" class="form-control" name="jmlPendLaki{{$nomor}}" value="0">
                </td>
                <td>
                  <input type="number" id="jmlPendPerempuan{{$nomor}}" class="form-control" name="jmlPendPerempuan{{$nomor}}" value="0">
                </td>
                <td>
                  <input type="number" id="jmlWKTP{{$nomor}}" class="form-control" name="jmlWKTP{{$nomor}}" value="0" readonly>
                </td>
                <td>
                  <input type="number" id="jmlWKTPLaki{{$nomor}}" class="form-control" name="jmlWKTPLaki{{$nomor}}" value="0">
                </td>
                <td>
                  <input type="number" id="jmlWKTPPerempuan{{$nomor}}" class="form-control" name="jmlWKTPPerempuan{{$nomor}}" value="0">
                </td>
                <td>
                  <input type="number" id="jmlCetak{{$nomor}}" class="form-control" name="jmlCetak{{$nomor}}" value="0">
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
               <input type="number" id="totalPenduduk" class="form-control" name="totalPenduduk" value="0" readonly>
             </td>
             <td>
               <input type="number" id="totalPendLaki" class="form-control" name="totalPendLaki" value="0" readonly>
             </td>
             <td>
               <input type="number" id="totalPendPerempuan" class="form-control" name="totalPendPerempuan" value="0" readonly>
             </td>
             <td>
               <input type="number" id="totalWKTP" class="form-control" name="totalWKTP" value="0" readonly>
             </td>
             <td>
               <input type="number" id="totalWKTPLaki" class="form-control" name="totalWKTPLaki" value="0" readonly>
             </td>
             <td>
               <input type="number" id="totalWKTPPerempuan" class="form-control" name="totalWKTPPerempuan" value="0" readonly>
             </td>
             <td>
               <input type="number" id="totalCetak" class="form-control" name="totalCetak" value="0" readonly>
             </td>
           </tr>
           {{csrf_field()}}
        </table>
        <button type="submit" name="simpan" id="simpan" class="btn btn-info" value="Simpan">Submit</button>
        <button type="reset" class="btn btn-warning">Reset</button>
      </form>
    </div>
  </div>
</div>
</div>
<script>

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
        xmlhttp.open("GET","{{ url('kependudukan/penduduk/detail') }}"+'/'+str,true);
        xmlhttp.send();
    }
}
</script>

<script>

 $(document).ready(function() {

   <?php
     $nopu = 1;
     foreach ($dataKecamatan as $pus) {
       ?>
       $("#jmlPendLaki{{$nopu}}").keyup(function() {
         jSD = Number($("#jmlPendLaki{{$nopu}}").val()) + Number($("#jmlPendPerempuan{{$nopu}}").val());
         $("#jmlPenduduk{{$nopu}}").val(jSD);
         ksd = 0;
         <?php
           $nojk = 1;
           foreach ($dataKecamatan as $pk){ ?>
             ksd = ksd + Number($("#jmlPendLaki{{$nojk}}").val());
         <?php
           $nojk ++;
         } ?>
           $("#totalPendLaki").val(ksd);
           Admin = 0;
           <?php
             $nojk = 1;
             foreach ($dataKecamatan as $pk){ ?>
               Admin = Admin + Number($("#jmlPenduduk{{$nojk}}").val());
           <?php
             $nojk ++;
             } ?>
             $("#totalPenduduk").val(Admin);
         });

         $("#jmlPendPerempuan{{$nopu}}").keyup(function() {
           jSD = Number($("#jmlPendLaki{{$nopu}}").val()) + Number($("#jmlPendPerempuan{{$nopu}}").val());
           $("#jmlPenduduk{{$nopu}}").val(jSD);
           ksd = 0;
           <?php
             $nojk = 1;
             foreach ($dataKecamatan as $pk){ ?>
               ksd = ksd + Number($("#jmlPendPerempuan{{$nojk}}").val());
           <?php
             $nojk ++;
           } ?>
             $("#totalPendPerempuan").val(ksd);
             Admin = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 Admin = Admin + Number($("#jmlPenduduk{{$nojk}}").val());
             <?php
               $nojk ++;
               } ?>
               $("#totalPenduduk").val(Admin);
           });

           $("#jmlWKTPLaki{{$nopu}}").keyup(function() {
             jSD = Number($("#jmlWKTPLaki{{$nopu}}").val()) + Number($("#jmlWKTPPerempuan{{$nopu}}").val());
             $("#jmlWKTP{{$nopu}}").val(jSD);
             ksd = 0;
             <?php
               $nojk = 1;
               foreach ($dataKecamatan as $pk){ ?>
                 ksd = ksd + Number($("#jmlWKTPLaki{{$nojk}}").val());
             <?php
               $nojk ++;
             } ?>
               $("#totalWKTPLaki").val(ksd);
               Admin = 0;
               <?php
                 $nojk = 1;
                 foreach ($dataKecamatan as $pk){ ?>
                   Admin = Admin + Number($("#jmlWKTP{{$nojk}}").val());
               <?php
                 $nojk ++;
                 } ?>
                 $("#totalWKTP").val(Admin);
             });

             $("#jmlWKTPPerempuan{{$nopu}}").keyup(function() {
               jSD = Number($("#jmlWKTPLaki{{$nopu}}").val()) + Number($("#jmlWKTPPerempuan{{$nopu}}").val());
               $("#jmlWKTP{{$nopu}}").val(jSD);
               ksd = 0;
               <?php
                 $nojk = 1;
                 foreach ($dataKecamatan as $pk){ ?>
                   ksd = ksd + Number($("#jmlWKTPPerempuan{{$nojk}}").val());
               <?php
                 $nojk ++;
               } ?>
                 $("#totalWKTPPerempuan").val(ksd);
                 Admin = 0;
                 <?php
                   $nojk = 1;
                   foreach ($dataKecamatan as $pk){ ?>
                     Admin = Admin + Number($("#jmlWKTP{{$nojk}}").val());
                 <?php
                   $nojk ++;
                   } ?>
                   $("#totalWKTP").val(Admin);
               });

               $("#jmlCetak{{$nopu}}").keyup(function() {
                 ksd = 0;
                 <?php
                   $nojk = 1;
                   foreach ($dataKecamatan as $pk){ ?>
                     ksd = ksd + Number($("#jmlCetak{{$nojk}}").val());
                 <?php
                   $nojk ++;
                 } ?>
                   $("#totalCetak").val(ksd);
                 });
                 $("#jmlPendLaki{{$nopu}}").change(function() {
                   jSD = Number($("#jmlPendLaki{{$nopu}}").val()) + Number($("#jmlPendPerempuan{{$nopu}}").val());
                   $("#jmlPenduduk{{$nopu}}").val(jSD);
                   ksd = 0;
                   <?php
                     $nojk = 1;
                     foreach ($dataKecamatan as $pk){ ?>
                       ksd = ksd + Number($("#jmlPendLaki{{$nojk}}").val());
                   <?php
                     $nojk ++;
                   } ?>
                     $("#totalPendLaki").val(ksd);
                     Admin = 0;
                     <?php
                       $nojk = 1;
                       foreach ($dataKecamatan as $pk){ ?>
                         Admin = Admin + Number($("#jmlPenduduk{{$nojk}}").val());
                     <?php
                       $nojk ++;
                       } ?>
                       $("#totalPenduduk").val(Admin);
                   });

                   $("#jmlPendPerempuan{{$nopu}}").change(function() {
                     jSD = Number($("#jmlPendLaki{{$nopu}}").val()) + Number($("#jmlPendPerempuan{{$nopu}}").val());
                     $("#jmlPenduduk{{$nopu}}").val(jSD);
                     ksd = 0;
                     <?php
                       $nojk = 1;
                       foreach ($dataKecamatan as $pk){ ?>
                         ksd = ksd + Number($("#jmlPendPerempuan{{$nojk}}").val());
                     <?php
                       $nojk ++;
                     } ?>
                       $("#totalPendPerempuan").val(ksd);
                       Admin = 0;
                       <?php
                         $nojk = 1;
                         foreach ($dataKecamatan as $pk){ ?>
                           Admin = Admin + Number($("#jmlPenduduk{{$nojk}}").val());
                       <?php
                         $nojk ++;
                         } ?>
                         $("#totalPenduduk").val(Admin);
                     });

                     $("#jmlWKTPLaki{{$nopu}}").change(function() {
                       jSD = Number($("#jmlWKTPLaki{{$nopu}}").val()) + Number($("#jmlWKTPPerempuan{{$nopu}}").val());
                       $("#jmlWKTP{{$nopu}}").val(jSD);
                       ksd = 0;
                       <?php
                         $nojk = 1;
                         foreach ($dataKecamatan as $pk){ ?>
                           ksd = ksd + Number($("#jmlWKTPLaki{{$nojk}}").val());
                       <?php
                         $nojk ++;
                       } ?>
                         $("#totalWKTPLaki").val(ksd);
                         Admin = 0;
                         <?php
                           $nojk = 1;
                           foreach ($dataKecamatan as $pk){ ?>
                             Admin = Admin + Number($("#jmlWKTP{{$nojk}}").val());
                         <?php
                           $nojk ++;
                           } ?>
                           $("#totalWKTP").val(Admin);
                       });

                       $("#jmlWKTPPerempuan{{$nopu}}").change(function() {
                         jSD = Number($("#jmlWKTPLaki{{$nopu}}").val()) + Number($("#jmlWKTPPerempuan{{$nopu}}").val());
                         $("#jmlWKTP{{$nopu}}").val(jSD);
                         ksd = 0;
                         <?php
                           $nojk = 1;
                           foreach ($dataKecamatan as $pk){ ?>
                             ksd = ksd + Number($("#jmlWKTPPerempuan{{$nojk}}").val());
                         <?php
                           $nojk ++;
                         } ?>
                           $("#totalWKTPPerempuan").val(ksd);
                           Admin = 0;
                           <?php
                             $nojk = 1;
                             foreach ($dataKecamatan as $pk){ ?>
                               Admin = Admin + Number($("#jmlWKTP{{$nojk}}").val());
                           <?php
                             $nojk ++;
                             } ?>
                             $("#totalWKTP").val(Admin);
                         });

                         $("#jmlCetak{{$nopu}}").change(function() {
                           ksd = 0;
                           <?php
                             $nojk = 1;
                             foreach ($dataKecamatan as $pk){ ?>
                               ksd = ksd + Number($("#jmlCetak{{$nojk}}").val());
                           <?php
                             $nojk ++;
                           } ?>
                             $("#totalCetak").val(ksd);
                           });
         <?php
           $nopu ++;
       }
        ?>
    });
 </script>

 <script>
 var ctx = document.getElementById("penduduk1");
  var myLineChart = new Chart(ctx, {
   type: 'line',
   data: {
     datasets: [{
       borderWidth: 3,
       label: ['Jumlah Penduduk'],
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
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalPend. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>
     },
     {
       borderWidth: 3,
       label: ['Laki-laki'],
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
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalPendLaki. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>
     },
     {
       borderWidth: 3,
       label: ['Perempuan'],
       borderColor: ['rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)'],
       backgroundColor:['rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)'],
       pointBackgroundColor:['rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)'],
       pointHoverBorderColor: ['rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)'],
       pointBorderWidth:2,
       fill:false,
       data:
            <?php
              $kata = '[';
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalPendPerempuan. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>


     }],
     labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
             },
   options:{
     title: {
            display: true,
            position: 'top',
            fontsize: 14,
            text: 'Grafik Jumlah Penduduk'
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

 <script>
 var ctx = document.getElementById("penduduk2");
  var myLineChart = new Chart(ctx, {
   type: 'line',
   data: {
     datasets: [{
       borderWidth: 3,
       label: ['Jumlah Wajib KTP'],
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
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalWKTP. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>
     },
     {
       borderWidth: 3,
       label: ['Laki-laki'],
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
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalWKTPLaki. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>
     },
     {
       borderWidth: 3,
       label: ['Perempuan'],
       borderColor: ['rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)',
                      'rgba(242, 221, 112, 0.5)'],
       backgroundColor:['rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)',
                        'rgba(242, 221, 112, 0.5)'],
       pointBackgroundColor:['rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)',
                             'rgba(242, 221, 112, 0.5)'],
       pointHoverBorderColor: ['rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)',
                              'rgba(242, 221, 112, 0.7)'],
       pointBorderWidth:2,
       fill:false,
       data:
            <?php
              $kata = '[';
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalWKTPPerempuan. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>
     },
     {
       borderWidth: 3,
       label: ['Cetak KTP-El'],
       borderColor: ['rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)',
                      'rgba(204, 51, 0, 0.5)'],
       backgroundColor:['rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)',
                        'rgba(204, 51, 0, 0.5)'],
       pointBackgroundColor:['rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)',
                             'rgba(204, 51, 0, 0.5)'],
       pointHoverBorderColor: ['rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)',
                              'rgba(204, 51, 0, 0.7)'],
       pointBorderWidth:2,
       fill:false,
       data:
            <?php
              $kata = '[';
              foreach ($dataMaster as $jkg) {
                  $kata = $kata . $jkg->totalCetak. ',';
              }
              $kata = $kata . "]";
              $kata = str_replace(",]", "]", $kata);
              echo $kata;
             ?>
     }],
     labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
             },
   options:{
     title: {
            display: true,
            position: 'top',
            fontsize: 14,
            text: 'Grafik Wajib KTP'
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
