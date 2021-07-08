<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;

class MockUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'birth_date',
        'favourite_category',
    ];
    protected $hidden = [
        'id',
        'favourite_category',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'favourite_category');
    }

    public function age() {
        return Carbon::parse($this->birth_date)->diff(today())->format('%y');
    }
}
