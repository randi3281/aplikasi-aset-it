<?php

namespace App\Helpers;
use App\Models\user_manajemen;

class jurnalhelper
{
    public static function cekkukis($kukis)
    {
        return view('hy');
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

        $current_time = time();
        $current_time_gmt7 = time() + (7 * 3600);
        $current_time_formatted = date("H:i:s", $current_time_gmt7);
        $current_time_formatted_tanggal = date("d-m-Y", $current_time_gmt7);

        setcookie('current_time_formatted', $current_time_formatted, time() + 60 * 60 * 24, '/');
        setcookie('tanggal', $current_time_formatted_tanggal, time() + 60 * 60 * 24, '/');
        setcookie('kukis', $kukis, time() + 60 * 60 * 24, '/');
        setcookie('nama', $usernya->nama, time() + 60 * 60 * 24, '/');
        setcookie('nik', $usernya->nik, time() + 60 * 60 * 24, '/');
        setcookie('area', $usernya->area, time() + 60 * 60 * 24, '/');
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
