<?php

namespace App\Http\Controllers\Management;

use App\Models\TrashCan;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashCanCustomerController extends Controller
{
    public function update(Request $request, string $uuid)
    {
        $trashCan = TrashCan::where('uuid', $uuid)->first();

        abort_unless($trashCan, 404);

        $validated = $request->validate([
            'customer_uuid' => 'required|string',
        ]);

        $customer = Customer::where('uuid', $request->customer_uuid)->first();

        $trashCan->customer()->associate($customer);
        $trashCan->save();

        return redirect()->back();
    }
}
