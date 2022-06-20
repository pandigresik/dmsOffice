@php
    $totalHeader = [];
    $totalBaris = [];    
@endphp
<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th>TGL</th>
            @foreach ($header as $key => $item)
                @php
                    $totalHeader[$key] = 0;
                @endphp
                <th>{{ $key }}</th>
            @endforeach
            @foreach ($listBank as $bank)
                <th>{{ $bank }}</th>
            @endforeach
            <th>TOTAL SET BANK</th>
            <th>SELISIH</th>
            <th>KETERANGAN</th>
        </tr>        
    </thead>
    <tbody>                        
        @foreach($data as $tgl => $groupTgl)
        @php
            $totalDepositBank = 0;            
            $depositTgl = $bankDeposit[$tgl] ?? [];  
            $accountDeposit = [];
            $descriptionTgl = $descriptionMoneyCheck[$tgl]->description ?? '';
            if($depositTgl){
                $accountDeposit = $depositTgl->keyBy('account_id');                        
                $totalDepositBank = $depositTgl->sum('amount');                
            }                              
        @endphp
        <tr>
            <td>{{ localFormatDate($tgl) }}</td>
            @foreach ($header as $key => $item)
                @php
                    switch ($key) {
                        case 'BIAYA OPRSL':
                            $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit') + $groupTgl->whereIn('account_id', $item)->sum('debit');
                            break;
                        // case 'BANK DIREKSI':
                        //     $totalItem = $groupTgl->whereIn('account_id', $item)->sum('debit');
                        //     break;
                        // case 'SETORAN  LIVIA/SEJATI55':
                        //     $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit');
                        //     break;
                        default:
                            $totalItem = $groupTgl->whereIn('account_id', $item)->sum('credit') - $groupTgl->whereIn('account_id', $item)->sum('debit');
                    }                    
                    
                    $totalHeader[$key] += $totalItem;
                    
                    if($key == 'JML YG HARUS DISETOR'){                        
                        $totalItem = $totalBaris['PENJUALAN'] + $totalBaris['PELUNASAN PIUTANG'] + $totalBaris['EMBALASI'] + $totalBaris['TITIPAN TUNAI'] + $totalBaris['PENDAPATAN LAIN2'] - $totalBaris['BIAYA OPRSL'];                        
                    }
                    
                    $totalBaris[$key] = $totalItem;

                @endphp                
                <td class="text-right {{ $key == 'JML YG HARUS DISETOR' ? 'total_setoran': ''}}" data-item='{{ $totalItem }}'>{{ localNumberFormat($totalItem, 0) }}</td>
            @endforeach
            @php
                // $totalBank = $totalBaris['BANK DIREKSI'] + $totalBaris['SETORAN  LIVIA/SEJATI55'];                
                $selisih = $totalBaris['JML YG HARUS DISETOR'] - $totalDepositBank;
            @endphp
            @foreach ($listBank as $codeBank => $bank)
                @php                
                    $amountDeposit = 0;
                    if(isset($accountDeposit[$codeBank])){
                        $amountDeposit = $accountDeposit[$codeBank]->amount;
                    }
                @endphp
                <td class="bank_manual" style="min-width:250px">                    
                    <div class="input-group">
                        {!! Form::text('amount', localNumberFormat($amountDeposit, 0), ['class' => 'inputmask form-control', 'size' => 13,'data-account_id' => $codeBank, 'data-transaction_date' => $tgl, 'data-branch_id' => $branch,  'data-unmask' => 1, 'data-optionmask' => json_encode(config('local.number.integer')), 'onchange' =>"updateTotalSetoran(this)"] ) !!}
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-save"></i></span>
                        </div>                        
                    </div>                    
                </td>
            @endforeach
            <td class="text-right total">{{ localNumberFormat($totalDepositBank, 0) }}</td>
            <td class="text-right selisih">{{ localNumberAccountingFormat($selisih, 0) }}</td>
            <td  style="min-width:200px">
                <div class="input-group">
                    {!! Form::textarea('description', $descriptionTgl,['class' => 'form-control', 'rows' => 3, 'data-transaction_date' => $tgl, 'data-branch_id' => $branch, 'onchange' => 'updateDescription(this)']) !!}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-save"></i></span>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            @foreach ($header as $key => $item)                
                <th class="text-right">{{ localNumberFormat($totalHeader[$key], 0) }}</th>
            @endforeach
            <th colspan="6"></th>
        </tr>
    </tfoot>
</table>
