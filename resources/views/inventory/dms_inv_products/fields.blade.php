<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsInvProducts.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsInvProducts.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsInvProducts.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdescription Field -->
<div class="form-group row">
    {!! Form::label('szDescription', __('models/dmsInvProducts.fields.szDescription').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDescription', null, ['class' => 'form-control','maxlength' => 1000,'maxlength' => 1000]) !!}
</div>
</div>

<!-- Sztrackingtype Field -->
<div class="form-group row">
    {!! Form::label('szTrackingType', __('models/dmsInvProducts.fields.szTrackingType').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szTrackingType', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>
</div>

<!-- Szuomid Field -->
<div class="form-group row">
    {!! Form::label('szUomId', __('models/dmsInvProducts.fields.szUomId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUomId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Busecomposite Field -->
<div class="form-group row">
    {!! Form::label('bUseComposite', __('models/dmsInvProducts.fields.bUseComposite').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bUseComposite', 0) !!}
        {!! Form::checkbox('bUseComposite', '1', null) !!}
    </label>
</div>
</div>


<!-- Bkit Field -->
<div class="form-group row">
    {!! Form::label('bKit', __('models/dmsInvProducts.fields.bKit').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bKit', 0) !!}
        {!! Form::checkbox('bKit', '1', null) !!}
    </label>
</div>
</div>


<!-- Szqtyformat Field -->
<div class="form-group row">
    {!! Form::label('szQtyFormat', __('models/dmsInvProducts.fields.szQtyFormat').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szQtyFormat', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szproducttype Field -->
<div class="form-group row">
    {!! Form::label('szProductType', __('models/dmsInvProducts.fields.szProductType').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szProductType', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Sznickname Field -->
<div class="form-group row">
    {!! Form::label('szNickName', __('models/dmsInvProducts.fields.szNickName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szNickName', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>
</div>

<!-- Dtmstartdate Field -->
<div class="form-group row">
    {!! Form::label('dtmStartDate', __('models/dmsInvProducts.fields.dtmStartDate').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmStartDate', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmStartDate']) !!}
</div>
</div>

<!-- Dtmenddate Field -->
<div class="form-group row">
    {!! Form::label('dtmEndDate', __('models/dmsInvProducts.fields.dtmEndDate').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmEndDate', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmEndDate']) !!}
</div>
</div>

<!-- Szusercreatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserCreatedId', __('models/dmsInvProducts.fields.szUserCreatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserCreatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szuserupdatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserUpdatedId', __('models/dmsInvProducts.fields.szUserUpdatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserUpdatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Dtmcreated Field -->
<div class="form-group row">
    {!! Form::label('dtmCreated', __('models/dmsInvProducts.fields.dtmCreated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmCreated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmCreated']) !!}
</div>
</div>

<!-- Dtmlastupdated Field -->
<div class="form-group row">
    {!! Form::label('dtmLastUpdated', __('models/dmsInvProducts.fields.dtmLastUpdated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmLastUpdated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmLastUpdated']) !!}
</div>
</div>
