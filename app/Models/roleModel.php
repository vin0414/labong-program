<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleModel extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'role_id';
    public $incrementing = true;
    protected $fillable = ['role_name', 'user_id'];
    public $timestamps = true;
}
