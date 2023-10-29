@extends('layouts.app')

@section('content')
    <div class="container">
        @csrf
        <h1>Search Results</h1>
        @if(count($games)>0)
        <h2>Games</h2>
        @foreach ($games as $game)

            <a class="nav-link" href="{{ route('games.show',$game->id) }}">{{ __($game->title) }}</a>
        @endforeach
        @endif

        @if(count($configurations)>0)
        <h2>Configurations</h2>
        @foreach ($configurations as $configuration)

            <a class="nav-link" href="{{ route('configurations.show',$configuration->id) }}">{{ __($configuration->name) }}</a>
        @endforeach
        @endif

        @if(count($submissions)>0)
        <h2>Submissions</h2>
        @foreach ($submissions as $submission)

            <a class="nav-link" href="{{ route('submissions.show',$submission->id) }}">{{ __($submission->name) }}</a>
        @endforeach
        @endif

        @if(count($vendors)>0)
        <h2>Vendors</h2>
        @foreach ($vendors as $vendor)
            <a class="nav-link" href="{{ route('vendors.show',$vendor->id) }}">{{ __($vendor->name) }}</a>
        @endforeach
        @endif

        @if(count($parts)>0)
        <h2>Parts</h2>
        @foreach ($parts as $part)
            <a class="nav-link" href="{{ route('parts.show',$part->id) }}">{{ __($part->name) }}</a>
        @endforeach
        @endif
    </div>
@endsection
