<!-- Table Name Field -->
<div class="form-group row">
    {!! Form::label('table_name', __('models/synchronizes.fields.table_name').':', ['class' => 'col-md-3 col-form-label']) !!}
    {!! Form::hidden('filter', $filter) !!}
<div class="col-md-9"> 
    <ul class="list-group">
    @each('synchronizes.item', $listTables, 'item', 'empty')
    </ul>
</div>
</div>
