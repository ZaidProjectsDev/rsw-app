@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @forelse($games as $game)
                                <div class="col-md-6 col-xl-4 card w-auto">
                                    <a href="{{ route('games.show', ['id' => $game]) }}">
                                        <h2>{{ $game->title }}</h2>
                                    </a>
                                </div>

                        @empty
                            <div class="col-md-6 col-xl-4 card w-auto">
                                <span>There's nothing to see here. </span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
