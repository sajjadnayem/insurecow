<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Exports\UserExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        // return UserResource::collection($user);
        return view('admin.pages.User.user', compact('user'));
    }
    public function exportIntoExcel()
    {
        return Excel::download(new UserExport(), 'userlist.xlsx');
    }
    public function exportIntoCsv()
    {
        return Excel::download(new UserExport(), 'userlist.CSV');
    }
    public function importForm()
    {
        return view('admin.pages.User.import-form');
    }
    public function import(Request $request)
    {
        Excel::import(new UserImport(), $request->file);
        return redirect()->back();
    }

}
