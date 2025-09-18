<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class activityModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'activities';

    protected $primaryKey = 'activity_id';
    public $incrementing = true;
    protected $fillable = ['category','project_id','description', 'status'];
    public $timestamps = true;
}
