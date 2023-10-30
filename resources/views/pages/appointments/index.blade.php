@extends('layouts.app')

@section('content')
    <section class="invoice-list-wrapper">
        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="{{ route('appointment.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"
            >New appointment</a
            >
        </div>
        <div class="users-list-table">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- datatable start -->
                        <div class="table-responsive">
                            <table id="users-list-datatable" class="table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Client</th>
                                    <th>Subject</th>
                                    <th>Start time</th>
                                    <th>End time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->client->person->first_name }} {{ $appointment->client->person->last_name }}</td>
                                        <td>{{ $appointment->object }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('Y-m-d H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->end_time)->format('Y-m-d H:i') }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <td><a href="{{ route('appointment.edit', $appointment) }}"><i
                                                    class="bx bx-edit-alt"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- datatable ends -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
