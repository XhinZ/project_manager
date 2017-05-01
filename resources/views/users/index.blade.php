@extends('master')

@section('title') Manage Users @endsection

@section('styles')
        <link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">

    @endsection


@section('content')
    <div class="row">
        <!-- Users List -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Users List</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <ul class="list-group">
                            @if(count($users) == 0)
                                <li class="list-group-item">There Are No Users Currently.</li>
                            @endif
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <a href="{{ action('UsersController@show',['user' => $user->id] )}}">{{ $user->name }}</a> -

                                    @foreach($user->roles as $role)
                                        @if($loop->iteration == 1)
                                            {{ $role->display_name }}
                                        @else
                                            | {{ $role->display_name }}
                                        @endif
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                        {{ $users->links() }}

                    </div>
                </div>
            </div>
        </div>

        <!-- Create User -->
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create User</h5>

                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="{{ action('UsersController@store') }}">
                            <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10"><input type="text" name="name" class="form-control" value="{{ old('name')}}">
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10"><input type="email" name="email" class="form-control" value="{{ old('email')}}">
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10"><input type="password" name="password" class="form-control" value="{{ old('password')}}">
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>



                            <div class="form-group {{ $errors->has('roles')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Roles</label>
                                <div class="col-sm-10"><select class="js-example-placeholder-multiple js-states form-control" name="roles[]"  multiple="multiple"></select>
                                </div>
                                    <span class="help-block m-b-none text-danger">{{ $errors->first('roles') }}</span>
                            </div>

                            <div class="form-group {{ $errors->has('skills')?'has-error':'' }}">
                                <label class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10"><select class="js-example-placeholder-multiple2 js-states form-control"  name="skills[]" multiple="multiple"></select>
                                </div>
                                <span class="help-block m-b-none text-danger">{{ $errors->first('skills') }}</span>
                            </div>

                            <div class="form-group ">
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
        var data = [
                @foreach($roles as $role)
                    { id: {{$role->id}}, text: '{{$role->display_name}}'  },
                @endforeach
        ];

        var data2 = [
                @foreach($skills as $skill)
                    { id: {{$skill->id}}, text: '{{$skill->name}}'  },
                @endforeach
        ];

        $(".js-example-placeholder-multiple").select2({
            data: data
        });

        $(".js-example-placeholder-multiple2").select2({
            data: data2
        });
    </script>

    @endsection