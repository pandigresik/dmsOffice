<div class="card card-accent-info">
    <div class="card-header">Contact
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="#">
                <i class="fa fa-gear"></i>
            </a>
            @if ($stateForm == 'update')
            <a class="card-header-action" href="#">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="card-header-action btn-close" href="#" onclick="$(this).closest('div.card').fadeIn();return false">
                <i class="fa fa-trash"></i>
            </a>
            @endif
            @if ($stateForm == 'insert')                            
            <a class="card-header-action btn-close" href="#" onclick="$(this).closest('div.card').remove();return false">
                <i class="fa fa-trash"></i>
            </a>    
            @endif
            
        </div>
    </div>
    <div class="show">
        <div class="card-body">
            <div class="card-content">
                <div>{contactName}</div>
                <div>{contactPosition}</div>
                <div>{contactMobile}</div>
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