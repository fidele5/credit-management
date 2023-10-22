@extends('layouts.app')

@section('content')
    <section>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h5 class="card-title">Basic details</h5>
                    <ul class="list-unstyled">
                        <li><i class="cursor-pointer bx bx-user mb-1 mr-50"></i>{{ $credit->client->person->first_name }}
                            {{ $credit->client->person->last_name }}</li>
                        <li><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>{{ $credit->client->person->address }}</li>
                        <li><i
                                class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i>{{ $credit->client->person->phone_number }}
                        </li>
                        <li><i class="cursor-pointer bx bx-time mb-1 mr-50"></i>{{ $credit->client->person->date_of_birth }}
                        </li>
                        <li><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>{{ $credit->client->person->email }}</li>
                    </ul>
                    <div class="row">
                        <div class="col-6">
                            <h6><small class="text-muted">Amount</small></h6>
                            <p>{{ $credit->amount }}</p>
                        </div>
                        <div class="col-6">
                            <h6><small class="text-muted">Duration</small></h6>
                            <p>{{ $credit->duration }} days</p>
                        </div>
                        <div class="col-6">
                            <h6><small class="text-muted">Start Date</small></h6>
                            <p>{{ $credit->start_date }}</p>
                        </div>
                        <div class="col-6">
                            <h6><small class="text-muted">End Date </small></h6>
                            <p>{{ $credit->end_date }}</p>
                        </div>
                        <div class="col-12">
                            <h6><small class="text-muted">Status</small></h6>
                            <p>
                                @if ($credit->status === 2)
                                    <span class="badge badge-light-success badge-pill">
                                        Accepted
                                    </span>
                                @elseif ($credit->status === 1)
                                    <span class="badge badge-light-info badge-pill">
                                        Checking
                                    </span>
                                @else
                                    <span class="badge badge-light-danger badge-pill">
                                        Pending
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="card-body px-0 py-1">
                                <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                    @foreach ($credit->documents as $document)    
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <span class="widget-todo-title ml-50">{{ $document->name }}</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    @if ($credit->status === 2)
                                                        <div class="badge badge-pill badge-light-success mr-1">Accepted</div>
                                                    @elseif ($credit->status === 1)
                                                        <div class="badge badge-pill badge-light-success mr-1">Checking</div>
                                                    @else
                                                        <div class="badge badge-pill badge-light-success mr-1">Pending</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                        <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                    </button>
                    <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                        <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                </div>
            </div>
        </div>
    </section>
@endsection
