<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    const ENTRY = 'ENTRY';
    const EGRESS = 'EGRESS';

    const TYPE_OPTIONS = [
        self::ENTRY => self::ENTRY,
        self::EGRESS => self::EGRESS,
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'type',
        'amount',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
