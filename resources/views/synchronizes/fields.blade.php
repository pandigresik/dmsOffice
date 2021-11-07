<!-- Table Name Field -->
<div class="form-group row">
    {!! Form::label('table_name', __('models/synchronizes.fields.table_name').':', ['class' => 'col-md-12 col-form-label']) !!}    
<div class="col-md-12"> 
    <ul class="list-group">
    @each('synchronizes.item', $listTables, 'item', 'empty')
    </ul>
</div>
</div>
