@extends('layouts.app')

@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-7 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Appointment</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="{{ route('appointment.update', $appointment) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Client</label>
                                                <select class="form-control select2" id="basicSelect" name="client_id">
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}"
                                                            {{ $appointment->client_id === $client->id ? 'selected' : '' }}>
                                                            {{ $client->person->first_name }}
                                                            {{ $client->person->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" id="contact-info-vertical" class="form-control"
                                                    name="subject" placeholder="Subject" value="{{ $appointment->object }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="subject">Start time</label>
                                                        <input type="datetime" class="form-control"
                                                            placeholder="Select Date" name='start_time'
                                                            value="{{ $appointment->start_time }}">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="subject">End time</label>
                                                        <input type="datetime" class="form-control"
                                                            placeholder="Select Date" name='end_time'
                                                            value="{{ $appointment->end_time }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Status</label>
                                                <select class="form-control" name="status">
                                                    @foreach ($states as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $appointment->status === $status->id ? 'selected' : '' }}>
                                                            {{ $status->name }}</option>
                                                    @endforeach
                                                </select>
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
