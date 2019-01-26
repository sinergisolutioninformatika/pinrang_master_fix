<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : {{$ta}}  </h4>
      <button type='button'  class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Kecamatan</th>
          <th>Jumlah SD</th>
          <th>Kondisi Baik</th>
          <th>Rusak Ringan</th>
          <th>Rusak Berat</th>
          <th>Proses</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data->kondisiSDDetail as $key)
        <tr>
          <td>{{$no++}}</td>
          @if($key->jmlRusakBerat > 0)
            <td>
              <span style="cursor: pointer;" class="badge badge-success">{{$key->kecamatan->nmaKecamatan}}</span>
            </td>
          @else
            <td>
              {{$key->kecamatan->nmaKecamatan}}
            </td>
          @endif()
      
          <td>{{$key->jmlSD}}</td>
          <td>{{$key->jmlKondisiBaik}}</td>
          <td>{{$key->jmlRusakRingan}}</td>
          <td>{{$key->jmlRusakBerat}}</td>
          <td>
            @if($key->jmlRusakBerat > 0)
              <a href="javascript:;" class="btn btn-primary addschool" data-nameKec="{{$key->kecamatan->nmaKecamatan}}" data-kec="{{$key->id}}">Sekolah  </a> 
              <a href="javascript:;" class="btn btn-success location">Lokasi</a>
            @endif()
          </td>
        </tr>
        @endforeach()
      </tbody>
      </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>