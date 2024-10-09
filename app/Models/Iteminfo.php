<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iteminfo extends Model
{
    use HasFactory;
    protected $table = 'INV_ITEM_MT';

    // Specify the primary key if it's different from 'id'
    protected $primaryKey = 'ITEM_CODE'; // Adjust if needed

    // Disable timestamps if your table does not have created_at and updated_at fields
    public $timestamps = false ; // Set to false if not using Laravel's timestamps

    // Specify the fillable fields
    protected $fillable = [
        'ITEM_CODE',
        'ITEM_NAME',
        'CAT_CODE',
        'TYPE_CODE',
        'ACCODE',
        'HS_CODE',
        'USER_ID',
        'HSSYS_NO',
        'PCONV_FACTOR',
        'PITEM_UOM',
        'SITEM_UOM',






        // 'REORD_QTY',
        // 'DACTV_DATE',
        // 'ITEM_FLAG',
        // 'BAR_CODE',





        // 'ORG_CODE',
        // 'BRN_CODE',


        // 'MODEL_NO',
        // 'CAPACITY',
        // 'COUNTRY_ORIGIN',
        // 'MADE_IN',

        // 'ACSUB_CODE',
        // 'PACK_SIZE',
        // 'PITEM_UOM',
        // 'PCONV_FACTOR',
        // 'SITEM_UOM',
        // 'SCONV_FACTOR',
        // 'REORD_QTY',
        // 'DACTV_DATE',
        // 'ITEM_FLAG',
        // 'BAR_CODE',
        // 'MFG_PART_NO',
        // 'MIN_QTY',
        // 'MAX_QTY',

        // 'CAPACITY_UOM',
        // 'LEGCY_CODE',
        // 'OTHER_FLG',
        // 'ITEM_IMAGE',
        // 'LOT_CONTROL',
        // 'LOC_CONTROL',
        // 'SLN_CONTROL',
        // 'SUB_ASSEMBLY_FLAG',
        // 'MMX_CONTROL',
        // 'INSP_FLAG',

        // 'ENTER_DATE',
        // 'LAST_UPDATE',
        // 'LAST_UPDATE_DATE',
        // 'OLD_ITEM_CODE',
        // 'SUB_CAT_CODE',
        // 'VDS_CODE',

    ];



    public function category()
{
    return $this->belongsTo(Category::class, 'CAT_CODE', 'id'); // Adjust accordingly
}

public function type()
{
    return $this->belongsTo(Type::class, 'TYPE_CODE', 'id'); // Adjust accordingly
}

}
