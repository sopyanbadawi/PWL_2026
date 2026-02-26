<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return 'Nama: Ahmad Sofyan Badawi' . '<br>' . 'NIM: 244107020073';
    }
}
