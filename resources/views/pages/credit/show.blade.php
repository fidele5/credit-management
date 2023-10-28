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
                            <p>${{ $credit->amount }}</p>
                        </div>
                        <div class="col-6">
                            <h6><small class="text-muted">Duration</small></h6>
                            <p>{{ $credit->duration }} days</p>
                        </div>
                        <div class="col-6">
                            <h6><small class="text-muted">Start Date</small></h6>
                            <p>{{ !is_null($credit->start_date) ? $credit->start_date : ' - ' }}</p>
                        </div>
                        <div class="col-6">
                            <h6><small class="text-muted">End Date </small></h6>
                            <p>{{ !is_null($credit->end_date) ? $credit->end_date : ' - ' }}</p>
                        </div>
                        <div class="col-6">
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
                            <h6><small class="text-muted">Accepted by</small></h6>
                            <p>{{ !is_null($credit->accepted_by) ? $credit->user->person->first_name . ' ' . $credit->user->last_name : ' - ' }}
                            </p>
                        </div>
                        <div class="col-8">
                            <h6><small class="text-muted">Folder</small></h6>
                            <div class="card-body px-0 py-1">
                                <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                                    @foreach ($credit->documents as $document)
                                        <li class="widget-todo-item">
                                            <div
                                                class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                                <div class="widget-todo-title-area d-flex align-items-center">
                                                    <span
                                                        class="widget-todo-title ml-50">{{ $document->document_name }}</span>
                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    @if ($document->status === 1)
                                                        <div class="badge badge-pill badge-light-info mr-1">Accepted
                                                        </div>
                                                    @else
                                                        <div class="badge badge-pill badge-light-danger mr-1">Pending</div>
                                                    @endif

                                                </div>
                                                <div class="widget-todo-item-action d-flex align-items-center">
                                                    <a href="{{ route('credit.document.download', $document) }}"
                                                        class="invoice-action-edit cursor-pointer btn btn-icon rounded-circle btn-outline-primary mr-1">
                                                        <i class="bx bx-folder"></i>
                                                    </a>

                                                    <a href="{{ route('credit.document.accept', $document) }}"
                                                        class="accept btn btn-icon rounded-circle {{ $document->status ? 'btn-success' : 'btn-outline-success' }}  mr-1"
                                                        data-toogle="popover"
                                                        data-content="{{ $document->status ? 'Accepted' : 'Accept' }}"
                                                        data-trigger="hover" data-original-title title>
                                                        <i class="bx bx-check"></i>
                                                    </a>

                                                    <a href="{{ route('credit.document.destroy', $document) }}"
                                                        class="delete btn btn-icon rounded-circle btn-outline-danger">
                                                        <i class="bx bx-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-sm text-center btn-light-primary" href="{{ route('credit.edit', $credit) }}">
                        <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i>
                        <span>Edit</span>
                    </a>
                    @if (count($credit->documents))
                        @if ($ready)
                            <a class="btn btn-sm text-center btn-light-success" data-toggle="modal" data-target="#inlineForm">
                                <i class="cursor-pointer bx bx-check font-small-3 mr-25"></i>
                                <span>Accept</span>
                            </a>
                            <a class="btn btn-sm text-center btn-light-info" href="{{ route('credit.archive', $credit) }}">
                                <i class="cursor-pointer bx bxs-archive font-small-3 mr-25"></i>
                                <span>Compress</span>
                            </a>
                        @endif
                    @endif
                </div>
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Accept credit </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x"></i>
                                </button>
                            </div>
                            <form action="{{ route('credit.accept', $credit) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <label>Start date: </label>
                                    <div class="form-group">
                                        <input type="date" placeholder="Start date" name="start_date" class="form-control champ">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
