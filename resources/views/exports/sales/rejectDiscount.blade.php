@forelse ($collection as $_salesId => $data)
    <div class="card">
        <div class="card-header text-center">
            <h4>Sales {{ $salesMaster[$_salesId]->szName }} </h4>            
            <h4>Periode {{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</h4>
        </div>
        <div class="card-body">
        @include('exports.sales.rejectDiscountSales',['discounts' => $data])
        </div>
    </div>
@empty
    Data tidak ditemukan
@endforelse