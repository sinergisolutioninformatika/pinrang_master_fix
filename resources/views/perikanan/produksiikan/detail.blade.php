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
          <th>Jumlah Produksi</th>
          <th>Perikanan Laut</th>
          <th>Perikanan Rawa</th>
          <th>Petani Sungai</th>
          <th>Petani Waduk</th>
        </tr>
      </thead>

@foreach ($data->produksiikanDetail as $item)
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $item->kecamatan->nmaKecamatan }}</td>
    <td>{{ $item->jmlProduksi }}</td>
    <td>{{ $item->jmlLaut }}</td>
    <td>{{ $item->jmlRawa }}</td>
    <td>{{ $item->jmlSungai }}</td>
    <td>{{ $item->jmlWaduk }}</td>
</tr>
@endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>