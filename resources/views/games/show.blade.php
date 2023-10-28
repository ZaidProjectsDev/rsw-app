@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Game Details') }}</div>

                    <div class="card-body">
                        <div class="col-md-3 col-xl-3 card w-50">
                            <p>Title: {{ $game->title }}</p>
                            <p>Release Date: {{ $game->release_date }}</p>
                            <p>Publisher: {{ $game->publisher }}</p>
                            <p>Developer: {{ $game->developer }}</p>
                        </div>
                        <a href="{{ route('submissions.show', ['submission' => $game->id]) }}" class="btn btn-primary">Show Submissions for {{ $game->title }}</a>
                        <div class="col-md-6 col-xl-4 card w-auto">
                            <!-- Additional game details or description can be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
