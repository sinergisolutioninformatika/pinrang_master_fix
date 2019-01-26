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
          <th>Lokasi Perpustakaan</th>
          <th>Jumlah Kunjungan</th>
          <th>Jumlah Laki-laki</th>
          <th>Jumlah Perempuan</th>
        </tr>
      </thead>

      @foreach ($data->kunjunganDetail as $item)
          <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $item->lokasiperpustakaan->nmaLokasi }}</td>
          <td>{{ $item->jmlKunjungan }}</td>
          <td>{{ $item->jmlLaki }}</td>
          <td>{{ $item->jmlPerempuan }}</td>
          </tr>
      @endforeach

    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>