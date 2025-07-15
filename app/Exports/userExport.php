<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;

class userExport implements FromArray
{
    public function array(): array
    {
        
        $list = [];
        $users = User::all();
        foreach($users as $user){
            $list[] = [     
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ];
        }
        return $list;
}
}