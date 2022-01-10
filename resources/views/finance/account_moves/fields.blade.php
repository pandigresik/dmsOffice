<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/accountMoves.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 20,'readonly' => 'readonly']) !!}
    </div>
</div>

<!-- Date Field -->
<div class="form-group row">
    {!! Form::label('date', __('models/accountMoves.fields.date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' =>
        json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'date']) !!}
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/accountMoves.fields.reference').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-9">
        {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 80,'maxlength' => 80, 'required' =>
        'required']) !!}
    </div>
</div>

<div class="table-responsive">
@include('finance.account_moves.table_line')
</div>