<?php

namespace App\Models;

use App\Doodstream\DoodstreamAPI;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class MyVideos extends Model
{
    use HasTags;
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
        'slug',
        'created_at',
        'updated_at'
    ];

    public function uploader()
    {
        return $this->hasOne(User::class,'id','uploaded_by');
    }
}
