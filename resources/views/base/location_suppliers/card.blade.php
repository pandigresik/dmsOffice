<div class="card card-accent-info col-md-6">
    <div class="card-header">Contact
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="#">
                <i class="fa fa-gear"></i>
            </a>
            @if ($dataCard['stateForm'] == 'update')            
            <a class="card-header-action button-caller" href="#" data-json="[]" data-url="{{route('base.locationSuppliers.edit', $dataCard['id']) }}" onclick="main.setButtonCaller(this);main.popupModal(this,'get');return false">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'locationSuppliers[{{ $dataCard['id'] }}][stateForm]\' value=\'delete\' >');return false">
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
                <div>{{ $dataCard['address'] ?? '{locationAddress}' }}</div>
                <div>{{ $dataCard['city'] ?? '{locationCity}' }}</div>
                
                <div class="row">
                    <div class="col-md-3">Jenis Trip</div>
                    <div class="col-md-9">{locationTrip}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Biaya Tambahan</div>
                    <div class="col-md-9">{{  $dataCard['additional_cost'] ?? '{locationAdditionalCost}' }}</div>
                </div>
            </div>
            <div class="form-hidden collapse">{locationForm}</div>
        </div>
    </div>
</div>