<div class='modal-content'>
    <div class='modal-header'>

    <h4 class='modal-title'>Data : {{ $ta }} </h4>
      <button type='button'  class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Jenis Koperasi</th>
          <th>Jumlah Koperasi</th>
          <th>Aktif</th>
          <th>Tidak Aktif</th>
        </tr>
      </thead>
        @foreach ($data->koperasiDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->koperasi->nmaKoperasi }}</td>
            <td>{{ $item->jmlKoperasi }}</td>
            <td>{{ $item->jmlAktif }}</td>
            <td>{{ $item->jmlTidakaktif }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>