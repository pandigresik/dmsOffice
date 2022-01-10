<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/accountMoves.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->number }}</p>
    </div>
</div>

<!-- Date Field -->
<div class="form-group row">
    {!! Form::label('date', __('models/accountMoves.fields.date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->date }}</p>
    </div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/accountMoves.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->reference }}</p>
    </div>
</div>

<!-- Narration Field -->
<div class="form-group row">
    {!! Form::label('narration', __('models/accountMoves.fields.narration').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->narration }}</p>
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    {!! Form::label('state', __('models/accountMoves.fields.state').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $accountMove->state }}</p>
    </div>
</div>

