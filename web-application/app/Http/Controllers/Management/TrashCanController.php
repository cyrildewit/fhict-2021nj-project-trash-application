<?php

namespace App\Http\Controllers\Management;

use App\Models\TrashCan;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashCanController extends Controller
{
    public function index()
    {
        $trashCans = TrashCan::with('customer')->paginate(25);

        return view('management.trash-can.index', [
            'trashCans' => $trashCans,
        ]);
    }

    public function show(string $uuid)
    {
        $trashCan = TrashCan::with('customer')->where('uuid', $uuid)->first();

        abort_unless($trashCan, 404);

        return view('management.trash-can.show', [
            'trashCan' => $trashCan,
        ]);
    }

    public function edit(string $uuid)
    {
        $trashCan = TrashCan::where('uuid', $uuid)->first();

        abort_unless($trashCan, 404);

        $customers = Customer::all();

        return view('management.trash-can.edit', [
            'trashCan' => $trashCan,
            'customers' => $customers,
        ]);
    }

    public function update(Request $request, string $uuid)
    {
        $trashCan = TrashCan::where('uuid', $uuid)->first();

        abort_unless($trashCan, 404);

        $validated = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'latitude' => 'required|numeric',
            'longtitude' => 'required|numeric',
        ]);

        $trashCan->update($validated);

        return redirect()->back();
    }
}
