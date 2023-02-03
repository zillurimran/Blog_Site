@extends('frontEnd.master')
@section('title')
    Log In
@endsection
@section('content')
    <main id="main">
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h1 class="page-title">Login</h1>
                        <span class="text-danger">{{ session('message') }}</span>
                    </div>
                </div>



                <div class="form col-md-6 mx-auto">
                    <form action="{{ route('user.login') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" name="user_name" class="form-control" placeholder="User Name" required>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="password"  placeholder="Password" required>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit">Login</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection

