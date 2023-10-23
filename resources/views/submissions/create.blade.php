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

                            <div class="row">

                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-left">

                                        <h2>Edit Submission</h2>

                                    </div>

                                    <div class="pull-right">

                                        <a class="btn btn-primary" href="{{ route('submissions.index') }}"> Back</a>

                                    </div>

                                </div>

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
                                <h2>Hardware Configuration: </h2>
                                <select class="form-control m-bot15" name="configuration_id">

                                    @if ($configurations->count())

                                        @forelse($configurations as $configuraiton)
                                            <option value="{{ $configuraiton->id }}" {{ $selected_configuration == $configuraiton->id ? 'selected="selected"' : '' }}>{{ $configuraiton->name }}</option>

                                            @empty
                                                <div class="col-md-6 col-xl-4 card w-auto">
                                                    <span>There's nothing to see here. </span>
                                                </div>
                                            @endforelse
                                    @endif

                                </select>
                                <h2>Game: </h2>
                                <select class="form-control m-bot15" name="game_id">

                                    @if ($games->count())

                                        @forelse($games as $game)
                                            <option value="{{ $game->id }}" {{ $selected_game == $game->id ? 'selected="selected"' : '' }}>{{ $game->title }}</option>

                                        @empty
                                            <div class="col-md-6 col-xl-4 card w-auto">
                                                <span>There's nothing to see here. </span>
                                            </div>
                                        @endforelse
                                    @endif

                                </select>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">

                                            <strong>Name:</strong>

                                            <input type="text" name="name" class="form-control" placeholder="Name">

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">

                                            <strong>Detail:</strong>

                                            <textarea class="form-control" style="height:150px" name="description" placeholder="Detail"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </div>

                                </div>



                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
