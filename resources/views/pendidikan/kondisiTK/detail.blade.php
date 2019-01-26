<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : {{$ta}} </h4>
      <button type='button'  class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Kecamatan</th>
          <th>Jumlah TK</th>
          <th>Kondisi Baik</th>
          <th>Rusak Ringan</th>
          <th>Rusak Berat</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data->kondisiTKDetail as $key)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$key->kecamatan->nmaKecamatan}}</td>
            <td>{{$key->jmlTK}}</td>
            <td>{{$key->jmlKondisiBaik}}</td>
            <td>{{$key->jmlRusakRingan}}</td>
            <td>{{$key->jmlRusakBerat}}</td>
          </tr>
        @endforeach()
      </tbody>
       </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>