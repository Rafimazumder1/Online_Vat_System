<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'INV_ITEM_LOC';

    // Composite primary keys
    protected $primaryKey = ['LOC_CODE', 'COMPANY_CODE'];

    // Disable auto-increment
    public $incrementing = false;

    // Disable Eloquent timestamps
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'COMPANY_CODE',
        'LOC_CODE',
        'STORE_NAME',
        'STORE_TYPE',
        'FLOOR_LOC',
        'RECK_NO',
        'BIN_NO',
        'REMARKS',
        'ORG_CODE',
        'USER_ID',
        'ENTER_DATE',
        'LAST_UPDATE',
        'LAST_UPDATE_DATE',
        'LOC_ADDRESS',
    ];

    // Cast fields to specific data types
    protected $casts = [
        'LOC_CODE' => 'integer',        // LOC_CODE is an integer
        'COMPANY_CODE' => 'string',     // COMPANY_CODE is a string
        'ENTER_DATE' => 'datetime',
        'LAST_UPDATE_DATE' => 'datetime',
        'STORE_TYPE' => 'string',
    ];

    // Custom method to find a record by composite keys
    public static function findByCompositeKey($locCode, $companyCode)
    {
        return self::where('LOC_CODE', (int) $locCode)  // Ensure LOC_CODE is cast to integer
                    ->where('COMPANY_CODE', (string) $companyCode)  // Ensure COMPANY_CODE is cast to string
                    ->first();
    }
}
