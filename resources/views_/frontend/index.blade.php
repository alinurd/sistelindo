@extends('frontend.layouts.app')

@section('content')

@include('frontend.sections.hero')
@include('frontend.sections.about')
@include('frontend.sections.services')
@include('frontend.sections.values')
{{-- @include('frontend.sections.features') --}}
@include('frontend.sections.solution')
@include('frontend.sections.brands') 

@endsection
