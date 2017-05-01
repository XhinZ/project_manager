@extends('master')

@section('title') Viewing Details of | {{ $task->name }} @endsection

@section('styles')
    <link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">

@endsection


@section('content')
    <div class="row">
        <!-- Users List -->
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{ $task->name }}</h5>

                        </div>
                        <div class="ibox-content">
                            <div class="panel-body">
                                <p>
                                    <b>Description : </b>
                                    {{ $task->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Create User -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Users To Task</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="{{ action('TaskController@addUser') }}">
                            <div class="form-group {{ $errors->has('users')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Users</label>
                                <div class="col-sm-10"><select class="js-example-placeholder-multiple2 js-states form-control"  name="users[]" multiple="multiple"></select>
                                </div>
                                <span class="help-block m-b-none text-danger">{{ $errors->first('users') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('location')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Location</label>
                                <div class="col-sm-10"><input type="text" name="location" class="form-control" value="{{ old('location')}}">
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('location') }}</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="details" class="form-control" placeholder="Enter Details">{{ old('description') }}</textarea>
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('skills')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Skills Required</label>
                                <div class="col-sm-10"><select class="js-example-placeholder-multiple2 js-states form-control"  name="skills[]" multiple="multiple"></select>
                                </div>
                                <span class="help-block m-b-none text-danger">{{ $errors->first('skills') }}</span>
                            </div>
                            <input type="hidden" name="task_id" value="{{$task->id}}"/>
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



@section('scripts')
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
       data: data2
        });
    </script>

@endsection