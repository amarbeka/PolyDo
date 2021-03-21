<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'roles';
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public static function getTableName() {
        return with( new static )->getTable();
    }
    public function permissions() {
        return $this->belongsToMany( Permission::class );
    }
    public function users() {
        return $this->belongsToMany( User::class );
    }
}
