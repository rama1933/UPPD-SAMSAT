<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tbl_pendaftaran';
    protected $guarded = [''];


    public function pendaftarans()
    {
        return $this->hasOne(Trxpendaftaran::class, 'pendaftaran_id', 'id');
    }

    public function dealer()
    {
        return $this->hasOne(Dealer::class, 'id', 'dealer_id');
    }

    public function merk()
    {
        return $this->hasOne(Merk::class, 'id', 'merk_id');
    }

    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'id', 'biodata_id');
    }
}
