<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    public $timestamps = false;
    protected $fillable = [
        'buku_id','user_id','ket'
    ];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}