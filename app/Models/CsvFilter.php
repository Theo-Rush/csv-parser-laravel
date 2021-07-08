<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CsvFilter
{
    use HasFactory;

    public function createQueryFromFilters($input)
    {
        $age = $input->filled('age') ? $input->query('age') : null;
        $ageBetween = $input->filled('ageBetween') ? $input->query('ageBetween') : null;
        $category = $input->filled('category') ? $input->query('category') : null;
        $gender = $input->filled('gender') ? $input->query('gender') : null;
        $dob = $input->filled('dob') ? $input->query('dob') : null;

        $query = MockUser::with('category');
        $query->when($age, function ($query, $age) {
            return $query->whereBetween('birth_date', [now()->subYears($age + 1), now()->subYears($age)]);
        });
        $query->when($ageBetween, function ($query, $ageBetween) {
            list($ageMin, $ageMax) = explode('-', $ageBetween, 2);
            if ($ageMin && $ageMax)
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
