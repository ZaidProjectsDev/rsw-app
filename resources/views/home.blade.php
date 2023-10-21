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

                    {{ __('You are logged in!') }}



                        @forelse($submissions as $sub)
                            <div class="col-md-6 col-xl-4 card w-auto">
                                <h2>{{ $sub->name}}
                                </h2>
                                <h3>Vendor:
                                    <span>{{ $sub->game->title}}</span>
                                </h3>
                                <h3>Hardware Type:</h3>

                                    <span>{{$sub->configuration->name}}</span>


                                    @forelse($sub->configuration->parts as $part)
                                    <div class="col-md-8 col-xl-8 card">
                                        <li>Model :{{$part->name}} </li>
                                        <li>Vendor: {{$part->vendor->name}} </li>
                                        @if($part->type->name === "CPU")
                                        <li>Type : {{ $part->type->name}} </li>
                                    </div>
                                     @endif
                                    @empty
                                        <div class="col-md-6 col-xl-4 card w-auto">
                                            <span>There's nothing to see here. </span>
                                        </div>
                                    @endforelse
                                <a class="btn-link col-md-6 col-xl-4 card w-auto" href="{{ url('/') }}">View</a>
                                @if (Auth::user()->id === $sub->user->id)
                                    <a class="btn-link col-md-6 col-xl-4 card w-auto" href="{{ url('/') }}">Edit</a>
                                @endif
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
