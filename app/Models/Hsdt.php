<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hsdt extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'HS_CODE_DT';

    // Specify the primary key
    // protected $primaryKey = ['COMPANY_CODE', 'HSSYS_NO', 'HS_CODE', 'SL_NO'];

    // Disable the incrementing feature since we have a composite primary key
    public $incrementing = false;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'COMPANY_CODE',
        'HSSYS_NO',
        'HS_CODE',
        'SL_NO',
        'CONTROL_CODE',
        'COST_TYPE',
        'RATE',
        'USER_ID',
        'ENTER_DATE',
        'LAST_UPDATE',
        'LAST_UPDATE_DATE',
    ];

    // Optionally, if you want to use date casting for date attributes
    protected $dates = ['ENTER_DATE', 'LAST_UPDATE_DATE'];

    // If you need to customize the timestamps
    public $timestamps = false; // Disable automatic timestamps (created_at and updated_at)
}
