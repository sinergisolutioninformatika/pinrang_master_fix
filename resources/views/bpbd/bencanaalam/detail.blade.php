<div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : {{$ta}} </h4>
      <button type='button' class='btn btn-outline-success btn-sm m-btn m-btn--custom' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Kecamatan</th>
          <th>Jml. Kejadian</th>
          <th>Banjir</th>
          <th>Kebakaran</th>
          <th>Kekeringan</th>
          <th>Angin Kencang</th>
          <th>Tanah Longsor</th>
        </tr>
      </thead>

        @foreach ($data->bencanaalamDetail as $item)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kecamatan->nmaKecamatan }}</td>
            <td>{{ $item->jmlKejadian }}</td>
            <td>{{ $item->jmlBanjir }}</td>
            <td>{{ $item->jmlKebakaran }}</td>
            <td>{{ $item->jmlKekeringan }}</td>
            <td>{{ $item->jmlAnginkencang }}</td>
            <td>{{ $item->jmlTanahlongsor }}</td>


            </tr>
        @endforeach

      </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>