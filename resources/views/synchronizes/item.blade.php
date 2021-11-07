<li class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 align-items-baseline">
        <div class="p-1">
            {!! Form::checkbox('tables[]', $item, true, ['readonly' => 'readonly', 'onclick' => '$(this).prop(\'checked\',1)']) !!}    
        </div>
        <div class="p-1 w-50">
            {{ $item }}    
        </div>    
        <div class="w-100">
            <div class="progress">
                <div id="progress_{{ $item }}" class="progress-bar" role="progressbar" style="width: 2%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>
    </div>
    
</li>