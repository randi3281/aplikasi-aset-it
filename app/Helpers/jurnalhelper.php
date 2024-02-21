<?php

namespace App\Helpers;
use App\Models\user_manajemen;

class jurnalhelper
{
    public static function cekkukis($kukis)
    {
        $usernya = user_manajemen::where('kukis', $kukis)->first();
        if ($usernya) {
            return true;
        } else {
            return false;
        }

    }

    public static function buatkukis($usernya)
    {
        do {
            $kukis = md5(uniqid(rand(), true));
        } while (user_manajemen::where('kukis', $kukis)->exists());

        $usernya->kukis = $kukis;
        $usernya->save();

        setcookie('kukis', $kukis, time() + 60 * 60 * 24, '/');
        setcookie('posisi', $usernya->posisi, time() + 60 * 60 * 24, '/');

    }

    public static function hapuskukis($usernya)
    {
        $usernya->kukis = null;
        $usernya->save();

        setcookie('kukis', '', time() - 3600, '/');
        setcookie('posisi', '', time() - 3600, '/');
    }
}
