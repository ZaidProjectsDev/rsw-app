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
                                        <li>{{$part->name}} </li>
                                        <li>{{$part->vendor->name}} </li>
                                {{dd($sub->configuration->cpu)}}
                                        @if($sub->configuration->cpu) != null)
                                        <li>{{ $sub->configuration->cpu->name}} </li>
                                     @endif
                                    @empty
                                        <div class="col-md-6 col-xl-4 card w-auto">
                                            <span>There's nothing to see here. </span>
                                        </div>
                                    @endforelse

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
