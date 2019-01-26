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
          <th>Jumlah Guru PNS</th>
          <th>Guru TK</th>
          <th>Guru SD</th>
          <th>Guru SMP</th>
        </tr>
      </thead>
        @foreach ($data->guruPNSDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlGuruPNS }}</td>
            <td>{{ $item->jmlGuruTKPNS }}</td>
            <td>{{ $item->jmlGuruSDPNS }}</td>
            <td>{{ $item->jmlGuruSMPPNS }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>