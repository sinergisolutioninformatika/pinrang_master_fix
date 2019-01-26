@extends('layouts.app')

@section('menu')
<p>{{$auth->email}}<br>{{$skpd}}</p><hr>
<?php
  $conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
if ($kodeSKPD==null) { $kodeSKPD = 1;}
  $sql="SELECT
          walidata.nmaData,
          walidata.link_view
        FROM
          walidata, skpd
        WHERE
          skpd.id = walidata.skpd_id
          AND walidata.skpd_id = " . $kodeSKPD;
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    echo "<a href=". $row['link_view'] .">" . $row['nmaData'] . "</a>";
    echo "<p>";
  }
 ?>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <b>Walidata</b>
        </div>
        <div class="card-body">
          <div id="daftar_walidata">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>SKPD</th>
                  <th>Nama Data</th>
                  <th>Proses</th>
                </tr>
              </thead>
              <?php
                $nomor = 1;

                 foreach ($dataMaster as $dataM) {
               ?>
               <tr>
                 <td>{{$nomor}}</td>
                 <td>{{$dataM->nmaSKPD}}</td>
                 <td>{{$dataM->nmaData}}</td>
                 <td>
                   <a href="{{$dataM->link_view}}">
                     <img src="/pics/view.png" alt="lihat">
                    <a href="/walidata/edit/{{$dataM->id}}"><img src="/pics/edit.png" alt="edit"></a>
                 </td>
               </tr>
               <?php
                 $nomor++;
                 }
                ?>

            </table>
            {{$dataMaster->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <?php
    foreach ($dataEdit as $dataE) {
    }

  ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header">
              <b>Edit Data</b>
            </div>
            <div class="card-body">
              <form class="" action="/walidata/update/{{$kodeEdit}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group row">
                    <label for="skpd_id" class="col-md-3 col-form-label text-md-right">{{ __('SKPD') }}</label>
                    <div class="col-md-7">
                        <select class="form-control" id="skpd_id" name="skpd_id">
                        <option value="">Pilih SKPD</option>
                        <?php
                          $noskpd = 1;
                          foreach ($kantor as $instansi) {
                            if ($noskpd == $dataE->skpd_id) {
                              echo '<option value="' . $instansi->id . '" selected>' . $instansi->nmaSKPD . '</option>';
                            } else {
                              echo '<option value="' . $instansi->id . '">' . $instansi->nmaSKPD . '</option>';
                            }
                            $noskpd ++;
                          }
                         ?>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nmaData" class="col-sm-3 col-form-label text-md-right">Nama Data</label>
                    <div class="col-md-7">
                        <input id="nmaData" type="text" class="form-control" name="nmaData" value="{{$dataE->nmaData}}" >
                    </div>
                </div>
                <div class="form-group row">
                   <label for="kategori" class="col-sm-3 col-form-label text-md-right ">Kategori</label>
                   <div class="col-md-7">
                     <select class="form-control" id="kategori" name="kategori" required>
                       <?php
                         $nokat = 1;
                         foreach ($kategori as $kat) {
                           if ($nokat == $dataE->kategori_id) {
                             echo '<option value="' . $kat->id . '" selected>' . $kat->nmaKategori . '</option>';
                           } else {
                             echo '<option value="' . $kat->id . '">' . $kat->nmaKategori . '</option>';
                           }
                           $nokat ++;
                         }
                        ?>
                     </select>
                   </div>
               </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-3 col-form-label text-md-right">Deskripsi Data</label>
                    <div class="col-md-7">
                        <textarea class="form-control" rows="3" name="keterangan" id="keterangan">{{$dataE->keterangan}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="linkview" class="col-sm-3 col-form-label text-md-right">Link View</label>
                    <div class="col-md-7">
                        <input id="linkview" type="text" class="form-control" name="linkview" value="{{$dataE->link_view}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="linkadmin" class="col-sm-3 col-form-label text-md-right">Link Admin</label>
                    <div class="col-md-7">
                        <input id="linkadmin" type="text" class="form-control" name="linkadmin" value="{{$dataE->link_admin}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tag" class="col-sm-3 col-form-label text-md-right">Tag</label>
                    <div class="col-md-7">
                        <input id="tag" type="text" class="form-control" name="tag" value="{{$dataE->tag}}" >
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="tag" class="col-sm-3 col-form-label text-md-right"></label>
                    <div class="col-md-7">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                    {{csrf_field()}}
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
