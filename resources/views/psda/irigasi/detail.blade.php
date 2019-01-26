<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : {{$ta}} </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
        <thead>
          <tr>
          <th>No.</th>
          <th>UPTD</th>
          <th>Jaringan Tersier</th>
          <th>Jaringan Sekunder</th>
          <th>Jaringan Induk</th>
          <th>Jaringan Kuarter</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data->irigasiDetail as $key)
            <tr>
              <td> {{$no++}} </td>
              <td> {{$key->uptd->nmaUPTD}} </td>
              <td> {{$key->jmlTersier}} </td>
              <td> {{$key->jmlSekunder}} </td>
              <td> {{$key->jmlInduk}} </td>
              <td> {{$key->jmlKuarter}} </td>
            </tr>
          @endforeach()
        </tbody>

         </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>