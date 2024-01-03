<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class BukuExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function query()
    {
        if (auth()->user()->isAdmin()) {
            return Buku::query();
        } else {
            return Buku::where('id_user', auth()->user()->id);
        }
    }
}
