@forelse ($datas as $_salesId => $data)
    <div class="card">
        <div class="card-header text-center">
            <h4>Sales {{ $salesMaster[$_salesId]->szName ?? 'not found' }} <br> Periode {{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</h4>
        </div>
        <div class="card-body">
        @include('sales.discount_reject.list_discount_program',['discounts' => $data])
        </div>
    </div>
@empty
    Data tidak ditemukan
@endforelse