<section class="py-5 trusted-section  animate-fade-in">
    <div class="container text-center">

        <!-- TITLE -->
        <span class="text-title mb-3 animate-fade-in">Trusted by <span class="text-highlight"><strong>Global
                    Brands</strong></span></span>

                    <div class="row justify-content-center">
            <div class="col-lg-8 col-md-5">
                <p class="text-muted mx-auto" style="font-size: 18px">
                     With highly disciplined and hard working, our ICT team is committed to providing our clients with
            the best possible service. We protect people, property, and information across a wide range of
            verticals. With over 20-years' experience it's no wonder ICT is the access control manufacturer of
            choice for so many.
                </p>
            </div>
        </div>

  

        @include('frontend.sections.brand-pola')


        <!-- SPACING -->
        <div class="my-5 mt-4"></div>

        <!-- CONTACT BOXES -->
        <div class="row justify-content-center g-4">

            <!-- LEFT BOX -->
            <div class="col-md-5 col-lg-4">
                <div class="contact-box shadow-sm p-4 rounded-3"
                    style="min-height: 350px; height: 350px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <br><br>
                        <h5 class="fw-bold mb-3" style="color: #104f85;"><strong>Get Started</strong></h5>
                        <p class="text-muted small" style="font-size: 18px">
                            Contact us to learn how we can support your business. <br><br>
                            Let us know how we can contact you, what you would like to know,
                            and how we can help.
                        </p>
                    </div>
                </div>
            </div>

            <!-- RIGHT BOX -->
            <div class="col-md-5 col-lg-4">
                <div class="contact-box shadow-sm p-4 rounded-3"
                    style="min-height: 350px; height: 350px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <br><br>
                        <h5 class="fw-bold mb-3" style="color: #104f85;"><strong>Contact Our Expert</strong></h5>
                        <p class="text-muted small" style="font-size: 18px">
                            Need a hand using our services or managing your account?
                            Get in Touch, live human using our Help Center.
                        </p>
                        <a href="{{route('guest.contact')}}" class="btn btn-primary px-4 mt-2 align-self-start">Get in Touch</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
