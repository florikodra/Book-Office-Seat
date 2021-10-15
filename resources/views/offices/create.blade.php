@extends('layouts.app')

@section('content')
    <div>

        <h1>{{ $pageTitle }}</h1>

        @include('offices.form', ['formUrl' => route('offices.store'), 'formMethod' => 'POST'])


    </div>
@endsection
