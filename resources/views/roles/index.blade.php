@extends('master')

@section('title') Manage Roles @endsection



@section('content')
<div class="row">
    <!-- Roles List -->
    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Current Roles</h5>

            </div>
            <div class="ibox-content">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($roles as $role)
                            <li class="list-group-item">
                                <a href="{{ action('RolesController@show',['role' => $role->id] )}}">{{ $role->display_name }}</a> -
                                {{ $role->description }}
                            </li>
                        @endforeach
                    </ul>
                    {{ $roles->links() }}

                </div>
            </div>
        </div>
    </div>

    <!-- Roles Create -->
    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Create Role</h5>

            </div>
            <div class="ibox-content">
                <div class="panel-body">
                    <form method="POST" class="form-horizontal" action="{{ action('RolesController@store') }}">
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10"><input type="text" name="name" class="form-control" value="{{ old('name')}}">
                                <span class="help-block m-b-none text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('display_name')?'has-error':'' }}">
                            <label class="col-sm-2 control-label" >Display Name</label>
                            <div class="col-sm-10"><input type="text" name="display_name" value="{{ old('display_name')}}" class="form-control">
                                <span class="help-block m-b-none text-danger">{{ $errors->first('display_name') }}</span>
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


