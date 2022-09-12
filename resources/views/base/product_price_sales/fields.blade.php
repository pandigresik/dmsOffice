<!-- Dms Inv Product Id Field -->
<div class="form-group row">
    {!! Form::label('dms_inv_product_id', __('models/productPrices.fields.dms_inv_product_id').':', ['class' =>
    'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::select('dms_inv_product_id', $dmsInvProductItems, null, ['class' => 'form-control select2', 'required'
        => 'required'], $productPriceItem) !!}
    </div>
</div>

<!-- Price Field -->
<div class="form-group row">
    {!! Form::label('price', __('models/productPrices.fields.price').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask' =>
        1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
    </div>
</div>

<!-- DPP Price Field -->
<div class="form-group row">
    {!! Form::label('dpp_price', __('models/productPrices.fields.dpp_price').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('dpp_price', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-unmask'
        => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
    </div>
</div>

<!-- Branch Price Field -->
<div class="form-group row">
    {!! Form::label('branch_price', __('models/productPrices.fields.branch_price').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('branch_price', null, ['class' => 'form-control inputmask', 'required' => 'required',
        'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.decimal'))]) !!}
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group row">
    {!! Form::label('start_date', __('models/productPrices.fields.start_date').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-6">
        {!! Form::text('start_date', null, ['class' => 'form-control datetime', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'start_date']) !!}
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('select[name=dms_inv_product_id]').change(function(){
                const _form = $(this).closest('form')
                const _price = $(this).find('option:selected').attr('price') || 0
                const _dppPrice = $(this).find('option:selected').attr('dpp_price') || 0
                const _branchPrice = $(this).find('option:selected').attr('branch_price') || 0
                _form.find('input[name=price]').val(_price)
                _form.find('input[name=dpp_price]').val(_dppPrice)
                _form.find('input[name=branch_price]').val(_branchPrice)
            })            
        }) 
    </script>
@endpush('scripts')
