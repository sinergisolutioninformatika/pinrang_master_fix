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
          <th>Jumlah Petak</th>
          <th>Luas (Ha)</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data->luassawahDetail as $key)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$key->uptd->nmaUPTD}}</td>
              <td>{{$key->jmlPetak}}</td>
              <td>{{$key->jmlLuas}}</td>
            </tr>
          @endforeach()
        </tbody>
        </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>