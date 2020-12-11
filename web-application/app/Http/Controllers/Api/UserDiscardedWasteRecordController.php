<?php

namespace App\Http\Controllers\Api;

use App\Models\DiscardedWasteRecord;
use App\Models\User;
use App\Models\Product;
use App\Models\TrashCan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Str;
use App\Http\Resources\DiscardedWasteRecordResource;

class UserDiscardedWasteRecordController extends Controller
{
    public function store(Request $request, string $nfc)
    {
        $trashCanUUID = $request->header('X-TrashCan-UUID');

        $validated = $request->validate([
            'barcode' => 'required|string',
        ]);

        $product = Product::where('barcode', $request->barcode)->first();

        Log::info('product not found', $product);
        abort_unless($product, 404);

        $user = User::where('nfc_uid', $nfc)->first();

        Log::info('user not found', $user);
        abort_unless($user, 404);

        $trashCan = TrashCan::where('uuid', $trashCanUUID)->first();

        Log::info('trash can not found', $trashCan);
        abort_unless($trashCan, 404);

        $discardedWasteRecord = DiscardedWasteRecord::create(
            [
                    'uuid' => Str::uuid(),
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'trash_can_id' => $trashCan->id,
                ]
        );

        if (!empty($product->deposit_amount)) {
            $user->balance += $product->deposit_amount;
        }

        $user->save();


        return new DiscardedWasteRecordResource($discardedWasteRecord);
    }
}
