<?php


if (!function_exists('decodedData')) {
    function decodedData($request, $field, $type = false)
    {
        return is_array($request->$field) ? json_decode(json_encode($request->$field), $type) :
            json_decode($request->$field, $type);
    }
}

if (!function_exists('nullToString')) {
    function nullToString($value): ?string
    {
        return $value ?? '';
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date): string
    {
        if (nullToString($date) !== '')
            return \Carbon\Carbon::parse($date)->format(DATE_FORMAT);

        return '';
    }
}

if (!function_exists('chars')) {
    function chars(): array
    {
        return range('A', 'Z');
    }
}

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($mobileNo, $withPlusSign = true)
    {
        if (substr($mobileNo, 0, 1) == '0') {

            $mobileNo = ltrim($mobileNo, '0');

            if ($withPlusSign === true)
                $mobileNo = '+' . COUNTRY_CODE . $mobileNo;
            else
                $mobileNo = COUNTRY_CODE . $mobileNo;
        }

        return $mobileNo;
    }

}
