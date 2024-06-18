@extends('layouts.main')

@section('title', 'About')

@section('meta')
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    @parent
@endsection

@php($label = 'Name')
@php($error = 'Name is required')

@section('main')
    <h1>About</h1>
    <form action="">
        <p>{{ trans('auth.name', ['name' => request()->input('name')]) }}</p>
        <x-input-field
            type="number"
            label="Age"
            name="age"
            :error="$error"
        ></x-input-field>

        <x-input-field
            type="text"
            :$label
            name="name"
            :error="null"
        ></x-input-field>
    </form>
@endsection
