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
          <th>Puskesmas</th>
          <th>Jumlah Kasus</th>
          <th>Jumlah Mendapat Perawatan</th>
        </tr>
      </thead>
        @foreach ($data->giziburukDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td> {{ $item->puskesmas->nmaPuskesmas }} </td>
            <td> {{ $item->jmlKasus }} </td>
            <td>{{ $item->jmlPerawatan }}</td>
            </tr>
        @endforeach
    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>