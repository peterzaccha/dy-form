<form class="form" enctype="{{$encrypt ?? ''}}" action="{{$action ?? route($route)}}" method="{{ in_array(strtoupper($method ?? 'post'),['PUT','DELETE']) ? 'post' : $method ?? 'post'  }}">
    @if (in_array(strtoupper($method ?? 'post'),['PUT','DELETE']) )
        @method($method)
    @endif
    @csrf
    {{$content ?? ''}}
    {{$slot}}
</form>