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
          <th>Kecamatan</th>
          <th>Jumlah UMKM</th>
          <th>Perdagangan</th>
          <th>Industri Pertanian</th>
          <th>Industri Non Pertanian</th>
          <th>Aneka Jasa</th>
        </tr>
      </thead>
        @foreach ($data->umkmDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlUMKM }}</td>
            <td>{{ $item->jmlPerdagangan }}</td>
            <td>{{ $item->jmlIndustriPertanian }}</td>
            <td>{{ $item->jmlIndustriNonPertanian }}</td>
            <td>{{ $item->jmlAnekaJasa }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>