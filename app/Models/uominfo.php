<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class uominfo extends Model
{
    use HasFactory;

    protected $table = 'INV_ITEM_UOM';
    protected $primaryKey = 'UOM_SLNO';
    public $incrementing = false; // Oracle sequence for UOM_SLNO
    protected $keyType = 'int';
    public $timestamps = false; // Disable Eloquent timestamps as we're using custom fields

    protected $fillable = [
        'UOM',
        'UOM_DESC',
        'USER_ID',
        'ENTER_DATE',
        'LAST_UPDATE',
        'LAST_UPDATE_DATE',
        
    ];

    protected $casts = [
        'ENTER_DATE' => 'datetime',
        'LAST_UPDATE_DATE' => 'datetime',
    ];


}
