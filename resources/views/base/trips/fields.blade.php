<div class="row">
    <div class="col-md-6">
        <!-- Code Field -->
        <div class="form-group row">
            {!! Form::label('code', __('models/trips.fields.code').':', ['class' => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30, 'required'
                => 'required']) !!}
            </div>
        </div>

        <!-- Name Field -->
        <div class="form-group row">
            {!! Form::label('name', __('models/trips.fields.name').':', ['class' => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 60,'maxlength' => 60, 'required'
                => 'required']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Origin Field -->
        <div class="form-group row">
            {!! Form::label('origin_location_id', __('models/trips.fields.origin_place').':', ['class' => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::select('origin_location_id', $originItems, null, ['class' => 'form-control select2', 'required' =>
                'required', 'data-placeholder' => __('crud.option.location_placeholder')]) !!}
            </div>
        </div>        

        <!-- Origin Additional Price Field -->
        <div class="form-group row">
            {!! Form::label('origin_additional_price', __('models/trips.fields.origin_additional_price').':', ['class'
            => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::text('origin_additional_price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}                
            </div>
        </div>

        <!-- Price Field -->
        <div class="form-group row">
            {!! Form::label('price', __('models/trips.fields.price').':', ['class' => 'col-md-4 col-form-label'])
            !!}
            <div class="col-md-8">
                {!! Form::text('price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Destination Field -->
        <div class="form-group row">
            {!! Form::label('destination_location_id', __('models/trips.fields.destination_place').':', ['class' => 'col-md-4
            col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::select('destination_location_id', $destinationItems, null, ['class' => 'form-control select2', 'required' =>
                'required', 'data-placeholder' => __('crud.option.location_placeholder')]) !!}
            </div>
        </div>        

        <!-- Destination Additional Price Field -->
        <div class="form-group row">
            {!! Form::label('destination_additional_price', __('models/trips.fields.destination_additional_price').':',
            ['class' => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::text('destination_additional_price', null, ['class' => 'form-control inputmask', 'required' =>
                'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
            </div>
        </div>

        <!-- Product Categories Field -->
        <div class="form-group row">
            {!! Form::label('product_categories_id', __('models/trips.fields.product_categories_id').':', ['class' => 'col-md-4
            col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::select('product_categories_id', $productCategoriesItems, null, ['class' => 'form-control select2', 'required' =>
                'required']) !!}
            </div>
        </div>

        <!-- Quantity Field -->
        <div class="form-group row">
            {!! Form::label('quantity', __('models/trips.fields.quantity').':',
            ['class' => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::text('quantity', null, ['class' => 'form-control inputmask', 'required' =>
                'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer'))]) !!}
            </div>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-6">        

        <!-- Distance Field -->
        <div class="form-group row">
            {!! Form::label('distance', __('models/trips.fields.distance').':', ['class' => 'col-md-4
            col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::text('distance', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Description Field -->
        <div class="form-group row">
            {!! Form::label('description', __('models/trips.fields.description').':', ['class' => 'col-md-2
            col-form-label'])
            !!}
            <div class="col-md-10">
                {!! Form::textarea('description', null, ['class' => 'form-control','maxlength' => 60,'rows' => 3,
                'required' =>
                'required']) !!}
            </div>
        </div>
    </div>
</div>