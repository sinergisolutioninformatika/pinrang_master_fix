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
          <th>Bencana</th>
          <th>Jumlah Kejadian</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data->bencanaDetail as $key)
          <tr>
            <td> {{$no++}} </td>
            <td> {{$key->bencana->nmaBencana}} </td>
            <td> {{$key->jmlKejadian}} </td>
          </tr>
        @endforeach()
      </tbody>
      </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>