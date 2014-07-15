@extends('layouts.layout_auth')

@section('content')
    <h1>Register Form</h1>
    @foreach ($errors->all() as $error)

            <p class="error">{{ $error }}<p>

    @endforeach
    {{  Form::open() }}

        <input type="text" name="email" placeholder="email" /><br/>
        <input type="password" name="password" placeholder="password" /><br/>
        <input type="password" name="password_confirmation" placeholder="password" /><br/>
        <input type="submit" value="Register" />

    {{ Form::close() }}

    <a href="/login">Alredy registered? Login here.</a>
@stop