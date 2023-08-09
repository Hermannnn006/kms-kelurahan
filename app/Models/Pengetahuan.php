<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengetahuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengetahuan_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
