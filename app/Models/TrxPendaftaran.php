<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'trx_pendaftaran';
    protected $guarded = [''];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id', 'pendaftaran_id');
    }
}
