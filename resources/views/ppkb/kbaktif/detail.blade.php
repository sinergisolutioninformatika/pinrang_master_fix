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
          <th>Jumlah PPM Kabupaten</th>
          <th>Jumlah PPM Provinsi</th>
          <th>Jumlah PPM Pusat</th>
          <th>Jumlah IUD</th>
          <th>Jumlah MOP</th>
          <th>Jumlah MOW</th>
          <th>Jumlah IMP</th>
          <th>Jumlah STK</th>
          <th>Jumlah PIL</th>
          <th>Jumlah KDM</th>
        </tr>
      </thead>
        @foreach ($data->kbaktifDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlPPMKab }}</td>
            <td>{{ $item->jmlPPMProv }}</td>
            <td>{{ $item->jmlPPMPusat }}</td>
            <td>{{ $item->jmlIUD }}</td>
            <td>{{ $item->jmlMOP }}</td>
            <td>{{ $item->jmlMOW }}</td>
            <td>{{ $item->jmlIMP }}</td>
            <td>{{ $item->jmlSTK }}</td>
            <td>{{ $item->jmlPIL }}</td>
            <td>{{ $item->jmlKDM }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>