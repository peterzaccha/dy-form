<select  @isset($multiple) multiple @endisset   id="{{$id ?? ''}}"  name="{{$name}}" class="form-control select2 {{$class}}">
    <option {{!$value ? 'selected' : ''}} value="" disabled>اختر</option>
    @isset($enum)
        @foreach($enum as $item)
            @isset($multiple)
                <option @if(isset($value) && in_array($item,$value)) selected @endif>{{$item}}</option>
            @else
                <option @if(isset($value) && $value==$item) selected @endif >{{$item}}</option>
            @endisset
        @endforeach
    @endisset

    @isset($model)
        @foreach($model as $item)
            @isset($multiple)
                <option @if(isset($value) && in_array($item->id,$value)) selected
                        @endif  value="{{$item->id}}">{{$item->name}}</option>
            @else
                <option @if(isset($value) && $value==$item->id) selected
                        @endif  value="{{$item->id}}">{{$item->name}}</option>
            @endisset
        @endforeach
    @endisset
</select>
