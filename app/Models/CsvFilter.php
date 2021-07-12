<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CsvFilter
{
    use HasFactory;

    public function createQueryFromRequest($request) : Builder
    {
        $age = $request->input('age', null);
        $ageBetween = $request->input('ageBetween', null);
        $category = $request->input('category', null);
        $gender = $request->input('gender', null);
        $dob = $request->input('dob', null);

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
