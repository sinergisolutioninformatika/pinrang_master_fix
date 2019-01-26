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
          <th>Jumlah Armada</th>
          <th>Kapal Motor</th>
          <th>Perahu Motor</th>
          <th>Perahu Tanpa Motor</th>
        </tr>
      </thead>
        @foreach ($data->armadaDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlArmada }}</td>
            <td>{{ $item->jmlKapalmotor }}</td>
            <td>{{ $item->jmlPerahumotor }}</td>
            <td>{{ $item->jmlPerahutanpamotor }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>