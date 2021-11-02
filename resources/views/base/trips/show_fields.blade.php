<!-- Code Field -->
<div class="form-group row">
    {!! Form::label('code', __('models/trips.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->code }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/trips.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->name }}</p>
    </div>
</div>

<!-- Origin Field -->
<div class="form-group row">
    {!! Form::label('origin', __('models/trips.fields.origin').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->origin }}</p>
    </div>
</div>

<!-- Origin Place Field -->
<div class="form-group row">
    {!! Form::label('origin_place', __('models/trips.fields.origin_place').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->origin_place }}</p>
    </div>
</div>

<!-- Origin Additional Price Field -->
<div class="form-group row">
    {!! Form::label('origin_additional_price', __('models/trips.fields.origin_additional_price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->origin_additional_price }}</p>
    </div>
</div>

<!-- Destination Field -->
<div class="form-group row">
    {!! Form::label('destination', __('models/trips.fields.destination').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->destination }}</p>
    </div>
</div>

<!-- Destination Place Field -->
<div class="form-group row">
    {!! Form::label('destination_place', __('models/trips.fields.destination_place').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->destination_place }}</p>
    </div>
</div>

<!-- Destination Additional Price Field -->
<div class="form-group row">
    {!! Form::label('destination_additional_price', __('models/trips.fields.destination_additional_price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->destination_additional_price }}</p>
    </div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/trips.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->price }}</p>
    </div>
</div>

<!-- Distance Field -->
<div class="form-group row">
    {!! Form::label('distance', __('models/trips.fields.distance').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->distance }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/trips.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $trip->description }}</p>
    </div>
</div>

