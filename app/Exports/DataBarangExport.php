<?php

namespace App\Exports;

use App\Models\data_barang_now;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataBarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return data_barang_now::all();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'No',
            'tanggal_perolehan',
            'asset',
            'kode_fa_fams',
            'nama_barang',
            'outlet_pencatatan',
            'outlet_actual',
            'type_barang',
            'location',
            'jabatan',
            'nama_user',
            'nik',
            'komputer_nama',
            'ip_address',
            'kondisi',
            'keterangan',
            'serial_number',
            'sophos',
            'landesk',
            'capex_or_selisih',
            'created_at',
            'updated_at',
            'area_user	'
        ];



    }

}
