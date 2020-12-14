<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\TrashCan;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(25);

        return view('management.customer.index', [
            'customers' => $customers,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longtitude' => 'required|numeric',
            'zoom' => 'required|integer',
        ]);

        $customer = Customer::create(
            array_merge(
                $validated,
                [
                    'uuid' => Str::uuid(),
                ]
            )
        );

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Succesvol klant aangemaakt!');

        return redirect()->route('management.customer.show', ['uuid' => $customer->uuid]);
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

    public function create()
    {
        return view('management.customer.create');
    }

    public function update(Request $request, string $uuid)
    {
        $customer = Customer::where('uuid', $uuid)->first();

        abort_unless($customer, 404);

        $validated = $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longtitude' => 'required|numeric',
            'zoom' => 'required|integer',
        ]);

        $customer->update($validated);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Succesvol klant bijgewerkt!');

        return redirect()->back();
    }
}
