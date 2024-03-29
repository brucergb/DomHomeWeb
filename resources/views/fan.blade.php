@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{--print_r($fan)--}}

                    <div class="row">
                        <div class="col-sm-4 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ __('Set Mode: ') }} @if($fan['mode'] == "auto") {{"Auto"}} @else {{"Manual"}} @endif</h5> <br>
                                        <form action="{{route('fan-mode')}}" method="POST">
                                            {{ csrf_field() }}

                                            <div class="form-group row">
                                                <label for="mode" class="col-sm-4 col-form-label">Set</label>
                                                <div class="col-sm-8">
                                                    <select name="mode" class="form-control" required>
                                                        <option value="auto" @if($fan['mode'] == "auto") {{"selected"}} @endif>Auto</option>
                                                        <option value="manual" @if($fan['mode'] == "manual") {{"selected"}} @endif>Manual</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-block">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ __('Status: ') }} @if($fan['status'] == "on") {{"On"}} @else {{"Off"}} @endif</h5> <br>
                                        <form action="{{route('fan-power')}}" method="POST">
                                            {{ csrf_field() }}

                                            <div class="form-group row">
                                                <label for="mode" class="col-sm-4 col-form-label">Set</label>
                                                <div class="col-sm-8">
                                                    <select name="status" class="form-control" required>
                                                        <option value="on" @if($fan['status'] == "on") {{"selected"}} @endif>on</option>
                                                        <option value="off" @if($fan['status'] == "off") {{"selected"}} @endif>off</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-block">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-6">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title text-center">{{ __('Temperature: ')}} {{$fan['temperature'] }}</h5> <br>
                                    <form action="{{route('fan-temperature')}}" method="POST">
                                        {{ csrf_field() }}

                                        <div class="form-group row">
                                            <label for="mode" class="col-sm-4 col-form-label">Set</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" value="{{$fan['temperature']}}" name="temperature" min="10" max="35" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block">Save</button>
                                    </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
