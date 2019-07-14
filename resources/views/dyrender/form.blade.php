<dy-form :action="$action">
    @foreach($form->columns as $column)
        {!! (new \Peterzaccha\DyForm\Services\ColumnService($column))->render() !!}
    @endforeach
</dy-form>