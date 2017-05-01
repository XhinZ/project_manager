@extends('master')

@section('title') Manage Projects @endsection

@section('styles')
    <link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">

@endsection


@section('content')
    <div class="row">
        <!-- Users List -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Project List</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <ul class="list-group">
                            @if(count($projects) == 0)
                                <li class="list-group-item">There Are No Projects Currently.</li>
                            @endif
                            @foreach($projects as $project)
                                <li class="list-group-item">
                                    <a href="{{ action('ProjectController@show',['project' => $project->id] )}}">{{ $project->name }}</a>


                                </li>
                            @endforeach
                        </ul>
                        {{ $projects->links() }}

                    </div>
                </div>
            </div>
        </div>

        <!-- Create User -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create Project</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="{{ action('ProjectController@store') }}">
                            <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10"><input type="text" name="name" class="form-control" value="{{ old('name')}}">
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="details" class="form-control" placeholder="Enter Details">{{ old('description') }}</textarea>
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name='create' class="btn btn-block btn-outline btn-primary ">Create</button>                        </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


