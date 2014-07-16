@extends('layouts.master')

@section('content')

    <center class="well">

        <h1>Register Form</h1>

        @foreach ($errors->all() as $error)

                <p class="error">{{ $error }}<p>

        @endforeach

        {{  Form::open() }}

            <br/><input type="text" name="email" placeholder="email@host.domain" /><br/><br/>
            <input type="password" name="password" placeholder="password" /><br/><br/>
            <input type="password" name="password_confirmation" placeholder="password" /><br/><br/>
            <input type="submit" value="Register" class="btn btn-success"/>

        {{ Form::close() }}

        <a href="/login">Alredy registered? Login here.</a>

    </center>
@stop