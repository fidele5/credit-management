@extends('layouts.app')

@section('content')
    <section class="invoice-list-wrapper">
        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="{{ route('credit.create') }}" class="btn btn-primary glow invoice-create" role="button"
                aria-pressed="true">New Credit</a>
        </div>
        <!-- Options and filter dropdown button-->
        <div class="table-responsive">
            <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>
                            <span class="align-middle">Credit#</span>
                        </th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Credit type</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credits as $credit)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{ route('credit.show', $credit) }}">CR-{{ str_pad($credit->id, 4, '0', STR_PAD_LEFT); }}</a>
                            </td>
                            <td><span class="invoice-amount">${{ $credit->amount }}</span></td>
                            <td><small class="text-muted">{{ \Carbon\Carbon::parse($credit->created_at)->toDateString() }}</small></td>
                            <td><span class="invoice-customer">{{ $credit->client->person->first_name }} {{ $credit->client->person->last_name }}</span></td>
                            <td>
                                <small class="text-muted">{{ $credit->credit_type->title }}</small>
                            </td>
                            <td>
                              {{ $credit->duration }} days
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <div class="invoice-action">
                                    <a href="{{ route('credit.show', $credit) }}" class="invoice-action-view mr-1">
                                        <i class="bx bx-show-alt"></i>
                                    </a>
                                    <a href="{{ route('credit.edit', $credit) }}" class="invoice-action-edit cursor-pointer mr-1">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('credit.destroy', $credit) }}" class="invoice-action-edit cursor-pointer delete mr-1">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                    <a href="{{ route('credit.folder', $credit) }}" class="invoice-action-edit cursor-pointer">
                                        <i class="bx bx-folder"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
