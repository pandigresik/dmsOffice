<!-- Estimate Date Field -->
<div class="form-group row">
    {!! Form::label('estimate_date', __('models/payments.fields.estimate_date').':', ['class' => 'col-md-3
    col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('estimate_date', null, ['class' => 'form-control datetime', 'required' => 'required'
        ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript')
        ]]),'id'=>'estimate_date']) !!}
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row">
    {!! Form::label('amount', __('models/payments.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' =>
        'readonly', 'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <!--
                        <label class="form-check-label">
                            <input type="checkbox" onclick="main.checkAll(this,'table')">
                        </label>
                        -->
                    </th>
                    <th>Partner</th>
                    <th>Invoice</th>
                    <th>Jumlah</th>
                    <th>CN/DN</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoices as $partner => $items)
                @foreach ($items as $item)
                @php
                $totalCreditDebitNote = 0;
                $totalCreditDebitNote = $item->debitCreditNote->sum(function($debit){
                    return $debit->rawAmount;
                });
                $total = $item->getRawOriginal('amount_total') + $totalCreditDebitNote;
                $item->amount_cn_dn = $totalCreditDebitNote;
                $item->syncOriginal();
                @endphp
                <tr>
                    <td rowspan="2">
                        <label class="form-check-label">
                            <input type="checkbox" name="invoice_id[]" onchange="updateTotalPayment(this)" value="{{ json_encode($item->getRawOriginal()) }}">
                        </label>
                    </td>
                    <td>{{ $item->partner->szName ?? $item->ekspedisi->szName  }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->amount_total }}</td>
                    <td>{{ localNumberAccountingFormat($totalCreditDebitNote) }}</td>
                    <td rowspan="2" class="invoice_total" data-amount="{{ $total }}">{{ localNumberAccountingFormat($total) }}</td>
                </tr>
                <tr>                    
                    <td colspan="4">
                        <div class="row">
                            <div class="col-md-12">
                                @include($baseViewPath.'.invoice_list',['invoiceLines' => $item->invoiceLines])
                            </div>
                            <div class="col-md-12">
                                @include($baseViewPath.'.cndn_list',['debitCreditNote' => $item->debitCreditNote])
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach                
                
                @empty
                <tr>
                    <td colspan="5">Data tidak ditemukan</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>

@push('scripts')
<script type="text/javascript">
    function updateTotalPayment(elm){
        const _tbody = $(elm).closest('tbody')
        let _total = 0, _tr, _tdTotal
        _tbody.find('input[name^=invoice_id]:checked').each(function(){
            _tr = $(this).closest('tr')
            _tdTotal = _tr.find('td.invoice_total')
            _total += _tdTotal.data('amount')
        })
        $('input[name=amount]').val(_total)
        $('input[name=amount]').trigger('blur')
    }
</script>
@endpush