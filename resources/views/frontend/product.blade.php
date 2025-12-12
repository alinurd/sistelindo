@extends('frontend.layouts.app')

@section('content')
    {{-- TOP SPACING --}}
    <section class="w-full text-center mb-16 hero-wrapper animate-fade-in">
        <h2 class="text-4xl font-bold ">
            <span class="text-title mb-3 animate-fade-in mt-5 text-center">Product and <span
                    class="text-highlight"><strong>Service</strong></span></span>
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
        <span class="text-title mb-3 animate-fade-in">Empowering <span
                class="text-highlight"><strong>Business</strong></span></span>
        <div class="animate-fade-in stagger-delay-1">
            <p class="text-muted mx-auto mb-10" style="max-width: 700px;">
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

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row align-items-center" style="margin-left: 100px">
                <div class="col-lg-3 col-md-5 animate-slide-left stagger-delay-1">
                    <!-- Gambar di kiri -->
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <img src="{{ asset('assets/img/material/sistelindo-internet-solution-01.png') }}"
                            class="rounded-lg hover-grow" alt=""
                            style="width: 250px; height: 300px; object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-9 col-md-7 animate-slide-right stagger-delay-2 mt-4 mt-md-0">
                    <!-- Judul -->
                    <h2 class="text-title mb-1">Sistelindo <span class="text-highlight">Internet Solution</span></h2>

                    <!-- Subtitle -->
                    <p class="text-muted mb-3" style="font-size: 14px; color: #064b90; font-weight: 500;">
                        High Quality Dedicated Internet
                    </p>

                    <!-- Deskripsi -->
                    <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                        Consistently high-quality connection performance delivers fast upload and download speeds,
                        as well as optimal service quality. This is a priority network that customers need to
                        support their core business applications.
                    </p>

                    <!-- Grid fitur dalam 2 kolom -->
                    <div class="row">
                        <!-- Kolom kiri -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/material/p1.png') }}" width="40" height="40"
                                        class="shadow-sm rounded">
                                </div>
                                <div>
                                    <p class="mb-0" style="font-size: 0.95rem; font-weight: 500; color: #333;">
                                        Internet 1K
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/material/p2.png') }}" width="40" height="40"
                                        class="shadow-sm rounded">
                                </div>
                                <div>
                                    <p class="mb-0" style="font-size: 0.95rem; font-weight: 500; color: #333;">
                                        Layanan Internet untuk akses jaringan
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/material/p3.png') }}" width="40" height="40"
                                        class="shadow-sm rounded">
                                </div>
                                <div>
                                    <p class="mb-0" style="font-size: 0.95rem; font-weight: 500; color: #333;">
                                        Bandwidth 1:1
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/material/p3.png') }}" width="40" height="40"
                                        class="shadow-sm rounded">
                                </div>
                                <div>
                                    <p class="mb-0" style="font-size: 0.95rem; font-weight: 500; color: #333;">
                                        Monitoring Bandwidth Multi Router Traffic
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/material/p4.png') }}" width="40" height="40"
                                        class="shadow-sm rounded">
                                </div>
                                <div>
                                    <p class="mb-0" style="font-size: 0.95rem; font-weight: 500; color: #333;">
                                        4 IP Public
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/material/p6.png') }}" width="40" height="40"
                                        class="shadow-sm rounded">
                                </div>
                                <div>
                                    <p class="mb-0" style="font-size: 0.95rem; font-weight: 500; color: #333;">
                                        Static Protocol Routing
                                    </p>
                                </div>
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
