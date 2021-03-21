<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'finish_at',
        'project_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public static function getTableName() {
        return with( new static )->getTable();
    }
    public function project() {
        return $this->belongsTo( Project::class );
    }
    public function user() {
        return $this->belongsTo( User::class );
    }
}
