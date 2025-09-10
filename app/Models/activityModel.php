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
    protected $fillable = ['category_id','project_id','name', 'description', 'status', 'start_date', 'end_date'];
    public $timestamps = true;
}