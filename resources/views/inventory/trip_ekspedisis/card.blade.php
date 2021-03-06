<div class="col-md-6">
<div class="card card-accent-info">
    <div class="card-header">Trip
        <div class="card-header-actions">            
            @if ($dataCard['stateForm'] == 'update')
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'tripEkspedisis[{{ $dataCard['id'] }}][stateForm]\' value=\'delete\' >');return false">
                <i class="fa fa-trash"></i>
            </a>
            @elseif ($dataCard['stateForm'] == 'insert')
            <a class="card-header-action btn-close" href="#" onclick="$(this).closest('div.card').remove();return false">
                <i class="fa fa-trash"></i>
            </a>    
            @else
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'tripEkspedisis[{{ $dataCard['id'] }}][stateForm]\' value=\'delete\' >');return false">
                <i class="fa fa-trash"></i>
            </a>
            @endif
        </div>
    </div>
    <div class="show">
        <div class="card-body">
            <div class="card-content">
                <div>Code - {{ $dataCard['code'] ?? '{tripCode}' }}</div>
                <div>Nama - {{ $dataCard['name'] ?? '{tripName}' }}</div>                
                <div>Jarak - {{ $dataCard['distance'] ?? '{tripDistance}' }}</div>                                
                <div>Jumlah - {{ $dataCard['quantity'] ?? '{tripQuantity}' }}</div>
                <div>Jenis - {{ $dataCard['productCategories']['name'] ?? '{tripProductCategories}' }}</div>                                
                <hr>
                @if ($dataCard['stateForm'] != 'insert')
                <button class="pull-right btn" type="button" data-json="{}" data-url="{{ route('inventory.tripEkspedisis.edit',$dataCard['price_log_id']) }}" 
                    onclick='main.setButtonCaller(this);main.popupModal(this,"get")'>
                    <i class="fa fa-pencil"></i>
                </button>
                @endif
                <div class="block-price">
                    <div>Tarif - {{ $dataCard['price'] ?? '{tripPrice}' }}</div>
                    <div>Biaya Tambahan - {{ $dataCard['origin_additional_price'] ?? '{tripOriginPrice}' }}</div>
                    <div>Biaya Tambahan Bongkar - {{ $dataCard['destination_additional_price'] ?? '{tripAdditionalPrice}' }}</div>
                    <div>Mulai Berlaku - {{ $dataCard['start_date'] ?? '{tripStartDate}' }}</div>
                </div>
            </div>
            <div class="form-hidden collapse">{tripForm}</div>
        </div>
    </div>
</div>
</div>