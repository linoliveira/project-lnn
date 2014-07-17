@extends ('layouts.master')

@section('content')

    <center class="well">

        <h1>Login Form</h1>

        @foreach ($errors->all() as $error)

            <p class="error">{{ $error }}<p>

        @endforeach

        {{ Form::open() }}

            <br/><input type="text" name="email" placeholder="email@host.domain" /><br/><br/>
            <input type="password" name="password" placeholder="password" /><br/><br/>
            <input type="submit" value="Login" class="btn btn-info"/>

        {{ Form::close() }}

        <br/><a href="/register">Not registered? Register here.</a>

    </center>

    {{ isset($js) ? $js : '' }}
@stop