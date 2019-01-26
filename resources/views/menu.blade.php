@section('menu')
<p>{{$auth->email}}<br>{{Auth::user()->skpd->nmaSKPD}}</p><hr>

@foreach($menu as $key)
  <a href="{{url($key->link_admin)}}">{{$key->nmaData}}</a>
@endforeach()
<!--  -->