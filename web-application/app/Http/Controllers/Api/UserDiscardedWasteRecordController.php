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
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserDiscardedWasteRecordController extends Controller
{
    public function store(Request $request, string $nfc)
    {
        $validated = $request->validate([
            'barcode' => 'required|string',
        ]);

        $user = User::where('nfc_uid', $nfc)->first();
        $product = Product::where('barcode', $request->barcode)->first();
        $trashCanUUID = $request->header('X-TrashCan-UUID');
        $trashCan = TrashCan::where('uuid', $trashCanUUID)->first();

        if ($user === null || $product === null || $trashCan === null) {
            throw new ModelNotFoundException();
        }

        $discardedWasteRecord = DiscardedWasteRecord::create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'product_id' => $product->id,
            'trash_can_id' => $trashCan->id,
        ]);

        if (!empty($product->deposit_amount)) {
            $user->balance += $product->deposit_amount;
            $user->save();
        }

        return new DiscardedWasteRecordResource($discardedWasteRecord);
    }
}
