<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : {{ $ta }} </h4>
      <button type='button' class='btn btn-outline-success btn-sm m-btn m-btn--custom' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Kecamatan</th>
          <th>Jumlah Desa Terlayani</th>
          <th>Jumlah Desa Belum Terlayani</th>
          <th>Jumlah BTS</th>
        </tr>
      </thead>
        @foreach ($data->telekomunikasiDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlDesaterlayani }}</td>
            <td>{{ $item->jmlDesabelumterlayani }}</td>
            <td>{{ $item->jmlBTS }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>