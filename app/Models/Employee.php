<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'HR_EMPLOYEE'; // Replace with your actual table name
    public $timestamps = false;
    protected $keyType = 'string';
    // protected $primaryKey = ['COMPANY_CODE', 'EMP_CODE']; // Replace with the primary key column


    protected $fillable = [
        // 'EMP_CODE',
        'EMP_NAME',
        'DATE_OF_BIRTH',
        'GENDER',
        'NATIONAL_ID',
        'BLOOD_GROUP',
        'PASPORT_NO',
        'RELIGION',
        'PRS_ADD',
        'PRS_DISTRICT',
        'PRS_THANA',
        'PRS_PSTCODE',
        'PRS_PHONE',
        'PRM_ADD',
        'PRM_DISTRICT',
        'PRM_THANA',
        'PRM_PSTCODE',
        'PRM_PHONE',
        'DEPT_CODE',
        'DESIG_CODE',
        'JOIN_DATE',
        'BANK_CODE',
        'BANK_NAME',
        'BRANCH_CODE',
        'BRANCH_NAME',
    ];


    protected $casts = [
        'DATE_OF_BIRTH' => 'date',
        'JOIN_DATE' => 'date',
        // other casts...
    ];
}

