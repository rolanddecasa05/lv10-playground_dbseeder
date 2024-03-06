<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;

    protected $table = 'user_companies';

    protected $fillable = [
        'id',
        'user_id',
        'company_id',
        'job_title',
    ];
}
