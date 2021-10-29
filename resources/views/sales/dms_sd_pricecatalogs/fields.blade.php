<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsSdPricecatalogs.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsSdPricecatalogs.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szname Field -->
<div class="form-group row">
    {!! Form::label('szName', __('models/dmsSdPricecatalogs.fields.szName').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szName', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szdescription Field -->
<div class="form-group row">
    {!! Form::label('szDescription', __('models/dmsSdPricecatalogs.fields.szDescription').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szDescription', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>
</div>

<!-- Szcombinationid Field -->
<div class="form-group row">
    {!! Form::label('szCombinationId', __('models/dmsSdPricecatalogs.fields.szCombinationId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCombinationId', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>
</div>

<!-- Szcompanyid Field -->
<div class="form-group row">
    {!! Form::label('szCompanyId', __('models/dmsSdPricecatalogs.fields.szCompanyId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szCompanyId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Dtmvalidfrom Field -->
<div class="form-group row">
    {!! Form::label('dtmValidFrom', __('models/dmsSdPricecatalogs.fields.dtmValidFrom').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmValidFrom', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmValidFrom']) !!}
</div>
</div>

<!-- Dtmvalidto Field -->
<div class="form-group row">
    {!! Form::label('dtmValidTo', __('models/dmsSdPricecatalogs.fields.dtmValidTo').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmValidTo', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmValidTo']) !!}
</div>
</div>

<!-- Intpriority Field -->
<div class="form-group row">
    {!! Form::label('intPriority', __('models/dmsSdPricecatalogs.fields.intPriority').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('intPriority', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Szusercreatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserCreatedId', __('models/dmsSdPricecatalogs.fields.szUserCreatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserCreatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szuserupdatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserUpdatedId', __('models/dmsSdPricecatalogs.fields.szUserUpdatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserUpdatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Dtmcreated Field -->
<div class="form-group row">
    {!! Form::label('dtmCreated', __('models/dmsSdPricecatalogs.fields.dtmCreated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmCreated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmCreated']) !!}
</div>
</div>

<!-- Dtmlastupdated Field -->
<div class="form-group row">
    {!! Form::label('dtmLastUpdated', __('models/dmsSdPricecatalogs.fields.dtmLastUpdated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmLastUpdated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmLastUpdated']) !!}
</div>
</div>
