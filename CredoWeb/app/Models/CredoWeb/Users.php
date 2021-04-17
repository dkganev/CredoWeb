<?php

namespace App\Models\CredoWeb;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $connection = 'mysql';

    protected $table = 'Users';
    
    protected $primaryKey = 'ID';

    protected $guarded = [];
}