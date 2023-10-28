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


                        <div class="col-md-6 col-xl-4 card w-auto">
                            <a href="{{ route('search.search-by-game-submission', ['game_id' => $game->id] ) }}" class="btn btn-primary">Show Submissions for {{ $game->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
