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
            @forelse ($data as $tgl => $perTgl)
                <tr style="background-color: #b7b3b3;font-weight:bold">
                    <td colspan="4">{{ localFormatDate($tgl) }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
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
                        @endforeach                        
                    @endforeach
                    @if ($_type == 'KM')
                        <tr>
                            <td colspan="3"></td>
                            <td>Penerimaan Hari Ini</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Penerimaan S/D Hari Ini</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Saldo Awal + Penerimaan</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>                            
                    @else
                        <tr>
                            <td colspan="3"></td>
                            <td>Pengeluaran Hari Ini</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Pengeluaran S/D Hari Ini</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Saldo Akhir Setelah Dikurangi BY</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>                        
                    @endif
                    
                @endforeach
            @empty
                <td>Data tidak ditemukan</td>
            @endforelse
        </tbody>
    </table>
</div>