<div class="col-md-6">
<div class="card card-accent-info">
    <div class="card-header">Contact
        <div class="card-header-actions">
            
            @if ($dataCard['stateForm'] == 'update')            
            <a class="card-header-action button-caller" href="#" data-json="[]" data-url="{{route('base.vendorsContacts.edit', $dataCard['id']) }}" onclick="main.setButtonCaller(this);main.popupModal(this,'get');return false">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'vendorContact[{{ $dataCard['id'] }}][stateForm]\' value=\'delete\' >');return false">
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
                <div>{{ $dataCard['name'] ?? '{contactName}' }}</div>
                <div>{{ $dataCard['position'] ?? '{contactPosition}' }}</div>
                <div>{{ $dataCard['mobile'] ?? '{contactMobile}' }}</div>
                <div class="row">
                    <div class="col-md-3">TOP</div>
                    <div class="col-md-9">{contactTop}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Penagihan</div>
                    <div class="col-md-9">{contactInvoice}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">Program</div>
                    <div class="col-md-9">{contactProgram}</div>
                </div>
            </div>
            <div class="form-hidden collapse">{contactForm}</div>
        </div>
    </div>
</div>
</div>