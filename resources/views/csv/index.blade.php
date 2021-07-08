@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 mt-5 mb-5 py-5">
    <form method="get" action="{{ route('csv.filter') }}" class="rounded border-b-2 py-5">
        <div class="flex flex-wrap">
            <div class="flex-column flex-wrap box-border mb-4 w-1/5">
                <label>Category</label>
                <input class="mt-2 p-2 w-full" type="text" name="category" value="{{ request()->category }}" />
            </div>
            <div class="flex-column flex-wrap box-border mb-4 w-1/5">
                <label>Gender</label>
                <input class="mt-2 p-2 w-full" type="text" name="gender" value="{{ request()->gender }}" />
            </div>
            <div class="flex-column flex-wrap box-border mb-4 w-1/5">
                <label>Date of Birth</label>
                <input class="mt-2 p-2 w-full" type="text" name="dob" value="{{ request()->dob }}" />
            </div>
            <div class="flex-column flex-wrap box-border mb-4 w-1/5">
                <label>Exact Age</label>
                <input class="mt-2 p-2 w-full" type="number" name="age" value="{{ request()->age }}" />
            </div>
            <div class="flex-column flex-wrap box-border mb-4 w-1/5">
                <label>Age Span (<i>e.g. 10-20</i>)</label>
                <input class="mt-2 p-2 w-full" type="text" name="ageBetween" value="{{ request()->ageBetween }}" />
            </div>
        </div>
        <button class="bg-blue-200 hover:bg-blue-400 font-bold py-2 px-4 rounded mb-4" type="submit">Filter</button>
    </form>
    <div class="flex flex-wrap">
        @forelse ($dataset as $datarow)
        <div class="mb-4 w-1/3 border-b-2 mb-2 py-5">
            <h3 class="block font-semibold">{{ $datarow->firstname }} {{  $datarow->lastname }}</h3>
            <div class="italic mb-2"> {{ $datarow->age() }} year(s) old</div>
            <div class="font-semibold">{{ $datarow->category->name }}</div>
        </div>
        @empty
        <div class="text-gray-400 py-5">No data found</div>
        @endforelse
    </div>
    <div class="m-2">{{ $dataset->appends(request()->query())->links() }}</div>
    <a class="bg-blue-200 hover:bg-blue-400 font-bold py-2 px-4 rounded" href="{{ route('csv.download', request()->query()) }}">Download</a>
    <form method="post" action="{{ route('csv.store') }}" enctype="multipart/form-data" class="rounded border-b-2 py-5">
        @csrf
        <input type="file" name="dataset" required/>
        <button class="bg-blue-200 hover:bg-blue-400 font-bold mb-4 py-2 px-4 rounded" type="submit">Upload</button>
    </form>
</div>
@endsection