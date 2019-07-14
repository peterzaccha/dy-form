<div class="form-group push">
    {{$slot}}
</div>
@pushonce('plugins:push')
<script src="{{url('assets/plugins/addMore/add-more.js')}}"></script>
@endpushonce
@pushonce('scripts:push')
<script>
    $('.push').AddMore({
        buttonAddLabel: 'اضف المذيد',
        buttonRemoveLabel: 'حذف',
        onAdd: function (div) {
            if (div.find('.select2').length > 0) {
                div.find('.select2').selectize();
            }
        }
    });
</script>
@endpushonce