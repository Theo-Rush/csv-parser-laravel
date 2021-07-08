<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
    
    public function users()
    {
        return $this->hasMany(MockUser::class, 'favourite_category', 'id');
    }
}
