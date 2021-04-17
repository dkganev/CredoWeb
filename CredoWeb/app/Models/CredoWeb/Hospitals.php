<?php

namespace App\Models\CredoWeb;

use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model
{
    protected $connection = 'mysql';

    protected $table = 'hospitals';
    
    protected $primaryKey = 'ID';

    protected $guarded = [];
}