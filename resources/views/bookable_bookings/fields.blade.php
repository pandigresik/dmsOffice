<!-- Bookable Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookable_type', __('models/bookableBookings.fields.bookable_type').':') !!}
    {!! Form::text('bookable_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Bookable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookable_id', __('models/bookableBookings.fields.bookable_id').':') !!}
    {!! Form::number('bookable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_type', __('models/bookableBookings.fields.customer_type').':') !!}
    {!! Form::text('customer_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', __('models/bookableBookings.fields.customer_id').':') !!}
    {!! Form::number('customer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Starts At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('starts_at', __('models/bookableBookings.fields.starts_at').':') !!}
    {!! Form::text('starts_at', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'starts_at']) !!}
</div>


<!-- Ends At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ends_at', __('models/bookableBookings.fields.ends_at').':') !!}
    {!! Form::text('ends_at', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'ends_at']) !!}
</div>


<!-- Canceled At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('canceled_at', __('models/bookableBookings.fields.canceled_at').':') !!}
    {!! Form::text('canceled_at', null, ['class' => 'form-control datetime', 'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'canceled_at']) !!}
</div>


<!-- Timezone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timezone', __('models/bookableBookings.fields.timezone').':') !!}
    {!! Form::text('timezone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('models/bookableBookings.fields.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', __('models/bookableBookings.fields.quantity').':') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_paid', __('models/bookableBookings.fields.total_paid').':') !!}
    {!! Form::number('total_paid', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', __('models/bookableBookings.fields.currency').':') !!}
    {!! Form::text('currency', null, ['class' => 'form-control','maxlength' => 3,'maxlength' => 3]) !!}
</div>

<!-- Formula Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('formula', __('models/bookableBookings.fields.formula').':') !!}
    {!! Form::textarea('formula', null, ['class' => 'form-control']) !!}
</div>

<!-- Options Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('options', __('models/bookableBookings.fields.options').':') !!}
    {!! Form::textarea('options', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', __('models/bookableBookings.fields.notes').':') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bookableBookings.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
