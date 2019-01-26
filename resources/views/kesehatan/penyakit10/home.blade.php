@extends('layouts.app')
@section('title','Data 10 Penyakit Terbesar Faskes Tingkat I')


@section('modals')
<script>
  function showPuskesmas(str) {
    if (str=="") {
      document.getElementById("puske").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("puske").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","/modals/getPuskesmas.php?q="+str,true);
    xmlhttp.send();
  }
</script>
<script>
  $(document).ready(function() {
    $('.btn-group > .btn').removeClass('active')    // Remove any existing active classes
    $('.btn-group > .btn').eq(0).addClass('active') // Add the class to the nth element
  });
</script>
  <!-- Modal -->
<div class="container">
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
        <li class="breadcrumb-item"><a href="/diknas/kondisiSD">Kesehatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data 10 Penyakit Terbesar Faskes Tingkat I</li>
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
      <p><b>Data 10 Penyakit Terbesar Faskes Tingkat I</b></p>
      <div class="btn-group btn-group-sm"  onclick="alert($('.btn-group > .btn.active').text());">
        <button type="button" class="btn btn-success">Januari</button>
        <button type="button" class="btn btn-success" >Februari</button>
        <button type="button" class="btn btn-success" >Maret</button>
        <button type="button" class="btn btn-success" >April</button>
        <button type="button" class="btn btn-success" >Mei</button>
        <button type="button" class="btn btn-danger" >Juni</button>
        <button type="button" class="btn btn-success" >Juli</button>
        <button type="button" class="btn btn-success" >Agustus</button>
        <button type="button" class="btn btn-success" >September</button>
        <button type="button" class="btn btn-success" >Oktober</button>
        <button type="button" class="btn btn-success" >November</button>
        <button type="button" class="btn btn-success" >Desember</button>
      </div>
    </div>
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home">10 Penyakit Terbesar Faskes Tingkat I</a>
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
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Penyakit</th>
                <th>Jumlah Kasus</th>
                <th>Rawat Jalan</th>
                <th>Rawat Inap</th>
                <th>Posisi Bulan Lalu</th>
              </tr>
            </thead>
            <?php
              $nomor = 1;
              foreach ($dataMaster as $dataM) {
            ?>
            <tr>
              <td>{{$nomor}}</td>
              <td>{{$dataM->nmaPenyakit}}</td>
              <td>{{$dataM->jmlKasus}}</td>
              <td>{{$dataM->jmlRawatJalan}}</td>
              <td>{{$dataM->jmlRawatInap}}</td>
              <td></td>
            </tr>
            <?php
              $nomor ++;
              }
             ?>
          </table>
      </div>
        <div id="menu1" class="container tab-pane fade"><br>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
        </div>
      </div>
    </div>
  </div>
  <br>
<form class="form-group" action="/kesehatan/penyakit10/store" method="post">
  <div class="card">
    <div class="card-header">
      <div class="row">
          <label for="bln" class="col-sm-1 col-form-label text-md-right">Bulan</label>
          <div class="col-md-9">
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
            </select>
          </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Puskesmas</th>
            <th>Status</th>
            <th>Proses</th>
          </tr>
        </thead>
        <?php
          $nomor = 1;
          foreach ($dataPuskesmas as $dataP) {
        ?>
        <tr>
          <td style="text-align:center; width: 5px;">{{$nomor}}</td>
          <td style="width: 300px;">{{$dataP->nmaPuskesmas}}</td>
          <td style="width: 100px;">Kosong</td>
          <td>
            <button style="width:100px;" type="button" value="{{$dataP->id}}" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#InputPenyakit" aria-expanded="false" aria-controls="InputPenyakit" onclick="showPuskesmas(this.value)">Input</button>&ensp;
            <button style="width:100px;" class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#InputPenyakit" aria-expanded="false" aria-controls="InputPenyakit">Edit</button>&ensp;
            <button style="width:100px;" type="button" class="btn btn-danger btn-sm">Delete</button>&ensp;
            <button style="width:100px;" type="button" class="btn btn-info btn-sm">View</button>
          </td>
        </tr>
        <?php
          $nomor ++;
          }
         ?>
      </table>
    </div>
  </div>
  <br>
  <div class="collapse" id="InputPenyakit">
    <div class="card">
      <div class="card-header">
        <h5><div id="puske"></div> </h5>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Penyakit</th>
              <th>Jumlah Kasus</th>
              <th>Rawat Jalan</th>
              <th>Rawat Inap</th>
            </tr>
          </thead>
          <?php
            for ($i=1; $i <= 10 ; $i++) {
          ?>
          <tr>
            <td style="text-align:center; width: 5px;">
              {{$i}}
            </td>
            <td>
              <select class="form-control" id="penyakit_id{{$i}}" style="max-width:400px" name="penyakit_id{{$i}}">
                <option value="" disabled selected hidden>Pilih Penyakit</option>
                <?php
                  foreach ($dataPenyakit as $dataPy) {
                    echo "<option value='" . $dataPy->id . "'>". $dataPy->id . " " . $dataPy->nmaPenyakit . "</option>";
                  }
                ?>
              </select>
            </td>
            <td>
              <input type="number" id="jmlKasus{{$i}}" class="form-control" name="jmlKasus{{$i}}" value="0" readonly>
            </td>
            <td>
              <input type="number" id="jmlRawatJalan{{$i}}" class="form-control" name="jmlRawatJalan{{$i}}" value="0">
            </td>
            <td>
              <input type="number" id="jmlRawatInap{{$i}}" class="form-control" name="jmlRawatInap{{$i}}" value="0">
            </td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td></td>
            <td><b>Total</b></td>
            <td>
              <input type="number" id="totalKasus" class="form-control" name="totalKasus" value="0" readonly>
            </td>
            <td>
              <input type="number" id="totalRawatJalan" class="form-control" name="totalRawatJalan" value="0" readonly>
            </td>
            <td>
              <input type="number" id="totalRawatInap" class="form-control" name="totalRawatInap" value="0" readonly>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="card bg-light text-dark">
      <div class="car-footer" style="padding:10px">
        <button type="submit" name="simpan" id="simpan" class="btn btn-info" value="Simpan">Submit</button>
        <button type="reset" class="btn btn-warning">Reset</button>
      </div>
    </div>
      {{csrf_field()}}
  </form>
  </div>
</div>
<script>
 $(document).ready(function() {
  <?php
    for ($i=1; $i <= 10 ; $i++) {
  ?>
    $("#jmlRawatJalan{{$i}}").keyup(function() {
      var xd = 0;
      kasus = Number($("#jmlRawatJalan{{$i}}").val()) + Number($("#jmlRawatInap{{$i}}").val())
     $("#jmlKasus{{$i}}").val(kasus);
     <?php
       for ($x=1; $x <= 10 ; $x++) { ?>
         xd = xd + Number($("#jmlRawatJalan{{$x}}").val());
     <?php
      }
     ?>
     $("#totalRawatJalan").val(xd);
     tot=Number($("#totalRawatJalan").val()) + Number($("#totalRawatInap").val());
     $("#totalKasus").val(tot);
    });

    $("#jmlRawatInap{{$i}}").keyup(function() {
      var xd = 0;
      kasus = Number($("#jmlRawatJalan{{$i}}").val()) + Number($("#jmlRawatInap{{$i}}").val())
     $("#jmlKasus{{$i}}").val(kasus);
     <?php
       for ($x=1; $x <= 10 ; $x++) { ?>
         xd = xd + Number($("#jmlRawatInap{{$x}}").val());
     <?php
      }
     ?>
     $("#totalRawatInap").val(xd);
     tot=Number($("#totalRawatJalan").val()) + Number($("#totalRawatInap").val());
     $("#totalKasus").val(tot);
    });
    <?php
    }
    ?>
  });
</script>
@endsection
