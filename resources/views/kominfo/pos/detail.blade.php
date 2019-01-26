<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : {{$ta}} </h4>
      <button type='button' class='btn btn-outline-success btn-sm m-btn m-btn--custom' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Kecamatan</th>
          <th>Jumlah Kantor Pos</th>
          <th>Jumlah Kantor Pos Pembantu</th>
          <th>Jumlah Desa Terlayani Pos Keliling</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data->posDetail as $key)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$key->kecamatan->nmaKecamatan}}</td>
              <td>{{$key->jmlPos}}</td>
              <td>{{$key->jmlPospembantu}}</td>
              <td>{{$key->jmlDesaterlayani}}</td>
              </tr>
          @endforeach
      </tbody>

    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>