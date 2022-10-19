<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserImport implements ToModel, WithHeadingRow, WithHeadings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id' =>$row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
            'password' => bcrypt($row['password'])
        ]);
    }
    public function headings():array
    {
        return [
            "Name",
            "Email",
            "Address",
            "Password"
        ];
    }
}
