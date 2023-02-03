@extends('frontEnd.master')
@section('title')
    Contact
@endsection
@section('content')
    <main id="main">
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h1 class="page-title">Register</h1>
                    </div>
                </div>



                <div class="form col-md-6 mx-auto">
                    <form action="{{ route('user.register') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" name="email"  placeholder="Your Email" required>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="phone"  placeholder="Your Phone" required>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="password"  placeholder="Your Password" required>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit">Register</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
