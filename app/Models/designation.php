<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    use HasFactory;

        // Specify the table associated with this model
        protected $table = 'DESIGNATION';

        // Specify the primary key (if it's not the default 'id')
        protected $primaryKey = 'DESIG_CODE';

        // Disable auto-incrementing if the primary key is not auto-incremented
        public $incrementing = false;

        // Define fillable columns
        protected $fillable = [
            
            'DESIG_NAME',
            'STATUS',
            'USER_ID',
            'ENTER_DATE',
            'LAST_UPDATE',
            'LAST_UPDATE_DATE'
        ];

        // Timestamps not used
        public $timestamps = false;
    }





