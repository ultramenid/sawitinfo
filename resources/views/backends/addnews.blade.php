@extends('layouts.backendLayout')


@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    {{-- <livewire:add-posts-component /> --}}
    <livewire:add-news-component />
@endsection
