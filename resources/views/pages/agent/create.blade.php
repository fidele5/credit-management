@extends('layouts.app')

@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Agent</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="{{ route('agent.store') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" class="form-control" name="title"
                                                       placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name">First Name</label>
                                                <input type="text" id="first-name" class="form-control" name="first_name"
                                                       placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="middle-name">Middle Name</label>
                                                <input type="text" id="middle-name" class="form-control" name="middle_name"
                                                       placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="last-name">Last Name</label>
                                                <input type="text" id="last-name" class="form-control" name="last_name"
                                                       placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="date-of-birth">Date Of Birth</label>
                                                <input type="date" id="date-of-birth" class="form-control" name="date_of_birth"
                                                       placeholder="Date Of Birth">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="place-of-birth">Place Of Birth</label>
                                                <input type="text" id="place-of-birth" class="form-control" name="place_of_birth"
                                                       placeholder="Place Of Birth">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" name="email"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone-number">Phone Number</label>
                                                <input type="number" id="phone-number" class="form-control" name="phone_number"
                                                       placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" class="form-control" name="address"
                                                       placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
