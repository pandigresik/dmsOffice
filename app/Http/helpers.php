<?php

use Jenssegers\Date\Date;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;

if (!function_exists('localFormatDate')) {
    function localFormatDate($value)
    {
        return Date::parse($value)->format(config('app.date_format'));
    }
}

if (!function_exists('createLocalFormatDate')) {
    function createLocalFormatDate($value)
    {
        return Date::createFromFormat(config('app.date_format'), $value);
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
            list($key, $val) = explode(',',$keyPair);
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
            list($key, $val) = explode(',',$keyPair);
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
