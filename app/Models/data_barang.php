<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_barang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';
    protected $fillable = [
        'no_fa_sap',
        'no_fa_fams',
        'capitalized_on',
        'asset_description',
        'acquis_val',
        'accum_dep',
        'book_val',
        'currency',
        'cost_center',
        'location',
        'deactivation_on',
        'location_sap',
    ];

}
