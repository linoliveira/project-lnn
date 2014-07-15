@extends ('layouts.layout_main')

@section('logout')

    <p>Hello, {{ isset($user) ? $user : '' }}. <a href="/logout">Logout</a><br>

@stop

@section('add_person')

    <input type="button" name="add" value="Add a Person" />

@stop

@section('list_users')



@stop

@section('content')

<< MAIN PAGE >>

@stop