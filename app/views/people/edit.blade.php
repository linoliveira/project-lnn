@extends('layouts.master')

@section('references')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
        $( "#datepicker" ).datepicker({dateFormat: 'yy/mm/dd'});
        });
    </script>

@stop

@section('content')

    <h1>Edit Person</h1>
    {{ Form::model($person, array('method' => 'PATCH', 'route' => array('people.update', $person->id))) }}

<ul>
        <li>
            {{ Form::label('name', 'Name:') }}<br/>
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::label('surname', 'Surname:') }}<br/>
            {{ Form::text('surname') }}
        </li>
        <li>
            {{ Form::label('birth_date', 'Birth Date:') }}<br/>
            {{ Form::text('birth_date', null, array('id' => 'datepicker', 'readonly' => 'true')) }}
        </li>
        <li>
            {{ Form::label('gender', 'Gender:') }}<br/>
            {{ Form::select('gender', array('Female' => 'Female', 'Male' => 'Male'), 'Male') }}
        </li>
        <li>
            {{ Form::label('phone', 'Phone:') }}<br/>
            {{ Form::text('phone') }}
        </li>
        <li>
            {{ Form::label('email', 'Email:') }}<br/>
            {{ Form::text('email') }}
        </li>
        <li>
            {{ Form::label('address', 'Address:') }}<br/>
            {{ Form::text('address') }}
        </li>
        <li>
            {{ Form::label('profession', 'Profession:') }}<br/>
            {{ Form::text('profession') }}
        </li>
        <li>
            {{ Form::label('civil_status', 'Civil status:') }}<br/>
            {{ Form::select('civil_status', array('Married' => 'Married', 'Single' => 'Single'), 'Married') }}<br/><br/>
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
            {{ link_to_route('people.show', 'Cancel', $person->id, array('class' => 'btn btn-danger')) }}
        </li>
    </ul>

    {{ Form::close() }}

    @if($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    @endif

@stop