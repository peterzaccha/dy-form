<input class="form-control {{$class?? ''}} name="{{$name ?? ''}}"
       @if (isset($type) && $type=='file')
       @endif
       value="{{$value ?? ''}}" type="{{$type ?? "text"}}" placeholder="{{$placeholder ?? ''}}">

