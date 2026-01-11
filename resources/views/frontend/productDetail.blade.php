@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-title mb-3 animate-fade-in mt-5 text-center">{{$product->title}}</span>
        </h2>
    </section>
    <section class="container mx-auto px-2">
        <div class="row align-items-center mt-5">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                    <img src="{{ asset('assets/img/material/sistelindo-content-01.png') }}"
                        class="rounded-lg shadow w-100 h-auto hover-lift" style="max-width: 1000px; height: 330px;" />
                </div>
            </div>
        </div>
    </section>


    <section class="text-center mt-1 px-4">
        <span class="text-title mb-3 animate-fade-in">Description  <span
                class="text-highlight"><strong>Detail</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-muted mx-auto mb-10" style="max-width: 700px;">
                {!!$product->description !!}
            </p>
        </div>
    </section>

     
@endsection
