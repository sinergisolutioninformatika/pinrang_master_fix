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
          <th>Bidang Usaha</th>
          <th>Jumlah Penerbitan Izin</th>
          <th>Jumlah Retribusi (.000)</th>
          </tr>
        </thead>
        <tbody>
    
            @foreach ($data->penerbitanizinDetail as $item)
                <tr>
                <td>{{$no++}}</td>
                <td>{{$item->bidanIzin->nmaBidang}}</td>
                <td>{{$item->jmlPenerbitan }}</td>
                <td>{{$item->jmlRetribusi }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>
<div class='modal-footer'>
  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
</div>
</div>