<?php

namespace App\Http\Controllers\Api;

use App\Models\DiscardedWasteRecord;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\DiscardedWasteRecordResource;

class UserDiscardedWasteRecordController extends Controller
{
    public function store(Request $request, string $nfc)
    {
        $validated = $request->validate([
            'product_id' => 'required|string',
        ]);

        $product = Product::find($request->product_id);

        abort_unless($product, 404);

        $user = User::where('nfc_uid', $nfc)->first();

        abort_unless($user, 404);

        $discardedWasteRecord = DiscardedWasteRecord::create(
            array_merge(
                $validated,
                [
                    'uuid' => Str::uuid(),
                    'user_id' => $user->id,
                ]
            )
        );

        if (!empty($product->deposit_amount)) {
            $user->balance += $product->deposit_amount;
        }

        $user->save();


        return new DiscardedWasteRecordResource($discardedWasteRecord);
    }
}
