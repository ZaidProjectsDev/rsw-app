@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results</h1>

        <h2>Games</h2>
        @foreach ($games as $game)

            <a class="nav-link" href="{{ route('games.show',$game->id) }}">{{ __($game->title) }}</a>
            <!-- Display other game fields as needed -->
        @endforeach

        <h2>Configurations</h2>
        @foreach ($configurations as $configuration)

            <a class="nav-link" href="{{ route('configurations.show',$configuration->id) }}">{{ __($configuration->name) }}</a>
            <!-- Display other game fields as needed -->
        @endforeach
        <!-- Display configuration results here -->

        <h2>Submissions</h2>
        @foreach ($submissions as $submission)

            <a class="nav-link" href="{{ route('submissions.show',$submission->id) }}">{{ __($submission->name) }}</a>
            <!-- Display other game fields as needed -->
        @endforeach
        <!-- Display submission results here -->

        <h2>Vendors</h2>
        <!-- Display vendor results here -->
        @foreach ($vendors as $vendor)

            <a class="nav-link" href="{{ route('vendors.show',$vendor->id) }}">{{ __($vendor->name) }}</a>
            <!-- Display other game fields as needed -->
        @endforeach
        <h2>Parts</h2>
        @foreach ($parts as $part)

            <a class="nav-link" href="{{ route('parts.show',$part->id) }}">{{ __($part->name) }}</a>
            <!-- Display other game fields as needed -->
        @endforeach
        <!-- Display part results here -->
    </div>
@endsection
