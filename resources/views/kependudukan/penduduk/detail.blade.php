<div class='modal-content'>
    <div class='modal-header'>
      <h4 class='modal-title'>Data :  </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th rowspan='2'>No.</th>
          <th rowspan='2'>Kecamatan</th>
          <th colspan='3'>Jumlah Penduduk</th>
          <th colspan='3'>Wajib KTP</th>
          <th rowspan='2'>Cetak <br>KTP-El</th>
        </tr>
        <tr>
          <th><img src='/pics/sigma.png' alt='Jumlah'></th>
          <th><img src='/pics/male-sign.png' alt='Laki-laki'></th>
          <th><img src='/pics/female-sign.png' alt='Perempuan'></th>
          <th><img src='/pics/sigma.png' alt='Jumlah'></th>
          <th><img src='/pics/male-sign.png' alt='Laki-laki'></th>
          <th><img src='/pics/female-sign.png' alt='Perempuan'></th>
        </tr>
      </thead>
        @foreach ($data->pendudukDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlPenduduk }}</td>
            <td>{{ $item->jmlPendLaki }}</td>
            <td>{{ $item->jmlPendPerempuan }}</td>
            <td>{{ $item->jmlWKTP }}</td>
            <td>{{ $item->jmlWKTPLaki }}</td>
            <td>{{ $item->jmlWKTPPerempuan }}</td>
            <td>{{ $item->jmlCetak }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>