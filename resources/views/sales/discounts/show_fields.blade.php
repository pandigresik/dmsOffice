<!-- Jenis Field -->
<div class="form-group row">
    {!! Form::label('jenis', __('models/discounts.fields.jenis').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->jenis }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/discounts.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->name }}</p>
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/discounts.fields.start_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->start_date }}</p>
    </div>
</div>

<!-- End Date Field -->
<div class="form-group row">
    {!! Form::label('end_date', __('models/discounts.fields.end_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->end_date }}</p>
    </div>
</div>

<!-- Split Field -->
<div class="form-group row">
    {!! Form::label('split', __('models/discounts.fields.split').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->split }}</p>
    </div>
</div>

<!-- Main Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('main_dms_inv_product_id', __('models/discounts.fields.main_dms_inv_product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->main_dms_inv_product_id }}</p>
    </div>
</div>

<!-- Main Quota Field -->
<div class="form-group row">
    {!! Form::label('main_quota', __('models/discounts.fields.main_quota').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->main_quota }}</p>
    </div>
</div>

<!-- Bundling Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('bundling_dms_inv_product_id', __('models/discounts.fields.bundling_dms_inv_product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->bundling_dms_inv_product_id }}</p>
    </div>
</div>

<!-- Bundling Quota Field -->
<div class="form-group row">
    {!! Form::label('bundling_quota', __('models/discounts.fields.bundling_quota').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->bundling_quota }}</p>
    </div>
</div>

<!-- Max Quota Field -->
<div class="form-group row">
    {!! Form::label('max_quota', __('models/discounts.fields.max_quota').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->max_quota }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/discounts.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $discounts->state }}</p>
    </div>
</div>

