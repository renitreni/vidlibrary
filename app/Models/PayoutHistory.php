<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayoutHistory extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'recent_views',
        'is_approved',
        'billed_views',
        'receipt_path',
        'approved_by',
    ];
}
