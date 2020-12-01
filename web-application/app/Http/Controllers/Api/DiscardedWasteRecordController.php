<?php

namespace App\Http\Controllers\Api;

use App\Models\DiscardedWasteRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\DiscardedWasteRecordResource;

class DiscardedWasteRecordController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string',
            'product_id' => 'required|string',
        ]);

        $discardedWasteRecord = DiscardedWasteRecord::create(
            array_merge(
                $validated,
                [
                    'uuid' => Str::uuid(),
                ]
            )
        );

        return new DiscardedWasteRecordResource($discardedWasteRecord);
    }
}
