<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $fillable = ['nama'];

    public function penerbit(): HasMany
    {
        return $this->hasMany(Buku::class);
    }
}