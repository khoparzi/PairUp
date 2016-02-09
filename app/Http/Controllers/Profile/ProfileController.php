<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function editFirstPage()
    {
        return view('edit-profile');
    }
}
