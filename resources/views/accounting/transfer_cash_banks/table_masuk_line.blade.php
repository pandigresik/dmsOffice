<table class="table table-bordered" id="table-account-line">
    <thead>
        <tr>
            <th>No. Referensi</th>
            <th>Account</th>
            <th>Keterangan</th>
            <th>Jumlah</th>            
            <th></th>
        </tr>
    </thead>
    <tbody onchange="updateSummaryBalance(this)">
        @if(isset($lines))            
            @foreach ($lines as $index => $item)
                @include('accounting.transfer_cash_banks.item_masuk_line', ['item' => $item, 'lastIndex' => count($lines) == $index + 1 ? 1 : 0])    
            @endforeach
        @else
            @include('accounting.transfer_cash_banks.item_masuk_line', ['item' => null, 'lastIndex' => 1])
        @endif        
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Jumlah</th>
            <th class="amount">{!! Form::text('', 0, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}</th>            
        </tr>
    </tfoot>
</table>

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('#table-account-line tbody').trigger('change')
        })
        function addRowSelect2(_elm){
            const _tr = $(_elm).closest('tr')
            _tr.find('select.select2').select2('destroy')
            main.addRow($(_elm), reinitSelect2 )
        }
        function reinitSelect2(_newTr){
            _newTr.find('.is-valid').removeClass('is-valid')
            main.initSelect(_newTr.closest('tbody'))
            _newTr.find('select,input').prop('required',1)
            main.initInputmask(_newTr)
        }

        function updateSummaryBalance(_elm){
            const _form = $(_elm).closest('form')
            const _table = $(_elm).closest('table')
            let _amount = 0, _credit = 0, _unmaskedvalue, _option
            $(_elm).find('input[name="transfer_cash_bank_detail[amount][]"]').each(function(){
                _option = $(this).data('optionmask') || {}
                _unmaskedvalue = $(this).inputmask('unmaskedvalue')  || '0'
                if (_option.radixPoint === ',') {
                    _unmaskedvalue = _unmaskedvalue.replace(',', '.')
                }
                _amount += parseInt(_unmaskedvalue)
            })

            _table.find('tfoot th.amount input').val(_amount)
            _table.find('tfoot th.amount input').trigger('change')
        }
    </script>
@endpush