@extends('layouts.app')

@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Credit</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="{{ route('credit.update', $credit) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Client</label>
                                                <select class="form-control select2" name="client_id">
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}"
                                                            {{ $credit->client_id === $client->id ? 'selected' : '' }}>
                                                            {{ $client->person->first_name }}
                                                            {{ $client->person->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Credit type</label>
                                                <select class="form-control select2" name="credit_type_id">
                                                    @foreach ($creditTypes as $creditType)
                                                        <option value="{{ $creditType->id }}"
                                                            {{ $credit->credit_type_id === $creditType->id ? 'selected' : '' }}
                                                        >
                                                            {{ $creditType->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" id="amount" class="form-control"
                                                        value="{{ $credit->amount }}" name="amount" placeholder="Amount">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="other_id">Duration</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="Duration"
                                                        value="{{ $credit->duration }}" name="duration"
                                                        aria-describedby="basic-addon1">
                                                    <div class="input-group-append">
                                                        <select class="form-control" name="duration_unit">
                                                            <option value="days">Days</option>
                                                            <option value="month">Month</option>
                                                            <option value="year">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
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
