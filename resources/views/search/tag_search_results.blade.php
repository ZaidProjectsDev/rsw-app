@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results</h1>

        @if(count($results) > 0)
            @if($tag === 'games')
                <h2>Games</h2>
                @foreach ($results as $game)
                    <a class="nav-link" href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a>
                    <!-- Display other game fields as needed -->
                @endforeach
            @elseif($tag === 'configurations')
                <h2>Configurations</h2>
                @foreach ($results as $configuration)
                    <a class="nav-link" href="{{ route('configurations.show', $configuration->id) }}">{{ $configuration->name }}</a>
                    <!-- Display other configuration fields as needed -->
                @endforeach
            @elseif($tag === 'submissions')
                <h2>Submissions</h2>
                @foreach ($results as $submission)
                    <a class="nav-link" href="{{ route('submissions.show', $submission->id) }}">{{ $submission->name }}</a>
                    <!-- Display other submission fields as needed -->
                @endforeach
            @elseif($tag === 'vendors')
                <h2>Vendors</h2>
                @foreach ($results as $vendor)
                    <a class="nav-link" href="{{ route('vendors.show', $vendor->id) }}">{{ $vendor->name }}</a>
                    <!-- Display other vendor fields as needed -->
                @endforeach
            @elseif($tag === 'parts')
                <h2>Parts</h2>
                @foreach ($results as $part)
                    <a class="nav-link" href="{{ route('parts.show', $part->id) }}">{{ $part->name }}</a>
                    <!-- Display other part fields as needed -->
                @endforeach
            @else
                <!-- Handle other tags as needed -->
            @endif
        @else
            <p>No results found for {{ $tag }}.</p>
        @endif
    </div>
@endsection
