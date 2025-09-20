<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class projectModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'projects';
    protected $primaryKey = 'project_id';
    public $incrementing = true;
    protected $fillable = [
        'category',
        'name',
        'budget_source',
        'first_name',
        'last_name',
        'budget_amount',
        'amount_spent',
        'implementation_date',
        'completed_date',
        'description',
        'status',
        'created_by',
    ];
    public $timestamps = true;
}
