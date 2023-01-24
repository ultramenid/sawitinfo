@extends('layouts.backendLayout')


@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <livewire:edit-news-component :id=$id />
@endsection
