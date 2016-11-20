<?php

/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 2:56
 */
class labels
{
    static function getSelect($mass, $nameOf, $value)
    {
        $end = '<select name="' . $nameOf . '" id="' . $nameOf . '">
                            <option></option>';
        foreach ($mass as $str) {
            $name = $str['name'];
            $val = $str['value'];
            unset($str['name']);
            unset($str['value']);
            $data = '';
            if (count($str) > 0) { // data
                foreach ($str as $key => $v) {
                    $data .= 'data-' . $key . '="' . $v . '"';
                }
            }
            $selected = ($value == $val) ? 'selected' : '';
            $end .= '<option ' . $selected . ' value="' . $val . '" ' . $data . '>' . $name . '</option>';
        }
        $end .= '</select>';
        return $end;
    }

    static function getValue($arrayData,$value)
    {
        $end = '';
        foreach ($arrayData as $str) {
            if ($str['value'] == $value){
                $end = $str['name'];
            }
        }
        return $end;
    }

    static function getHidden($id, $name)
    {
        if (is_numeric($id)) {
            return '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $id . '">';
        }
        return '';
    }

    static function getDate($id, $value)
    {
        $d = DateTime::createFromFormat('Y-m-d', $value);
        $value = ($d && $d->format('Y-m-d') == $value) ? $value : '';
        return '<input type="date" name="' . $id . '" id="' . $id . '" value="' . $value . '">';
    }
}