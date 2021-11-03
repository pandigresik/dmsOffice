<div class="card card-accent-info col-md-6">
    <div class="card-header">Trip
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="#">
                <i class="fa fa-gear"></i>
            </a>
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
                <div>{{ $dataCard['code'] ?? '{tripCode}' }}</div>
                <div>{{ $dataCard['name'] ?? '{tripName}' }}</div>                
                <div>{{ $dataCard['distance'] ?? '{tripDistance}' }}</div>                
                <div>{{ $dataCard['price'] ?? '{tripPrice}' }}</div>                
            </div>
            <div class="form-hidden collapse">{tripForm}</div>
        </div>
    </div>
</div>