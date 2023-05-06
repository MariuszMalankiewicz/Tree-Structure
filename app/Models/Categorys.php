<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'parent_id',
        'name',
        'type',
    ];

    public function childs() {
        return $this->hasMany('App\Models\Categorys','parent_id','id');
    }
}
