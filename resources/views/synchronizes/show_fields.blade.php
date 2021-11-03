<!-- Table Name Field -->
<div class="form-group row">
    {!! Form::label('table_name', __('models/synchronizes.fields.table_name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $synchronize->table_name }}</p>
    </div>
</div>

