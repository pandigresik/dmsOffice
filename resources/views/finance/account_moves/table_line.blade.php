<table class="table table-bordered" id="table-account-line">
    <thead>
        <tr>
            <th>Account</th>
            <th>Nama Account</th>
            <th>Keterangan</th>
            <th>debit</th>
            <th>Kredit</th>
            <th></th>
        </tr>
    </thead>
    <tbody onchange="updateSummaryBalance(this)">
        @if(isset($lines))
            @foreach ($lines as $index => $item)
                @include('finance.account_moves.item_line', ['item' => $item, 'lastIndex' => count($lines) == $index + 1 ? 1 : 0])    
            @endforeach
        @else
            @include('finance.account_moves.item_line', ['item' => null, 'lastIndex' => 1])
        @endif        
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Jumlah</th>
            <th class="debit">{!! Form::text('', 0, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}</th>
            <th class="credit">{!! Form::text('', 0, ['class' => 'form-control inputmask', 'required' => 'required', 'readonly' => 'readonly', 'data-optionmask' => json_encode(config('local.number.currency'))]) !!}</th>
        </tr>
    </tfoot>
</table>


@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('#table-account-line tbody').trigger('change')
        })
        function updateSummaryBalance(_elm){
            const _form = $(_elm).closest('form')
            const _table = $(_elm).closest('table')
            let _debit = 0, _credit = 0, _unmaskedvalue, _option
            $(_elm).find('input[name="account_move_line[debit][]"]').each(function(){
                _option = $(this).data('optionmask') || {}
                _unmaskedvalue = $(this).inputmask('unmaskedvalue')  || '0'
                if (_option.radixPoint === ',') {
                    _unmaskedvalue = _unmaskedvalue.replace(',', '.')
                }
                _debit += parseFloat(_unmaskedvalue)
            })

            _table.find('tfoot th.debit input').val(Inputmask.format( _debit,{alias:'numeric', 'digit': 2, 'autoGroup': true, 'groupSeparator': '.', 'radixPoint' : ','}))
            _table.find('tfoot th.debit input').trigger('change')

            $(_elm).find('input[name="account_move_line[credit][]"]').each(function(){
                _option = $(this).data('optionmask') || {}
                _unmaskedvalue = $(this).inputmask('unmaskedvalue') || '0'
                if (_option.radixPoint === ',') {
                    _unmaskedvalue = _unmaskedvalue.replace(',', '.')
                }
                _credit += parseFloat(_unmaskedvalue)
            })
            
            _table.find('tfoot th.credit input').val(Inputmask.format( _credit,{alias:'numeric', 'digit': 2, 'autoGroup': true, 'groupSeparator': '.', 'radixPoint' : ','}))
            _table.find('tfoot th.credit input').trigger('change')

            _form.find('input:submit').fadeOut()
            if(_debit > 0){
                if(_debit == _credit){
                    _form.find('input:submit').fadeIn()                    
                }
            }            
        }
    </script>
@endpush