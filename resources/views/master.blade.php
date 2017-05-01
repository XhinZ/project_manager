<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> PM+ |@yield('title') </title>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{URL::asset("css/plugins/steps/jquery.steps.css")}}" rel="stylesheet" />
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">
    <link href="{{URL::asset("css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <link href="{{URL::asset("css/plugins/switchery/switchery.css") }}" rel="stylesheet">
    <link href="{{URL::asset("css/plugins/select2/select2.min.css") }}" rel="stylesheet">
    <link href="{{URL::asset("css/plugins/footable/footable.core.css") }}" rel="stylesheet">



    @yield('styles')
    <style type="text/css">@yield('css')</style>


</head>

<body>

<div id="wrapper">

    @include('layouts.partials.sidebar')
    @include('layouts.partials.navbar')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('layouts.partials.alerts')

        @yield('content')

    </div>
    <div class="footer">
        <div class="pull-right">
            Productivity Manager
        </div>
        <div>
            <strong>Copyright</strong> 2017
        </div>
    </div>

</div>
</div>

<!-- Mainly scripts -->
<script src="{{ URL::asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins/switchery/switchery.js') }}"></script>
<script src="{{ URL::asset('js/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins/chosen/chosen.jquery.js') }}"></script>


<!-- Custom and plugin javascript -->
<script src="{{ URL::asset('js/inspinia.js') }}"></script>
<script src="{{ URL::asset('js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins/iCheck/icheck.min.js') }}"></script>
<!-- Clock picker -->
<script src="{{ URL::asset('js/plugins/clockpicker/clockpicker.js') }}"></script>
<script src="{{ URL::asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('js/plugins/footable/footable.all.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $('.footable').footable();
        $('.footable2').footable();

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $('.clockpicker').clockpicker();


    });


</script>

@yield('scripts')

</body>

</html>
