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

                                        <input type="text" name="name" class="form-control" placeholder="{{Auth::user()->name}}'s Rig">

                                    </div>

                                </div>




                                <h2>CPU: </h2>
                                <select class="form-control m-bot15" name="part_id">

                                    @if ($cpus->count())
                                        @forelse($cpus as $part)

                                            <option
                                                value="{{ $part->id }}" {{ $selected_cpu ==  $part->id ? 'selected="selected"' : '' }}>{{  $part->name }} | {{$part->vendor->name}}</option>
                                        @empty
                                        @endforelse
                                    @endif

                                </select>
                                <h2>GPU: </h2>
                                <select class="form-control m-bot15" name="configuration_id">

                                    @if ($gpus->count())
                                        @forelse($gpus as $part)

                                            <option
                                                value="{{ $part->id }}" {{ $selected_cpu ==  $part->id ? 'selected="selected"' : '' }}>{{  $part->name }} | {{$part->vendor->name}}</option>
                                        @empty
                                        @endforelse
                                    @endif

                                </select>
                                <h2>iGPU (Integrated Graphics): </h2>
                                <select class="form-control m-bot15" name="configuration_id">

                                    @if ($igpus->count())
                                        @forelse($igpus as $part)

                                            <option
                                                value="{{ $part->id }}" {{ $selected_cpu ==  $part->id ? 'selected="selected"' : '' }}>{{  $part->name }} | {{$part->vendor->name}}</option>
                                        @empty
                                        @endforelse
                                    @endif

                                </select>
                                <h2>RAM: </h2>
                                <select class="form-control m-bot15" name="configuration_id">

                                    @if ($rams->count())
                                        @forelse($rams as $part)

                                            <option
                                                value="{{ $part->id }}" {{ $selected_cpu ==  $part->id ? 'selected="selected"' : '' }}>{{  $part->name }} | {{$part->vendor->name}}</option>
                                        @empty
                                        @endforelse
                                    @endif

                                </select>
                                <h2>Storage: </h2>
                                <select class="form-control m-bot15" name="configuration_id">

                                    @if ($storages->count())
                                        @forelse($storages as $part)

                                            <option
                                                value="{{ $part->id }}" {{ $selected_cpu ==  $part->id ? 'selected="selected"' : '' }}>{{  $part->name }} | {{$part->vendor->name}}</option>
                                        @empty
                                        @endforelse
                                    @endif

                                </select>
                                <h2>PCI Express Card: </h2>
                                <select class="form-control m-bot15" name="configuration_id">

                                    @if ($pcis->count())
                                        @forelse($pcis as $part)

                                            <option
                                                value="{{ $part->id }}" {{ $selected_cpu ==  $part->id ? 'selected="selected"' : '' }}>{{  $part->name }} | {{$part->vendor->name}}</option>
                                        @empty
                                        @endforelse
                                    @endif

                                </select>

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">

                                        <strong>Description:</strong>

                                        <textarea class="form-control" style="height:150px" name="description"
                                                  placeholder="Describe the build"></textarea>

                                    </div>

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
