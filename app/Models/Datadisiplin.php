<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jenishukumen;
use App\Models\Tambahinstansi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Datadisiplin extends Model
{
    use HasFactory;
    protected $fillable=['name','nip','pangkat_gol','jenishukumen_id','no_keputusan','tgl_penjatuhan','tambahinstansi_id','penandatangan','file','user_id'];

    public function tambahinstansi():BelongsTo
    {
        return $this->belongsTo(Tambahinstansi::class);
    }

    public function jenishukumen():BelongsTo
    {
        return $this->belongsTo(Jenishukumen::class,'jenishukumen_id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
