<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true;

    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $fillable = [
        'username',
        'email',
        'password',
        'u_name_title',
        'f_name',
        'm_name',
        'l_name',
        'profilepic',
        'profilesignature',
        'mobile_number',
        'organization_id',
        'office_location_id',
        'department_id',
        'group_id',
        'designation_id',
        'forget_password_key',
        'password_reset_key',
        'reset_key_sent_on',
        'password_reset_on',
        'status',
        'password_status',
        'force_password_change',
        'created_by_user_id',
        'modified_by_user_id',
        'ip_address',
    ];

    protected $hidden = [
        'password',
        'forget_password_key',
        'password_reset_key',
    ];

    protected function casts(): array
    {
        return [
            'force_password_change' => 'boolean',
            'created_on' => 'datetime',
            'modified_on' => 'datetime',
            'reset_key_sent_on' => 'datetime',
            'password_reset_on' => 'datetime',
        ];
    }
}

