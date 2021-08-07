<!-- Bookable Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookable_type', __('models/bookableAvailabilities.fields.bookable_type').':') !!}
    {!! Form::text('bookable_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Bookable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookable_id', __('models/bookableAvailabilities.fields.bookable_id').':') !!}
    {!! Form::number('bookable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Range Field -->
<div class="form-group col-sm-6">
    {!! Form::label('range', __('models/bookableAvailabilities.fields.range').':') !!}
    {!! Form::text('range', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from', __('models/bookableAvailabilities.fields.from').':') !!}
    {!! Form::text('from', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('to', __('models/bookableAvailabilities.fields.to').':') !!}
    {!! Form::text('to', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Is Bookable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_bookable', __('models/bookableAvailabilities.fields.is_bookable').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_bookable', 0) !!}
        {!! Form::checkbox('is_bookable', '1', null) !!}
    </label>
</div>


<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', __('models/bookableAvailabilities.fields.priority').':') !!}
    {!! Form::number('priority', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bookableAvailabilities.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
