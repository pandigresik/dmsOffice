@php
    $saldoAkhir = $saldoAwal = [
        'kas_kecil' => 0,
        'kas_besar' => 0,
        'giro' => 0,
    ];
    
    $totalTerima = [
        'kas_kecil' => 0,
        'kas_besar' => 0,
        'giro' => 0,
    ];
    $totalKeluar = [
        'kas_kecil' => 0,
        'kas_besar' => 0,
        'giro' => 0,
    ];    
@endphp
<div class="table-responsive">
    <div class="text-center">
        <h3>Laporan Kas Harian</h3>
    </div>
    <caption>Periode {{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</caption>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No. Bukti</th>
                <th>No. Reff</th>                
                <th>Account</th>
                <th>Keterangan</th>
                <th>Kas Besar</th>
                <th>Kas Kecil</th>
                <th>Giro</th>
            </tr>
        </thead>
        <tbody>
            <tr style="font-weight:bold">
                <td colspan="4">Saldo Awal</td>
                <td class="text-right">{{ localNumberFormat($saldoAwal['kas_kecil'],0) }}</td>
                <td class="text-right">{{ localNumberFormat($saldoAwal['kas_besar'],0) }}</td>
                <td class="text-right">{{ localNumberFormat($saldoAwal['giro'],0) }}</td>
            </tr>
            @forelse ($data as $tgl => $perTgl)
                <tr style="background-color: #b7b3b3;font-weight:bold">
                    <td colspan="4">{{ localFormatDate($tgl) }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @php
                    $totalTerimaHarian = [
                        'kas_kecil' => 0,
                        'kas_besar' => 0,
                        'giro' => 0,
                    ];
                    $totalKeluarHarian = [
                        'kas_kecil' => 0,
                        'kas_besar' => 0,
                        'giro' => 0,
                    ];
                @endphp
                @foreach ($perTgl->groupBy('type') as $_type => $items)
                    @foreach ($items as $item)
                        @foreach ($item->transferCashBankDetails as $_item)
                            <tr>
                                <td>{{ $item->number }}</td>
                                <td>{{ $_item->reference }}</td>
                                <td>{{ $_item->account }}</td>
                                <td>{{ $_item->description }}</td>
                                <td class="text-right">
                                    @if ($item->type_account == 'kas_besar')
                                        {{ localNumberFormat($_item->amount,0) }}
                                    @endif 
                                </td>
                                <td class="text-right"> 
                                    @if ($item->type_account == 'kas_kecil')
                                        {{ localNumberFormat($_item->amount,0) }}
                                    @endif 
                                </td>
                                <td class="text-right"> 
                                    @if ($item->type_account == 'giro')
                                        {{ localNumberFormat($_item->amount,0) }}
                                    @endif 
                                </td>
                            </tr>
                            @php
                                if($_type == 'KM'){
                                    $totalTerimaHarian['kas_kecil'] += ($item->type_account == 'kas_kecil' ? $_item->amount : 0);
                                    $totalTerimaHarian['kas_besar'] += ($item->type_account == 'kas_besar' ? $_item->amount : 0);
                                    $totalTerimaHarian['giro'] += ($item->type_account == 'giro' ? $_item->amount : 0);
                                    
                                }else{
                                    $totalKeluarHarian['kas_kecil'] += ($item->type_account == 'kas_kecil' ? $_item->amount : 0);
                                    $totalKeluarHarian['kas_besar'] += ($item->type_account == 'kas_besar' ? $_item->amount : 0);
                                    $totalKeluarHarian['giro'] += ($item->type_account == 'giro' ? $_item->amount : 0);
                                }                                
                            @endphp
                        @endforeach                        
                    @endforeach
                    @php
                        if($_type == 'KM'){
                            $totalTerima['kas_kecil'] += $totalTerimaHarian['kas_kecil'];
                            $totalTerima['kas_besar'] += $totalTerimaHarian['kas_besar'];
                            $totalTerima['giro'] += $totalTerimaHarian['giro'];
                        }
                        if($_type == 'KK'){
                            $totalKeluar['kas_kecil'] += $totalKeluarHarian['kas_kecil'];
                            $totalKeluar['kas_besar'] += $totalKeluarHarian['kas_besar'];
                            $totalKeluar['giro'] += $totalKeluarHarian['giro'];
                        }
                        
                    @endphp
                    @if ($_type == 'KM')
                        <tr>
                            <td colspan="3"></td>
                            <td>Penerimaan Hari Ini</td>
                            <td class="text-right">{{ localNumberFormat($totalTerimaHarian['kas_besar'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($totalTerimaHarian['kas_kecil'], 0) }}</td>                            
                            <td class="text-right">{{ localNumberFormat($totalTerimaHarian['giro'], 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Penerimaan S/D Hari Ini</td>
                            <td class="text-right">{{ localNumberFormat($totalTerima['kas_besar'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($totalTerima['kas_kecil'], 0) }}</td>                            
                            <td class="text-right">{{ localNumberFormat($totalTerima['giro'], 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Saldo Awal + Penerimaan</td>
                            <td class="text-right">{{ localNumberFormat($saldoAwal['kas_besar'] + $totalTerima['kas_besar'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($saldoAwal['kas_kecil'] + $totalTerima['kas_kecil'], 0) }}</td>                            
                            <td class="text-right">{{ localNumberFormat($saldoAwal['giro'] + $totalTerima['giro'], 0) }}</td>
                        </tr>                            
                    @else
                        <tr>
                            <td colspan="3"></td>
                            <td>Pengeluaran Hari Ini</td>
                            <td class="text-right">{{ localNumberFormat($totalKeluarHarian['kas_besar'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($totalKeluarHarian['kas_kecil'], 0) }}</td>                            
                            <td class="text-right">{{ localNumberFormat($totalKeluarHarian['giro'], 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Pengeluaran S/D Hari Ini</td>
                            <td class="text-right">{{ localNumberFormat($totalKeluar['kas_besar'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($totalKeluar['kas_kecil'], 0) }}</td>                            
                            <td class="text-right">{{ localNumberFormat($totalKeluar['giro'], 0) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Saldo Akhir Setelah Dikurangi BY</td>                            
                            <td class="text-right">{{ localNumberFormat($saldoAwal['kas_besar'] + $totalTerima['kas_besar'] - $totalKeluar['kas_besar'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($saldoAwal['kas_kecil'] + $totalTerima['kas_kecil'] - $totalKeluar['kas_kecil'], 0) }}</td>
                            <td class="text-right">{{ localNumberFormat($saldoAwal['giro'] + $totalTerima['giro'] - $totalKeluar['giro'], 0) }}</td>
                        </tr>                        
                    @endif
                    
                @endforeach
            @empty
                <td>Data tidak ditemukan</td>
            @endforelse
        </tbody>
    </table>
</div>