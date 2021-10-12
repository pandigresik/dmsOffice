<!-- Currency Id Field -->
<div class="form-group row">
    {!! Form::label('currency_id', __('models/ifrsEntities.fields.currency_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->currency_id }}</p>
    </div>
</div>

<!-- Parent Id Field -->
<div class="form-group row">
    {!! Form::label('parent_id', __('models/ifrsEntities.fields.parent_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->parent_id }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/ifrsEntities.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->name }}</p>
    </div>
</div>

<!-- Multi Currency Field -->
<div class="form-group row">
    {!! Form::label('multi_currency', __('models/ifrsEntities.fields.multi_currency').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->multi_currency }}</p>
    </div>
</div>

<!-- Mid Year Balances Field -->
<div class="form-group row">
    {!! Form::label('mid_year_balances', __('models/ifrsEntities.fields.mid_year_balances').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->mid_year_balances }}</p>
    </div>
</div>

<!-- Year Start Field -->
<div class="form-group row">
    {!! Form::label('year_start', __('models/ifrsEntities.fields.year_start').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->year_start }}</p>
    </div>
</div>

<!-- Destroyed At Field -->
<div class="form-group row">
    {!! Form::label('destroyed_at', __('models/ifrsEntities.fields.destroyed_at').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->destroyed_at }}</p>
    </div>
</div>

<!-- Locale Field -->
<div class="form-group row">
    {!! Form::label('locale', __('models/ifrsEntities.fields.locale').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $ifrsEntities->locale }}</p>
    </div>
</div>

