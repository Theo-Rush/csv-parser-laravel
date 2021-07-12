<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CsvFilter
{
    use HasFactory;

    public function createQueryFromRequest(Array $request) : Builder
    {
        $age = $request['age'] ?? null;
        $ageBetween = $request['ageBetween'] ?? null;
        $category = $request['category'] ?? null;
        $gender = $request['gender'] ?? null;
        $dob = $request['dob'] ?? null;

        $query = MockUser::with('category');
        $query->when($age, function ($query, $age) {
            return $query->whereBetween('birth_date', [now()->subYears($age + 1), now()->subYears($age)]);
        });
        $query->when($ageBetween, function ($query, $ageBetween) {
            if (!str_contains($ageBetween, '-'))
                return;
            list($ageMin, $ageMax) = explode('-', $ageBetween, 2);
            if ((int)$ageMin && (int)$ageMax)
                return $query->whereBetween('birth_date', [now()->subYears($ageMax), now()->subYears($ageMin)]);
            return;
        });
        $query->when($category, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                return $query->where('categories.name', 'like', "%$category%");
            });
        });
        $query->when($gender, function ($query, $gender) {
            return $query->where('gender', $gender);
        });
        $query->when($dob, function ($query, $dob) {
            return $query->whereDate('birth_date', $dob);
        });

        return $query;
    }
}
