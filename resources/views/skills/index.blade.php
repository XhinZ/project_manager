@extends('master')

@section('title') Manage Skills @endsection



@section('content')
    <div class="row">
        <!-- Skills List -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Current Skills</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <ul class="list-group">
                            @if(count($skills) == 0)
                                <li class="list-group-item">There Are No Skills Currently.</li>
                            @endif
                            @foreach($skills as $skill)
                                <li class="list-group-item">
                                    <a href="{{ action('SkillsController@show',['skill' => $skill->id] )}}">{{ $skill->name }}</a> -
                                    {{ $skill->description }}
                                </li>
                            @endforeach
                        </ul>
                        {{ $skills->links() }}

                    </div>
                </div>
            </div>
        </div>

        <!-- Skills Create -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create Skill</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="{{ action('SkillsController@store') }}">
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


