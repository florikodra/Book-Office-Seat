@extends('layouts.app')

@section('content')
    <div>

        <h1>{{ $pageTitle }}</h1>

        @include('employees.form', ['formUrl' => route('employees.store'), 'formMethod' => 'PUT'])

    </div>
@endsection
