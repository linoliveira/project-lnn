@extends('layouts.master')

@section('content')

    <h1>Show Person</h1>
    <p class="text-right lead">{{ link_to('/logout', 'Logout') }}</p>
    <p class="lead">{{ link_to_route('people.index', 'Return to all Persons') }}</p>

    <table id="show" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td>Name</td>
                <td>{{ $person->name }}</td>
            </tr>
            <tr>
                <td>Surname</td>
                <td>{{ $person->surname }}</td>
            </tr>
            <tr>
                <td>Birth Date</td>
                <td>{{ $person->birth_date }}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{ $person->gender }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $person->phone }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $person->email }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $person->address }}</td>
            </tr>
            <tr>
                <td>Profession</td>
                <td>{{ $person->profession }}</td>
            </tr>
            <tr>
                <td>Civil Status</td>
                <td>{{ $person->civil_status }}</td>
            </tr>
        </tbody>
    </table>
    <div class="div div-inline">
        {{ link_to_route('people.edit', 'Edit', array($person->id), array('class' => 'btn btn-info')) }}<br/><br/>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('people.destroy', $person->id)))}}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
    </div>

@stop