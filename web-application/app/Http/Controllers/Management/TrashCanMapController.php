<?php

namespace App\Http\Controllers\Management;

use App\Models\TrashCan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashCanMapController extends Controller
{
    public function index()
    {
        $trashCans = TrashCan::all();

        return view('management.trashcans-map.index', [
            'trashCans' => $trashCans,
        ]);
    }
}
