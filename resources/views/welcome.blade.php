@extends('layouts.app')

@section('title', 'Nexa Sites - Solusi Digital')

@section('content')
    @include('partials.nav')
    @include('partials.hero')
    @include('partials.services')
    @include('partials.advantages')
    @include('partials.pricing')
    @include('partials.portfolio')
    @include('partials.blog')
    @include('partials.footer')
@endsection
