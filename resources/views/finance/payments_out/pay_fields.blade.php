<!-- Number Field -->
<div class="form-group row">
    {!! Form::label('number', __('models/payments.fields.number').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 30, 'required' => 'required', 'readonly' => 'readonly']) !!}
    {!! Form::hidden('state', 'pay') !!}
</div>
</div>

<!-- Reference Field -->
<div class="form-group row">
    {!! Form::label('reference', __('models/payments.fields.reference').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Pay Date Field -->
<div class="form-group row">
    {!! Form::label('pay_date', __('models/payments.fields.pay_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('pay_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'pay_date']) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/payments.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
</div>
</div>

<!-- Detail Field -->
<div class="form-group row">    
<div class="col-md-12"> 
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Jumlah</th>
                <th>CN/DN</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($payment->paymentLines as $item)
            <tr>
                <td>{{ $item->invoice->number }}</td>
                <td class="text-right">{{ $item->amount }}</td>
                <td class="text-right">{{ $item->amount_cn_dn }}</td>
                <td class="text-right">{{ $item->amount_total }}</td>
            </tr>

        @empty
            <tr>
                <td colspan="4">Data tidak ditemukan</td>
            </tr>    
        @endforelse    
        </tbody>
    </table>
    
</div>
</div>
