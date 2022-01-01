@forelse ($datas as $_discountId => $data)
    <div class="card w-100">
        <div class="card-header text-center">
            <h4>Program  {{ $discountMaster[$_discountId]->name }} <br> Periode {{ localFormatDate($startDate) }} sd {{ localFormatDate($endDate) }}</h4>
        </div>
        <div class="card-body">
        @include('sales.bkb_discounts.list_discount_program_rekap',['discounts' => $data])
        </div>
    </div>
@empty
    Data tidak ditemukan
@endforelse