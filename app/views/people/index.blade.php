@extends('layouts.master')

@section('content')

    <h1>All Persons</h1>
    <p class="text-right lead">{{ link_to('/logout', 'Logout') }}</p>
    @if (isset($admin))
        <p class="text-right lead">{{ link_to('/users', 'Manage Users') }}</p>
    @endif
    <p class="lead">{{ link_to_route('people.create', 'Add new Person') }}</p>

    @if($people->count())
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Birth Date</th>
                    <th>Email</th>
                    <th colspan=3></th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->surname }}</td>
                    <td>{{ $person->birth_date }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ link_to_route('people.show', 'Show', array($person->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('people.edit', 'Edit', array($person->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('people.destroy', $person->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        There are no Persons in the system.
    @endif

@stop