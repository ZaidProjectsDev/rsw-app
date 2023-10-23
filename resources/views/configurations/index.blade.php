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

                        @forelse($configurations as $configuration)
                            <div class="col-md-6 col-xl-4 card w-auto">
                                <h2>{{ $configuration->name}}
                                </h2>
                                @forelse($configuration->parts as $part)
                                        @if($part->type->name === 'CPU')
                                        <h3>CPU:{{$part->name}} </h3>
                                        @endif
                                        @if($part->type->name === 'GPU')
                                            <h3>GPU: {{$part->name}} </h3>
                                        @endif
                                        @if($part->type->name === 'iGPU')
                                            <h3>iGPU: {{$part->name}} </h3>
                                        @endif
                                        @if($part->type->name === 'RAM')
                                            <h3>RAM: {{$part->name}} </h3>
                                        @endif
                                        @if($part->type->name === 'Storage')
                                            <h3>Storage: {{$part->name}} </h3>
                                        @endif
                                        @if($part->type->name === 'PCI-Express Card')
                                            <h3>PCI-Express Card: {{$part->name}} </h3>
                                        @endif
                                    <h3>Vendor:{{$part->vendor->name}}</h3>
                                @empty
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
