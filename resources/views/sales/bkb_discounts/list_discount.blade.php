@forelse ($datas as $_discountId => $data)
    <div class="card">
        <div class="card-header text-center">
            <h4>Program  {{ $discountMaster[$_discountId]->name }}<br> Depo {{ $depo->szName }}</h4>
        </div>
        <div class="card-body">
        @include('sales.bkb_discounts.list_discount_program',['discounts' => $data])
        </div>
    </div>
@empty
    
@endforelse