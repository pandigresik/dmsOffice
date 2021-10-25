<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/vendors.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group row">
    {!! Form::label('address', __('models/vendors.fields.address').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 80,'maxlength' => 80, 'required' =>
        'required']) !!}
    </div>
</div>

<!-- City Field -->
<div class="form-group row">
    {!! Form::label('city', __('models/vendorContacts.fields.city').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::select('city',$cityItems, null, ['class' => 'form-control select2']) !!}
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/vendorContacts.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('state', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
    </div>
</div>
    <!-- Email Field -->
    <div class="form-group row">
        {!! Form::label('email', __('models/vendors.fields.email').':', ['class' => 'col-md-3 col-form-label'])
        !!}
        <div class="col-md-9">
            {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 30, 'required' => 'required']) !!}
        </div>
    </div>

    <!-- Phone Field -->
    <div class="form-group row">
        {!! Form::label('phone', __('models/vendors.fields.phone').':', ['class' => 'col-md-3 col-form-label'])
        !!}
        <div class="col-md-9">
            {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 30, 'required' => 'required']) !!}
        </div>
    </div>

    <!-- Tax identification (NPWP) Field -->
    <div class="form-group row">
        {!! Form::label('tax_identification', __('models/vendors.fields.tax_identification').':', ['class' => 'col-md-3
        col-form-label'])
        !!}
        <div class="col-md-9">
            {!! Form::text('tax_identification', null, ['class' => 'form-control','maxlength' => 25, 'required' =>
            'required']) !!}
        </div>
    </div>

    <!-- Payment term Field -->
    <div class="form-group row">
        {!! Form::label('payment_term', __('models/vendors.fields.payment_term').':', ['class' => 'col-md-3
        col-form-label'])
        !!}
        <div class="col-md-9">
            {!! Form::text('payment_term', null, ['class' => 'form-control','maxlength' => 40, 'required' =>
            'required']) !!}
        </div>
    </div>

    <!-- Payment term Field -->
    <div class="form-group row">
        {!! Form::label('group', __('models/vendors.fields.group').':', ['class' => 'col-md-3 col-form-label'])
        !!}
        <div class="col-md-9">
            {!! Form::text('group', null, ['class' => 'form-control','maxlength' => 40, 'required' => 'required']) !!}
        </div>
    </div>

    <!-- Is Supplier Field -->
    <div class="form-group row">
        {!! Form::label('vendor_type', __('models/vendors.fields.type').':', ['class' => 'col-md-3 col-form-label']) !!}
        <div class="col-md-9">
            <div class="form-check form-check-inline">
                {!! Form::checkbox('is_supplier',true,null,['class' => 'form-check-input']) !!}
                {!! Form::label('is_supplier', __('models/vendors.fields.is_supplier'), ['class' => 'form-check-label'])
                !!}
            </div>
            <div class="form-check form-check-inline">
                {!! Form::checkbox('is_customer',true,null,['class' => 'form-check-input']) !!}
                {!! Form::label('is_customer', __('models/vendors.fields.is_customer'), ['class' => 'form-check-label'])
                !!}
            </div>
            <div class="form-check form-check-inline">
                {!! Form::checkbox('is_expedition',true,null,['class' => 'form-check-input']) !!}
                {!! Form::label('is_expedition', __('models/vendors.fields.is_expedition'), ['class' =>
                'form-check-label']) !!}
            </div>
        </div>
    </div>
