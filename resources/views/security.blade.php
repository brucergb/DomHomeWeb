@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-12 col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header">Security</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="true">Schedule</a>
                            <a class="nav-item nav-link" id="nav-video-tab" data-toggle="tab" href="#nav-video" role="tab" aria-controls="nav-video" aria-selected="false">Video</a>
                            <a class="nav-item nav-link" id="nav-door-tab" data-toggle="tab" href="#nav-door" role="tab" aria-controls="nav-door" aria-selected="false">Door</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schelude-tab">
                            <br>
                            {{--print_r($schedule)--}}

                            <div class="row">
                                <div class="col-sm-5 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{route('security-set')}}" method="POST">

                                                @csrf
                                                <h4 class="text-center">Set configuration</h4>

                                                @error ('nombre')
                                                    <div class="alert alert-danger">
                                                        El nombre es requerido
                                                    </div>
                                                @enderror

                                                <div class="form-group row">
                                                    <label for="start_time" class="col-sm-4 col-form-label">Start Time</label>
                                                    <div class="col-sm-8">
                                                        <input type="time" class="form-control" id="start_time" name="start_time" value="{{old('start_time')}}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="end_time" class="col-sm-4 col-form-label">End Time</label>
                                                    <div class="col-sm-8">
                                                        <input type="time" class="form-control" id="end_time" name="end_time" value="{{old('end_time')}}" required>
                                                    </div>
                                                </div>

                                                @foreach($schedule as $day)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$loop->iteration}}" value="{{$day['_id']}}" name="days[{{$loop->iteration}}]">
                                                        <label class="form-check-label" for="inlineCheckbox{{$loop->iteration}}">{{$day['day']}}</label>
                                                    </div>
                                                @endforeach
                                                <br><br>

                                                @error('days')
                                                    <div class="alert alert-danger">You must select at least one day</div>
                                                @enderror

                                                <button type="submit" class="btn btn-success btn-block">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center col-sm-7 col-12">
                                    <table class="table table-bordered table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Day</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>
                                                    <form action="{{route('security-deleteAll')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Delete all?');">Delete all</button>
                                                    </form>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-hover">
                                            @foreach($schedule as $day)
                                            <tr>
                                                <td>{{$day['day']}}</td>
                                                <td>{{$day['start_time']}}</td>
                                                <td>{{$day['end_time']}}</td>
                                                <td>
                                                    <form action="{{route('security-deleteOne', $day['_id'] )}}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if(session('set'))
                                        <div class="alert alert-success mt-3" role="alert">
                                            {{session('set')}}
                                        </div>
                                    @endif

                                </div>

                            </div>


                        </div>
                        <div class="tab-pane fade" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab">
                            <br>
                            <div class="row">
                                <div class="text-center col-sm-7 col-12">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/SfZIzErHInA?rel=0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title text-center">{{ __('Stop stream') }}</h5>
                                        <button type="submit" class="btn btn-success btn-block">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-door" role="tabpanel" aria-labelledby="nav-door-tab">
                            <div class="col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title text-center">{{ __('Open Door') }}</h5>
                                    <button type="submit" class="btn btn-success btn-block">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
