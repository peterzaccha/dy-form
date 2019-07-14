<input class="form-control {{$class?? ''}}" name="{{$name ?? ''}}"
       {{isset($required) && $required ? 'required' : ''}}
       value="{{$value ?? ''}}" type="{{$type ?? "text"}}" placeholder="{{$placeholder ?? ''}}">

