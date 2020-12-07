<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use BenSampo\Enum\Rules\EnumValue;
use App\Enums\SeperationTray;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);

        return view('management.product.index', [
            'products' => $products,
        ]);
    }

    public function show(string $uuid)
    {
        // $product = Product::with('customer')->where('uuid', $uuid)->first();
        $product = Product::where('uuid', $uuid)->first();

        abort_unless($product, 404);

        return view('management.product.show', [
            'product' => $product,
        ]);
    }

    public function edit(string $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        abort_unless($product, 404);

        // $customers = Customer::all();

        return view('management.product.edit', [
            'product' => $product,
            // 'customers' => $customers,
        ]);
    }

    public function update(Request $request, string $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        abort_unless($product, 404);

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'seperation_tray' => ['required', new EnumValue(SeperationTray::class, false)],
            'information' => ['required', 'string'],
            'deposit_amount' => ['required', 'integer'],
        ]);

        unset($validated['barcode']);

        $product->update($validated);

        return redirect()->back();
    }

    public function create()
    {
        return view('management.product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'barcode' => ['required', 'string', 'unique:products'],
            'seperation_tray' => ['required', new EnumValue(SeperationTray::class, false)],
            'information' => ['required', 'string'],
            'deposit_amount' => ['required', 'integer'],
        ]);

        $product = Product::create(
            array_merge(
                $validated,
                [
                    'uuid' => Str::uuid(),
                ]
            )
        );

        return redirect()->route('management.product.show', ['uuid' => $product->uuid]);
    }

    /**
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, string $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        abort_unless($product, 404);

        $product->delete();

        $request->session()->flash('message', 'Succesvol product verwijderd!');

        return redirect()->route('management.product.index');
    }
}
