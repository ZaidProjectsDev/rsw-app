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

                            <div class="col-md-3 col-xl-3 card w-50">
                                <p>Posted by : {{$submission->user->name}}</p>
                            </div>
                            <div class="col-md-6 col-xl-4 card w-auto">
                                <h2><strong>{{$submission->name}}</strong></h2>
                            </div>
                            <div class="col-md-3 col-xl-3 card w-50">
                                <p>Game : {{$submission->game->title}}</p>
                                <p>Rig :{{$submission->configuration->name}}</p>
                                <div class="col-md-3 col-xl-3 card w-50">
                                    <p>CPU:{{$submission->configuration->parts}}</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4 card w-auto">
                                <span>There's nothing to see here. </span>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
