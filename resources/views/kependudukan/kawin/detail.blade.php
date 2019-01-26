<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data  </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
        <thead>
          <tr>
            <th>No.</th>
            <th>Kecamatan</th>
            <th>Jumlah Perkawinan</th>
            <th>Jumlah Perceraian</th>
          </tr>
        </thead>
            @foreach ($data->kawinDetail as $item)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->kecamatan->nmaKecamatan }}</td>
                <td>{{ $item->jmlKawin }}</td>
                <td>{{ $item->jmlCerai }}</td>
                </tr>
            @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>