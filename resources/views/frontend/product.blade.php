@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-title mb-3 animate-fade-in mt-5 text-center">Product and <span
                    class="text-highlight"><strong>Service</strong></span></span>
        </h2>
    </section>
    <section class="container mx-auto px-4">
        <div class="row align-items-center mt-5">
            <div class="col-lg-12 mb-5 animate-fade-in stagger-delay-1">
                <div class="text-center">
                    <img src="{{ asset('assets/img/material/sistelindo-content-01.png') }}"
                        class="rounded-lg shadow w-100 h-auto hover-lift" style="max-width: 1000px; height: 330px;" />
                </div>
            </div>
        </div>
    </section>


    <section class="text-center mt-5 px-4">
        <span class="text-title mb-3 animate-fade-in">Empowering <span
                class="text-highlight"><strong>Business</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-gray-600 mx-auto mb-10" style="max-width: 700px;">
                To become a trusted company in the field of internet, data communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in IndonesiaTo become a trusted company in the field of internet, data
                communication
                services and ICT solutions in Indonesia
            </p>
        </div>
    </section>


    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 animate-slide-left stagger-delay-1">
                    <img src="{{ asset('assets/img/material/sistelindo-internet-solution-01.png') }}"
                        class="rounded-lg  object-cover w-100 h-auto hover-grow" alt=""
                        style="max-width: 450px; height: 330px;">
                </div>
                <div class="col-lg-6 offset-lg-1 animate-slide-right stagger-delay-2">
                    <span class="text-title ">Sistelindo <span class="text-highlight"><strong>Internet
                                Solution</strong></span></span>
                    <span class="" style="font-size: 12px; color: #064b90">High Quality Dedication Internet</span>
                    <p class="text-muted mt-3">
                        Welcome to PT Sistelindo Mitralintas (referred to as
                        Sistelindo) - a distinguished service provider offering a
                        comprehensive range of internet, data communication,
                        and value-added network services.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p1.png') }}" width="50"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Internet II
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p2.png') }}" width="50"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Layanan Internet Untuk Akses Jaringan
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p3.png') }}" width="50"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Bandwidth 1:1
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p3.png') }}" width="50"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Monitor Bandwidth Multi Router Trafic
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p4.png') }}" width="50"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    4 IP Public
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex mb-4">
                            <img src="{{ asset('assets/img/material/p6.png') }}" width="50"
                                class="shadow-sm rounded me-3" />
                            <div>
                                <p class="text-muted small mb-2">
                                    Static Protocol Routing
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.sections.line-of')
    @include('frontend.sections.product-service')




    
@endsection
