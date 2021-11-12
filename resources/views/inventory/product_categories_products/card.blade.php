<div class="col-md-3">
<div class="card card-accent-info">
    <div class="card-header">Produk
        <div class="card-header-actions">
            
            @if ($dataCard['stateForm'] == 'update')            
            <a class="card-header-action btn-close" href="#" 
                onclick="$(this).closest('div.card').fadeOut();$(this).closest('div.card').find('.form-hidden').append('<input type=\'hidden\' name=\'productCategoriesProducts[{{ $dataCard['id'] }}][stateForm]\' value=\'delete\' >');return false">
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
                <div>{{ $dataCard['szId'] ?? '{productId}' }}</div>
                <div>{{ $dataCard['szName'] ?? '{productName}' }}</div>
                <div>{{ $dataCard['szUomId'] ?? '{productUom}' }}</div>                              
            </div>
            <div class="form-hidden collapse">{productForm}</div>
        </div>
    </div>
</div>
</div>