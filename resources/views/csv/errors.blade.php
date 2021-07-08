@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 mt-5 mb-5 py-5">
    <h2 class="text-lg text-red-500 font-semibold">Errors found while trying to upload your dataset:</h2>
    @foreach ($csvErrors as $key => $errors)
    <div>
        <span class="italic mt-2 py-2">{{ $key}}:</span>
        <span>
            @foreach ($errors as $message)
            <span class="inline-block mt-2 py-4">{{ $message }}</span><br/>
            @endforeach
        </span>
    </div>
    @endforeach

    <a class="bg-blue-200 hover:bg-blue-400 font-bold py-2 px-4 rounded mb-4" href="{{ route('csv.index') }}">Back to Upload</a>
</div>
@endsection