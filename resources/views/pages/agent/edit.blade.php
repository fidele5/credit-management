@extends('layouts.app')

@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Agent</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="{{ route('agent.update', $agent) }}"
                                novalidate>
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="row col-12 pr-0">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">First Name</label>
                                                    <input type="text" id="first-name-vertical"
                                                        class="form-control champ" name="first_name" required
                                                        data-validation-required-message="This First Name field is required"
                                                        value="{{ $agent->person->first_name }}"
                                                        placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" id="last_name" class="form-control champ" value="{{ $agent->person->last_name }}"
                                                        name="last_name" placeholder="Last name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-12 pr-0">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone_number">Phone number</label>
                                                    <input type="tel" id="phone number" class="form-control" value="{{ $agent->person->phone_number }}"
                                                        name="phone_number" placeholder="Phone number">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Email</label>
                                                    <input type="email" id="contact-info-vertical" class="form-control" value="{{ $agent->person->email }}"
                                                        name="email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row col-12 pr-0">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="date_of_birth">Date of birth</label>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control pickadate-months-year" value="{{ $agent->person->date_of_birth }}"
                                                            name="date_of_birth" placeholder="Select Date">
                                                        <div class="form-control-position">
                                                            <i class='bx bx-calendar'></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Place of birth</label>
                                                    <input type="text" id="contact-info-vertical" class="form-control" value="{{ $agent->person->place_of_birth }}"
                                                        name="place_of_birth" placeholder="Place of birth">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row col-12 pr-0">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="other_id">Title</label>
                                                    <input type="email" id="contact-info-vertical" class="form-control" value="{{ $agent->title }}"
                                                        name="title" placeholder="Title">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="other_id">Agent posision</label>
                                                    <select class="select2 form-control" id="agent_position_id" name="agent_position_id">
                                                        @foreach ($positions as $position)
                                                            <option value="{{$position->id}}" {{ ($agent->agent_position_id === $position->id) ? 'selected' : '' }} >{{ $position->description }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <fieldset class="form-label-group">
                                                    <textarea class="form-control champ" id="address" rows="3" name="address" placeholder="Address">{{ $agent->person->address }}</textarea>
                                                    <label for="address">Address</label>
                                                </fieldset>
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
