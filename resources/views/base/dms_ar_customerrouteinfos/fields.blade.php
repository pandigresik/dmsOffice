<!-- Iid Field -->
<div class="form-group row">
    {!! Form::label('iId', __('models/dmsArCustomerrouteinfos.fields.iId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('iId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Szid Field -->
<div class="form-group row">
    {!! Form::label('szId', __('models/dmsArCustomerrouteinfos.fields.szId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Intitemnumber Field -->
<div class="form-group row">
    {!! Form::label('intItemNumber', __('models/dmsArCustomerrouteinfos.fields.intItemNumber').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('intItemNumber', null, ['class' => 'form-control']) !!}
</div>
</div>

<!-- Szroutetype Field -->
<div class="form-group row">
    {!! Form::label('szRouteType', __('models/dmsArCustomerrouteinfos.fields.szRouteType').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szRouteType', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szemployeeid Field -->
<div class="form-group row">
    {!! Form::label('szEmployeeId', __('models/dmsArCustomerrouteinfos.fields.szEmployeeId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szEmployeeId', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>
</div>

<!-- Bmon Field -->
<div class="form-group row">
    {!! Form::label('bMon', __('models/dmsArCustomerrouteinfos.fields.bMon').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bMon', 0) !!}
        {!! Form::checkbox('bMon', '1', null) !!}
    </label>
</div>
</div>


<!-- Btue Field -->
<div class="form-group row">
    {!! Form::label('bTue', __('models/dmsArCustomerrouteinfos.fields.bTue').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bTue', 0) !!}
        {!! Form::checkbox('bTue', '1', null) !!}
    </label>
</div>
</div>


<!-- Bwed Field -->
<div class="form-group row">
    {!! Form::label('bWed', __('models/dmsArCustomerrouteinfos.fields.bWed').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bWed', 0) !!}
        {!! Form::checkbox('bWed', '1', null) !!}
    </label>
</div>
</div>


<!-- Bthu Field -->
<div class="form-group row">
    {!! Form::label('bThu', __('models/dmsArCustomerrouteinfos.fields.bThu').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bThu', 0) !!}
        {!! Form::checkbox('bThu', '1', null) !!}
    </label>
</div>
</div>


<!-- Bfri Field -->
<div class="form-group row">
    {!! Form::label('bFri', __('models/dmsArCustomerrouteinfos.fields.bFri').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bFri', 0) !!}
        {!! Form::checkbox('bFri', '1', null) !!}
    </label>
</div>
</div>


<!-- Bsat Field -->
<div class="form-group row">
    {!! Form::label('bSat', __('models/dmsArCustomerrouteinfos.fields.bSat').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bSat', 0) !!}
        {!! Form::checkbox('bSat', '1', null) !!}
    </label>
</div>
</div>


<!-- Bsun Field -->
<div class="form-group row">
    {!! Form::label('bSun', __('models/dmsArCustomerrouteinfos.fields.bSun').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bSun', 0) !!}
        {!! Form::checkbox('bSun', '1', null) !!}
    </label>
</div>
</div>


<!-- Bweek1 Field -->
<div class="form-group row">
    {!! Form::label('bWeek1', __('models/dmsArCustomerrouteinfos.fields.bWeek1').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bWeek1', 0) !!}
        {!! Form::checkbox('bWeek1', '1', null) !!}
    </label>
</div>
</div>


<!-- Bweek2 Field -->
<div class="form-group row">
    {!! Form::label('bWeek2', __('models/dmsArCustomerrouteinfos.fields.bWeek2').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bWeek2', 0) !!}
        {!! Form::checkbox('bWeek2', '1', null) !!}
    </label>
</div>
</div>


<!-- Bweek3 Field -->
<div class="form-group row">
    {!! Form::label('bWeek3', __('models/dmsArCustomerrouteinfos.fields.bWeek3').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bWeek3', 0) !!}
        {!! Form::checkbox('bWeek3', '1', null) !!}
    </label>
</div>
</div>


<!-- Bweek4 Field -->
<div class="form-group row">
    {!! Form::label('bWeek4', __('models/dmsArCustomerrouteinfos.fields.bWeek4').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('bWeek4', 0) !!}
        {!! Form::checkbox('bWeek4', '1', null) !!}
    </label>
</div>
</div>


<!-- Szusercreatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserCreatedId', __('models/dmsArCustomerrouteinfos.fields.szUserCreatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserCreatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Szuserupdatedid Field -->
<div class="form-group row">
    {!! Form::label('szUserUpdatedId', __('models/dmsArCustomerrouteinfos.fields.szUserUpdatedId').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('szUserUpdatedId', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>
</div>

<!-- Dtmcreated Field -->
<div class="form-group row">
    {!! Form::label('dtmCreated', __('models/dmsArCustomerrouteinfos.fields.dtmCreated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmCreated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmCreated']) !!}
</div>
</div>

<!-- Dtmlastupdated Field -->
<div class="form-group row">
    {!! Form::label('dtmLastUpdated', __('models/dmsArCustomerrouteinfos.fields.dtmLastUpdated').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('dtmLastUpdated', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'dtmLastUpdated']) !!}
</div>
</div>
