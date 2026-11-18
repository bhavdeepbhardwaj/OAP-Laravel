
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $primaryKey = 'id';

    public $timestamps = true;

    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'modified_on';

    protected $fillable = [
        'organization_name',
        'organization_type',
        'created_by_user_id',
        'modified_by_user_id',
    ];
}
