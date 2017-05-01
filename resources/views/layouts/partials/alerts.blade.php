@if (Session::has('Success'))
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
   {!! Session::get('Success') !!}
</div>
@endif

@if (Session::has('Failure'))
<div class="alert alert-danger">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {!! Session::get('Failure') !!}
</div>
@endif