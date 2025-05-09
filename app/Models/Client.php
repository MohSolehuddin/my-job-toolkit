<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['full_name', 'company_name', 'phone_number', 'address', 'coordinate_in_map', 'email', 'website', 'description', 'is_client', 'is_active', 'is_deleted', 'work_type', 'is_remote'];
}
