<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\hasRoles;

class User extends Authenticatable
{
    use Notifiable ;
    // Specify the table associated with the model
    protected $table = 'ABC_USER';

    // Specify the primary key for the model
    protected $primaryKey = 'APPS_USER';

    // Define the type of the primary key
    protected $keyType = 'string'; // Adjust if your primary key is of a different type

    // Disable auto-increment if using a custom primary key
    public $incrementing = false;

    // Specify which attributes should be mass-assignable
    protected $fillable = [
        'APPS_USER', 'USER_PASSWORD','USER_ROLE',
        'user_id', // Add other fields if needed
        'COMPANY_CODE',
    ];

    // Specify which attributes should be hidden for arrays
    protected $hidden = [
        'USER_PASSWORD', 'remember_token',
    ];
    protected $casts = [
        'USER_ID' => 'string',
        // other casts
    ];


    public function role()
    {
        return $this->belongsTo(Designation::class, 'ROLE_ID', 'DESIG_CODE');
    }

    // public function hasRole($roleName)
    // {
    //     return $this->role && $this->role->DESIG_NAME === $roleName;
    // }

    // public function getRoleNameAttribute()
    // {
    //     return $this->role ? $this->role->DESIG_NAME : null;
    // }


    public function getAuthIdentifier()
{
    return $this->getKey();
}

public function getCompanyCodeAttribute($value)
{
    return $value;
}
    // No need to implement additional methods if not using hashed passwords


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'APPS_USER', 'EMP_CODE');
    }






}
