@php(isset($value) &&!is_array($value) ? $value=[$value] : $value=$value )
<div class="col-md-12 mb-3  check-wrapper">
    <label class="bold">{{$label}}</label>
    <div class="clearfix"></div>
    @foreach($options as $v=>$label)
        <label class="radio-inline">
            <input class="check-condition"
                   {{ isset($value) && in_array($v,$value) ? 'checked' : '' }}
                   value="{{$v}}" type="{{$type ?? 'checkbox'}}"
                   name="{{$name ?? ''}}">{{$label}}
        </label>
        <div class="clearfix"></div>
    @endforeach
</div>
@foreach($options as $v=>$e)
    @php($v = 'value_'.$v)
    <div class="condition" data-target="{{$v}}">
        {{ $$v ?? ''}}
    </div>
@endforeach

@pushonce('scripts:check-condition')
<script>
    $(document).ready(function () {
        const checkCondition =  $('.check-condition');
        checkCondition.change(function () {
            const state = $(this).prop('checked');
            if (state){
                $('.condition').hide();
                $(this).prop('checked',true);
                var condtionSrc ='value_'+ $(this).val();
                $(this).closest('.check-wrapper').nextAll('[data-target="'+condtionSrc+'"]').show();
            }
        });
        checkCondition.trigger('change');
    });
</script>
@endpushonce