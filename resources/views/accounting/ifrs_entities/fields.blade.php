<!-- Currency Id Field -->
<div class="form-group row">
    {!! Form::label('currency_id', __('models/ifrsEntities.fields.currency_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('currency_id', $currencyItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Parent Id Field -->
<div class="form-group row">
    {!! Form::label('parent_id', __('models/ifrsEntities.fields.parent_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('parent_id', $parentItems, null, ['class' => 'form-control select2']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsEntities.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 300,'maxlength' => 300]) !!}
</div>
</div>

<!-- Multi Currency Field -->
<div class="form-group row">
    {!! Form::label('multi_currency', __('models/ifrsEntities.fields.multi_currency').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('multi_currency', 0) !!}
        {!! Form::checkbox('multi_currency', '1', null) !!}
    </label>
</div>
</div>


<!-- Mid Year Balances Field -->
<div class="form-group row">
    {!! Form::label('mid_year_balances', __('models/ifrsEntities.fields.mid_year_balances').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('mid_year_balances', 0) !!}
        {!! Form::checkbox('mid_year_balances', '1', null) !!}
    </label>
</div>
</div>


<!-- Year Start Field -->
<div class="form-group row">
    {!! Form::label('year_start', __('models/ifrsEntities.fields.year_start').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('year_start', null, ['class' => 'form-control']) !!}
</div>
</div>