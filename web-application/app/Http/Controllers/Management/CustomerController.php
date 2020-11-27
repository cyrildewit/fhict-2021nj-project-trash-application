<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\TrashCan;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(25);

        return view('management.customer.index', [
            'customers' => $customers,
        ]);
    }

    public function show(string $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->first();

        abort_unless($customer, 404);

        $allTrashCans = TrashCan::fromCustomer($customer)->get();
        $trashCans = TrashCan::fromCustomer($customer)->paginate(15);

        return view('management.customer.show', [
            'customer' => $customer,
            'allTrashCans' => $allTrashCans,
            'trashCans' => $trashCans,
        ]);
    }

    public function edit(string $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->first();

        abort_unless($customer, 404);

        return view('management.customer.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, string $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->first();

        abort_unless($customer, 404);

        $validated = $request->validate([
            'name' => 'required|string',
            // 'location' => 'required|string',
            // 'latitude' => 'required|numeric',
            // 'longtitude' => 'required|numeric',
        ]);

        $customer->update($validated);

        return redirect()->back();
    }
}
