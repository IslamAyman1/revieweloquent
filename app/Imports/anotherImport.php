<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;

class anotherImport implements ToArray , WithHeadingRow , WithMapping
{
   
    public function array(array $rows)
    {
        foreach ($rows as $row) { // Loop through each row
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => bcrypt($row['password']),
            ]);
        }
    }
    public function map($row): array
    {
        return [
            $row['name'],
            $row['email'],
            $row['password'],
        ];
    }   
}
