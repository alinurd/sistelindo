
@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-title mb-3 animate-fade-in mt-5 text-center">Contact <span
                    class="text-highlight"><strong>Us</strong></span></span>
        </h2>
    </section> 

 
@include('frontend.sections.contact')
@endsection
