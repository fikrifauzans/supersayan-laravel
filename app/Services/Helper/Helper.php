<?php

namespace App\Services\Helper;

class Helper
{

    public static $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];


    public static function getRelations($query)
    {
        if (!empty($query && $query['relations'])) return explode(',', $query['relations']);

        else return [];
    }



    // Transform
    public static function T_DefaultRelation($val)
    {
        $val = explode('_', $val);
        $val = array_map(function ($v) {
            return ucfirst($v);
        }, $val);
        $val = array_merge($val);
        $val = join($val);
        return $val;
    }

    public static function T_getCurrentUrl($path, $back = 0)
    {
        $p =   explode('/', $path);
        $index = count($p) - 1;
        $index -= $back;
        return $p[$index];
    }

    public static function T_decodeRequest($request)
    {

        foreach ($request->all() as $key => $value) {
            $v = json_decode($request[$key], true);
            if ($v == !null)  $request[$key] = $v;
        }

        return $request;
    }

    public static function T_unsets($values, $fields = ['id'])
    {
        $unsets = [];
        foreach ($values as $key => $value) {
            foreach ($fields as $key => $k) {
                unset($value[$k]);
                array_push($unsets, $value);
            }
        }
        $values = $unsets;
        return $values;
    }

    public static function T_sets($values, $fields = [['key' => 'value']])
    {
        $sets = [];
        foreach ($values as $key => $value) {
            foreach ($fields as $key => $keyValue) {
                $value += [$key => $keyValue];
                array_push($sets, $value);
            }
        }
        $values = $sets;
        return $values;
    }

    public static function generateRandomString($length = 6)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
    public static function generateRandomNumber($min = 1000, $max = 9999)
    {
        return rand($min, $max);
    }
}
