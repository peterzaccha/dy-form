
<div class="clickShow" data-stat="{{$stat??'off'}}">
    <div class="clickShowContent" >
        {{$slot}}
    </div>
        <button class="clickShowAction">اضافة {{$label}}</button>
</div>


@pushonce('scripts:clickShow')
<script>
    $(document).ready(function () {
        $('.clickShow').each(function (i,element) {
            var stat = $(element).attr('data-stat');
            showSetSata(stat,element);
        });
        
        $('.clickShowAction').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            var element = $(this).parent('.clickShow');
            showSetSata('on',element);
        });

        function showSetSata(stat,element) {
            if (stat==='on'){
                $(element).children('.clickShowAction').remove();
                $(element).children('.clickShowContent').show();
            }else {
                $(element).children('.clickShowContent').hide();
            }
        }

    });
</script>

@endpushonce