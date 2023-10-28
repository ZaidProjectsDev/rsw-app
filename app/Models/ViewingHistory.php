<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewingHistory extends Model
{
    use HasFactory;

    protected $table = 'viewing_history';

    protected $fillable = [
        'user_id',
        'viewed_model',
        'viewed_id',
        'viewed_at',
        // Add other fillable attributes if needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
