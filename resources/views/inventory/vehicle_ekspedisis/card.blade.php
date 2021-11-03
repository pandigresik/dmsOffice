<div class="card card-accent-info">
    <div class="card-header">Vehicle
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="#">
                <i class="fa fa-gear"></i>
            </a>
            @if ($dataCard['stateForm'] == 'update')            
            <a class="card-header-action button-caller" href="#" data-json="[]" data-url="{{route('inventory.vehicleEkspedisis.edit', $dataCard['id']) }}" onclick="main.setButtonCaller(this);main.popupModal(this,'get');return false">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'vehicleEkspedisis[{{ $dataCard['id'] }}][stateForm]\' value=\'delete\' >');return false">
                <i class="fa fa-trash"></i>
            </a>
            @endif
            @if ($dataCard['stateForm'] == 'insert')                            
            <a class="card-header-action btn-close" href="#" onclick="$(this).closest('div.card').remove();return false">
                <i class="fa fa-trash"></i>
            </a>    
            @endif
            
        </div>
    </div>
    <div class="show">
        <div class="card-body">
            <div class="card-content">
                <div>{{ $dataCard['name'] ?? '{vehicleName}' }}</div>
                <div>{{ $dataCard['position'] ?? '{vehiclePosition}' }}</div>
                <div>{{ $dataCard['mobile'] ?? '{vehicleMobile}' }}</div>                
            </div>
            <div class="form-hidden collapse">{vehicleForm}</div>
        </div>
    </div>
</div>