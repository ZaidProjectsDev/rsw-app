@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Submission') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="pull-left">
                            <h2>Create Submission</h2>
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

                        <form action="{{ route('submissions.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h2>Name:</h2>
                                        <input type="text" name="name" class="form-control" placeholder="Submission Name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>Description: </h2>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Description"></textarea>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>Configuration: </h2>
                                    <select class="form-control m-bot15" name="configuration_id">
                                        @if ($configurations->count())
                                            @foreach ($configurations as $configuration)
                                                <option value="{{ $configuration->id }}">{{ $configuration->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>Game: </h2>
                                    <select class="form-control m-bot15" name="game_id">
                                        @if ($games->count())
                                            @foreach ($games as $game)
                                                <option value="{{ $game->id }}">{{ $game->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h2>Visibility: </h2>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="visible" value="1"> Visible
                                    </label>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('submissions.index') }}"> Back</a>
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
