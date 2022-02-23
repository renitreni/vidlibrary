<?php

namespace App\Models;

use App\Doodstream\DoodstreamAPI;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyVideos extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'extension',
        'filecode',
        'length',
        'size',
        'download_url',
        'single_img',
        'protected_embed',
        'protected_dl',
        'uploaded_by',
        'views',
        'is_published',
        'created_at',
        'updated_at'
    ];

    public function uploader()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }
}
