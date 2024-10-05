<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;




    protected $table = 'ACT_COA'; // Table name
    protected $primaryKey = 'ACCODE'; // Primary key
    protected $fillable = [
        'ACNAME', 'GLLEVEL', 'STATUS', 'POSTTYPE', 'DRCR', 
        'FLAG', 'LEGACY_CODE', 'APL_CONTROL', 'SUB_CODE_ENABLE', 
        'USER_ID', 'ENTER_DATE', 'LAST_UPDATE', 'LAST_UPDATE_DATE'
    ];
    
    public $timestamps = false; // Disable timestamps if not using them

    // Function to generate ACCODE
    // public static function generateAccode()
    // {
    //     $nextVal = DB::select("SELECT VAT.AC_CODE_SEQ.NEXTVAL AS NEXTVAL FROM DUAL");
    //     return 'AC' . str_pad($nextVal[0]->NEXTVAL, 7, '0', STR_PAD_LEFT); // Generates ACCODE with prefix and padding
    // }


}
