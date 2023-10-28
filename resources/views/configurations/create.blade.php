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

                        <div class="pull-left">
                            <h2>Rig Editor</h2>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('configurations.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h2>Name:</h2>
                                        <input type="text" name="name" class="form-control" placeholder="{{ Auth::user()->name }}'s Rig">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>CPU: </h2>
                                    <select class="form-control m-bot15" name="cpu_id">
                                        @if ($cpus->count())
                                            @foreach ($cpus as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }} | {{ $part->vendor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>GPU: </h2>
                                    <select class="form-control m-bot15" name="gpu_id">
                                        @if ($gpus->count())
                                            @foreach ($gpus as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }} | {{ $part->vendor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>iGPU (Integrated Graphics): </h2>
                                    <select class="form-control m-bot15" name="igpu_id">
                                        @if ($igpus->count())
                                            @foreach ($igpus as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }} | {{ $part->vendor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>RAM: </h2>
                                    <select class="form-control m-bot15" name="ram_id">
                                        @if ($rams->count())
                                            @foreach ($rams as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }} | {{ $part->vendor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>Storage: </h2>
                                    <select class="form-control m-bot15" name="storage_id">
                                        @if ($storages->count())
                                            @foreach ($storages as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }} | {{ $part->vendor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>PCI Express Card: </h2>
                                    <select class="form-control m-bot15" name="pci_id">
                                        @if ($pcis->count())
                                            @foreach ($pcis as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }} | {{ $part->vendor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('configurations.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
