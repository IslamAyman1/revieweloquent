<?php

namespace App\Http\Controllers;

use App\Exports\userExport;
use App\Imports\anotherImport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class exportExcelController extends Controller
{
    public function exportExcel(){
         return Excel::download(new userExport(), 'export1.xlsx');
    }
    public function importExcel(){ 
         Excel::import(new anotherImport, request()->file('file')->store('file'));
         return "file is saved successfully";
        }
}
