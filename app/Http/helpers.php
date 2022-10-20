<?php

use Jenssegers\Date\Date;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;
use PhpOffice\PhpSpreadsheet\Shared\Date as SharedDateHelper;

if (!function_exists('localFormatDate')) {
    function localFormatDate($value)
    {
        return Date::parse($value)->format(config('local.date_format'));
    }
}

if (!function_exists('localFormatDateTime')) {
    function localFormatDateTime($value)
    {
        return Date::parse($value)->format(config('local.datetime_format'));
    }
}

if (!function_exists('createLocalFormatDate')) {
    function createLocalFormatDate($value)
    {
        return Date::createFromFormat(config('local.date_format'), $value);
    }
}

if (!function_exists('localNumberFormat')) {
    function localNumberFormat($value, $digitDecimal = null)
    {
        if (null === $digitDecimal) {
            $digitDecimal = config('local.digit_decimal');
        }

        return number_format($value, $digitDecimal, config('local.decimal_separator'), config('local.thousand_separator'));
    }
}

if (!function_exists('localNumberAccountingFormat')) {
    function localNumberAccountingFormat($value, $digitDecimal = null)
    {
        if (null === $digitDecimal) {
            $digitDecimal = config('local.digit_decimal');
        }

        if ($value < 0) {
            $result = '( '.number_format($value * -1, $digitDecimal, config('local.decimal_separator'), config('local.thousand_separator')).' )';
        } else {
            $result = number_format($value, $digitDecimal, config('local.decimal_separator'), config('local.thousand_separator'));
        }

        return $result;
    }
}

// ['width:9000','height:7000'] to ['width' => 9000,'height' => 7000]
if (!function_exists('convertStringArray')) {
    function convertStringArray($values, $separator = ':')
    {
        $result = [];
        foreach ($values as $value) {
            list($key, $val) = explode($separator, $value);
            $result[trim($key)] = trim($val);
        }

        return $result;
    }
}
// convert ['width' => 9000,'height' => 7000] to ['width:9000','height:7000' ]
if (!function_exists('convertArrayStringPair')) {
    function convertArrayStringPair($values, $separator = ':')
    {
        $result = [];
        array_walk($values, function ($item, $key) use ($separator, &$result) { $result[] = $key.$separator.$item; });

        return $result;
    }
}

if (!function_exists('convertArrayPairValue')) {
    function convertArrayPairValue($values, $keyPair = 'text,value')
    {
        $result = [];
        foreach ($values as $value) {
            list($key, $val) = explode(',', $keyPair);
            array_push($result, [$key => $value, $val => $value]);
        }

        return $result;
    }
}

if (!function_exists('convertArrayPairValueWithKey')) {
    function convertArrayPairValueWithKey($values, $keyPair = 'text,value')
    {
        $result = [];
        foreach ($values as $k => $value) {
            list($key, $val) = explode(',', $keyPair);
            array_push($result, [$key => $value, $val => $k]);
        }

        return $result;
    }
}

if (!function_exists('generateMenu')) {
    function generateMenu(array $tree)
    {
        return \Menu::build($tree, function ($menu, $item) {
            if (!$item->children->isEmpty()) {
                $header = Link::to('#', '<i class="'.$item->icon.'"></i>
                                        &nbsp;<span>'.$item->name ?? 'header'.'</span>')->addClass('c-sidebar-nav-dropdown-toggle');
                $menu->submenu($header, generateMenu($item->children->all())->addClass('c-sidebar-nav-dropdown-items')->addParentClass('c-sidebar-nav-dropdown'));
            } else {
                $menu->addIfCan($item->permissions->pluck('name'), Html::raw('<a class="c-sidebar-nav-link" href="'.$item->route.'">                
                                        <i class="'.$item->icon.'"></i>
                                        &nbsp;<span>'.$item->name.'</span>
                                    </a>')->addParentClass('nav-item'));
            }
        });
    }
}

if (!function_exists('phpDate')) {
    function phpDate($dateValue)
    {
        $PHPDateObject = SharedDateHelper::excelToDateTimeObject($dateValue);
        return $PHPDateObject->format('Y-m-d');
    }
}