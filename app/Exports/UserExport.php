<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name', 'email', 'address')->get();
    }
    public function headings(): array
    {
        return [
            "ID",
            "Name",
            "Email",
            "Address"
        ];
    }
}
