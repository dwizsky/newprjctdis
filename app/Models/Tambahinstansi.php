<?php

namespace App\Models;

use App\Models\Datadisiplin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tambahinstansi extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    
    ];

    public function datadisiplin():HasMany
    {
        return $this->hasMany(Datadisiplin::class);
    }
}
