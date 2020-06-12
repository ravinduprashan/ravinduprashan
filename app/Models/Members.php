<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table = 'accura_members';

    protected $fillable = ['first_name','last_name','ds_division','dob','summery'];
}
