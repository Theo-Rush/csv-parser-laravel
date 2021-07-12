<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Csv
{
    use HasFactory;

    public $rows = [];
    private $userFields = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'birth_date',
        'favourite_category',
    ];
    private $emails = [];
    public $errors = [];
    private $is_valid = true;

    public function __construct($filename)
    {
        $this->rows = array_map('str_getcsv', file(public_path('uploads/' . $filename)));
        array_shift($this->rows); // file headers don't coincide with DB columns anyway
    }

    public function validate() : bool
    {
        $this->prepareValidation();
        if ($this->is_valid)
            $this->checkEmailsList();
        return $this->is_valid;
    }

    private function prepareValidation() : void
    {
        foreach ($this->rows as $i => $row) {
            if (!$this->checkRowIntegrity($i + 2, $row))
                return $this->is_valid;
            $this->checkDOB($i + 2, $row[5]);
            $email = $row[3];

            if (!key_exists($email, $this->emails)) {
                $this->emails[$email] = [];
            }
            $this->emails[$email][] = $i + 2;
        }
    }

    private function checkRowIntegrity($line, $data) : bool
    {
        if (count($data) != 6) {
            $this->errors["Row #$line"][] = "Some data is missing/Extra fields found";
            $this->is_valid = false;
            return false;
        }
        return true;
    }

    private function checkDOB($line, $date) : void
    {
        try {
            Carbon::parse($date);
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            $this->errors["Row #$line"][] = "Date is malformed";
            $this->is_valid = false;
        }
    }

    private function checkEmailsList() : void
    {
        foreach ($this->emails as $email => $occurences) {
            $errorLine = "Row #" . implode(',', array_values($occurences));
            $errorMessage = [];

            if (count($occurences) > 1) {
                $errorMessage[] =  "Email is duplicated";
                $this->is_valid = false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMessage[] =  "Email is malformed";
                $this->is_valid = false;
            }
            if (count($errorMessage)) {
                $this->errors[$errorLine] = $errorMessage;
            }
        }
    }

    public function save()
    {
        $categoriesMap = [];

        foreach ($this->rows as $row) {
            // making categories list
            $categoryName = array_shift($row);

            if (!key_exists($categoryName, $categoriesMap)) {
                $category = Category::create(['name' => $categoryName]);
                $categoriesMap[$categoryName] = $category->id;
            }
            $row[] = $categoriesMap[$categoryName];
            $userData = array_combine($this->userFields, $row);
            MockUser::create($userData);
        }
    }
}
