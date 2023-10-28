@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results X</h1>

        @if(count($results) > 0)
            <h2>Submissions</h2>
            @foreach ($results as $submission)
                <a class="nav-link" href="{{ route('submissions.show', $submission->id) }}">{{ $submission->name }}</a>
            @endforeach
        @else
            <p>No submissions found for this game.</p>
        @endif
    </div>
@endsection
