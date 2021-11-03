<li class="list-group-item">
    {!! Form::checkbox('tables[]', $item, true, ['readonly' => 'readonly', 'onclick' => '$(this).prop(\'checked\',1)']) !!}
    {{ $item }}
</li>