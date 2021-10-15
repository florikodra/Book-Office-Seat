@extends('layouts.app')

@section('content')
    <div>

        <h1>{{ $pageTitle }}</h1>

        @include('companies.form', ['formUrl' => route('companies.store'), 'formMethod' => 'PUT'])

    </div>
@endsection
