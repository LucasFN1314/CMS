@php
//echo "<pre>";
//var_dump(Session::all());
//var_dump(Auth::check());
//var_dump(Auth::user());
//echo "<pre>";
@endphp


@php
$auth_user = '';
$auth_admin = '';

if(Auth::check()){
    Session::put('logged', 'true');
    $auth_user = true;

    if(Auth::user()->admin == 1) {
        Session::put('admin', 'true');
        $auth_admin = true;
    }
}
@endphp


<script>
    window.auth_user = {!! json_encode($auth_user); !!};
    window.auth_admin = {!! json_encode($auth_admin); !!};
</script>

<input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="/css/styles.css">
<div id="app">
    @yield('content')
</div>

<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  