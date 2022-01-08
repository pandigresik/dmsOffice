<table>
    <tr>
        <th>REKAPITULASI PROGRAM</th>
    </tr>
</table>
@foreach ($collection as $idPromo => $data)
    <table>
        <tbody>
            <tr>
                <td>Periode Penjualan</td>
                <td>{{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</td>                
            </tr>
            <tr>
                <td>Nama Program</td>
                <td>{{ $discountMaster[$idPromo]->name ?? '-' }}</td>                
            </tr>
        </tbody>
    </table>
    @include('exports.sales.rekapDiscountPromo',['data' => $data])
    <br>
    <br>
    @include('exports.sales.rekapDiscountDepo',['data' => $data->groupBy('szBranchId'), 'depo' => $depoMaster])
@endforeach