@extends('layouts.master')

@section('content')

    <h1>Manage Users</h1>
    <p class="text-right lead">{{ link_to('/logout', 'Logout') }}</p>
    <p class="lead">{{ link_to_route('people.index', 'Return to all Persons') }}</p>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th colspan="2">Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['users'] as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{ Form::open() }}
                        {{ Form::hidden('id', $user->id) }}
                        C: {{ Form::checkbox('create', 'create', $user->can('can_create')) }}
                        R: {{ Form::checkbox('read', 'read', $user->can('can_read')) }}
                        U: {{ Form::checkbox('update', 'update', $user->can('can_update')) }}
                        D: {{ Form::checkbox('delete', 'delete', $user->can('can_delete')) }}
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        {{ Form::submit('Save', array('class' => 'btn')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ isset($data['js']) ? $data['js'] : '' }}

@stop