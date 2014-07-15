@extends ('layouts.layout_auth')

@section('content')
    <h1>Login Form</h1>
    @foreach ($errors->all() as $error)

        <p class="error">{{ $error }}<p>

    @endforeach

    {{ Form::open() }}

        <input type="text" name="email" placeholder="email" /><br/>
        <input type="password" name="password" placeholder="password" /><br/>
        <input type="submit" value="Entrar" />

    {{ Form::close() }}

    <br/><a href="/register">Not registered? Register here.</a>

    {{ isset($js) ? $js : '' }}
@stop