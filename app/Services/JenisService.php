<?php

namespace App\Services;

use App\Models\Jenis;

class JenisService
{
    public function __construct()
    {
        //
    }
    function getDataJenis()
    {
        return Jenis::all();
    }
}
