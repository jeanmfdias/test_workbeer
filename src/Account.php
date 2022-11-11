<?php

namespace Jean\TestWorkbeer;

class Account 
{
    public $account;

    public static function create($array)
    {
        $account = [
            'name' => $array['first_name'],
            'amount' => $array['amount']
        ];
        return $account;
    }

    public static function withdraw($array, $withdraw)
    {
        $account = [
            'name' => $array['first_name'],
            'amount' => $array['amount']
        ];

        if ($withdraw > $account['amount']) {
            return $account;
        }

        $account['amount'] -= $withdraw;

        return $account;
    }

    public static function deposit($array, $deposit)
    {
        $account = [
            'name' => $array['first_name'],
            'amount' => $array['amount']
        ];

        if ($deposit < 0) {
            return $account;
        }

        $account['amount'] += $deposit;

        return $account;
    }
}