<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hs extends Model
{
    protected $table = 'HS_CODE_MT';

    // Primary Key
    protected $primaryKey = ['COMPANY_CODE', 'HS_CODE', 'HSSYS_NO'];
    public $incrementing = false; // Disable auto-incrementing for composite keys

    // Specify the connection if it's different from default
    protected $connection = 'oracle'; // or whatever your Oracle connection name is in the config

    // Fillable fields for mass assignment
    protected $fillable = [
        'COMPANY_CODE',
        'HSSYS_NO',
        'HS_CODE',
        'HS_DESC',
        'COUNTRY',
        'STATUS',
        'USER_ID',
        'ENTER_DATE',
        'LAST_UPDATE',
        'LAST_UPDATE_DATE',
        'EXD',
        'VDS_FLAG',
        'SCHEDULE_FLAG',
        'CODE_TYPE',
        'SCHEDULE_PERIOD',
        'CONTROL_CODE1',
        'CONTROL_CODE2'
    ];

    // Disable timestamps management by Laravel
    public $timestamps = false;

    // Handle composite primary key
    protected function setKeysForSaveQuery($query)
    {
        return $query->where('COMPANY_CODE', $this->getAttribute('COMPANY_CODE'))
                     ->where('HS_CODE', $this->getAttribute('HS_CODE'))
                     ->where('HSSYS_NO', $this->getAttribute('HSSYS_NO'));
    }

    // Custom date format for Oracle
    protected $dates = ['ENTER_DATE', 'LAST_UPDATE_DATE'];
    protected $dateFormat = 'd-M-Y'; // Adjust to match Oracle's format

    // You can define any relationships, if needed
    // Example for related log entries (optional)

    protected $casts = [
        'ENTER_DATE' => 'datetime',
        'LAST_UPDATE_DATE' => 'datetime',
    ];

}
