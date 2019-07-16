@php(!is_array($value) ? $value=[$value] : '' )
<select @isset($multiple) multiple @endisset   id="{{$id ?? ''}}" name="{{$name}}"
        class="form-control select2 {{$class ?? ''}}">
    <option {{!$value ? 'selected' : ''}} value="" disabled>اختر</option>
    @isset($options)
        @foreach($options as $item)
            <option
                    @if(isset($value) && in_array($item->value,$value))
                    selected
                    @endif  value="{{$item->value}}">
                {{$item->name}}
            </option>

        @endforeach
    @endisset
</select>
