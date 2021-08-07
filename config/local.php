<?php

return [
    'number' => [
        'integer' => ['alias' => 'numeric', 'digits' => 0, 'groupSeparator' => '.', 'radixPoint' => ',','autoGroup' => true],
        'decimal' => ['alias' => 'numeric', 'digits' => 0, 'groupSeparator' => '.', 'radixPoint' => ',','autoGroup' => true],
        'currency' => ['alias' => 'currency', 'prefix' => 'Rp. ', 'groupSeparator' => '.', 'radixPoint' => ',','autoUnmask' => true]
    ],
    'select2' => [
        'ajax' => ['data-ajax' => 1],
        'tag' => ['tags' => true, 'multiple' => true, 'tokenSeparators' => [',']]        
    ],
    'daterange' => ['singleDatePicker' => false, 'locale' => [ 'format' => 'DD MMM YYYY' ],],
    'time' => ['locale' => [ 'format' => 'HH:mm' ]],
    'date_format' => 'd M Y',
    'datetime_format' => 'd M Y H:i:s',
    'date_format_javascript' => 'DD MMM YYYY',
    'datetime_format_javascript' => 'DD MMM YYYY HH:mm:ss',
];
