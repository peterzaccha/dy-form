@php($form = \Peterzaccha\DyForm\Models\DyForm::find($id))

<form class="form" enctype="{{$encrypt ?? ''}}" action="{{$action ?? route($route)}}" method="{{ in_array(strtoupper($method ?? 'post'),['PUT','DELETE']) ? 'post' : $method ?? 'post'  }}">
    @if (in_array(strtoupper($method ?? 'post'),['PUT','DELETE']) )
        @method($method)
    @endif
    @csrf
    {{$preAppend ?? ''}}
    @foreach($form->columns as $column)
        {!! (new \Peterzaccha\DyForm\Services\ColumnService($column,$user ?? null))->render() !!}
    @endforeach
    {{$slot}}
</form>