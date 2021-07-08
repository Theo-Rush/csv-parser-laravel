<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadeResponse;
use App\Models\Csv;
use App\Models\CsvFilter;
use App\Models\MockUser;

class CsvControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataset = MockUser::with('category')->paginate(6);
        return view('csv.index')->with('dataset', $dataset);
    }

    public function store(Request $request)
    {
        $fileName = 'csv-' . time() . '.' . $request->dataset->extension();

        $request->dataset->move(public_path('uploads'), $fileName);
        $csv = new Csv($fileName);
        if ($csv->validate()) {
            $csv->save();
        } else {
            return $this->errors($csv->errors);
        }
        return back();
    }

    public function errors($errors)
    {
        return view('csv.errors')->with('csvErrors', $errors);
    }

    public function download(Request $request)
    {
        $csvFilter = new CsvFilter($request);
        $dataset = $csvFilter->builder->get();

        $content = "category,firstname,lastname,email,gender,birthDate";
        foreach ($dataset as $datarow) {
            $category = $datarow->category->name;
            $datarow->unsetRelation('category');
            $csvRowData = collect($datarow)->flatten()->toArray();

            $content .= "\n";
            $content .= $category . ',' . implode(',', array_values($csvRowData));
        }

        $fileName = "dataset-" . now() . ".txt";
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
            'Content-Length' => strlen($content)
        ];
        return FacadeResponse::make($content, 200, $headers);
    }

    public function filter(Request $request)
    {
        $csvFilter = new CsvFilter($request);
        $dataset = $csvFilter->builder->paginate(6);
        return view('csv.index')->with('dataset', $dataset);
    }
}
