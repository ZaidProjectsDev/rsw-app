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

                        @forelse($parts as $part)
                            <div class="col-md-6 col-xl-4 card w-auto">
                                    <h2>{{ $part->name}}
                                    </h2>
                                    <h3>Vendor:
                                        <span>{{ $part->vendor->name}}</span>
                                    </h3>
                                    <h3>Hardware Type:
                                    <span>{{$part->type->name}}</span>
                                    </h3>
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
