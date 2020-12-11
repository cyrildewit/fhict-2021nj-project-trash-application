<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SeperationTray;
use BenSampo\Enum\Traits\CastsEnums;

class Product extends Model
{
    use HasFactory;
    use CastsEnums;

    public $guarded = [];

    protected $casts = [
        'seperation_tray' => SeperationTray::class,
    ];
}
