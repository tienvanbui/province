<?php

namespace TienVanBui\Province\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JapanProvinces extends Model
{
    use HasFactory;

    protected $table = 'japan_provinces';
    
    protected $fillable = [
        'province_name',
        'kanji_province_name',
        'hiragana_province_name',
        'province_capital',
        'region',
        'island',
        'area'
    ];
}
