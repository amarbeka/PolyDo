<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'projects';
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'finish_at',
        'status', 
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public static function getTableName() {
        return with( new static )->getTable();
    }
    public function tasks() {
        return $this->hasMany( Task::class );
    }
    public function users() {
        return $this->belongsToMany( User::class );
    }
}
