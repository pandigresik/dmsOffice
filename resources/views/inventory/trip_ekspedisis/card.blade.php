<div class="col-md-6">
<div class="card card-accent-info">
    <div class="card-header">Trip
        <div class="card-header-actions">
            
            @if ($dataCard['stateForm'] == 'update')                        
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'tripEkspedisis[{{ $dataCard['iInternalId'] }}][stateForm]\' value=\'delete\' >');return false">
                <i class="fa fa-trash"></i>
            </a>
            @elseif ($dataCard['stateForm'] == 'insert')
            <a class="card-header-action btn-close" href="#" onclick="$(this).closest('div.card').remove();return false">
                <i class="fa fa-trash"></i>
            </a>    
            @else
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'tripEkspedisis[{{ $dataCard['iInternalId'] }}][stateForm]\' value=\'delete\' >');return false">
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
                <div>Harga - {{ $dataCard['price'] ?? '{tripPrice}' }}</div>
                <div>Biaya Tambahan - {{ $dataCard['destination_additional_price'] ?? '{tripAdditionalPrice}' }}</div>
                <div>Jumlah - {{ $dataCard['quantity'] ?? '{tripQuantity}' }}</div>
                <div>Jenis - {{ $dataCard['productCategories']['name'] ?? '{tripProductCategories}' }}</div>                
            </div>
            <div class="form-hidden collapse">{tripForm}</div>
        </div>
    </div>
</div>
</div>