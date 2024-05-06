@extends('layouts.master')

@section('top-styles')
@endsection

@section('content')  

        <!-- Start Login Area -->
        <section class="login-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="login-content">
                            <h2>Create New Customer Account</h2>

                            <form class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Date">
                                </div>

                                <h5>Sign-in Information</h5>

                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mobile Number">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password">
                                </div>

                                <button type="submit" class="default-btn">Create An Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->
@endsection

@section('bottom-mid-scripts')
@endsection

@section('bottom-bot-scripts')
@endsection