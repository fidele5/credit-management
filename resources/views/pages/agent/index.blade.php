@extends('layouts.app')

@section('content')
    <section class="invoice-list-wrapper">
        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="{{ route('agent.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"
            >New Agent</a
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
                                    <th>Full Name</th>
                                    <th>Date of birth</th>
                                    <th>Place of birth</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ $agent->id }}</td>
                                        <td>{{ $agent->person->first_name . ' ' . $agent->person->midlle_name . ' ' . $agent->person->last_name }}</td>
                                        <td>{{ $agent->person->date_of_birth }}</td>
                                        <td>{{ $agent->person->place_of_birth }}</td>
                                        <td>{{ $agent->person->email }}</td>
                                        <td>{{ $agent->person->phone_number }}</td>
                                        <td>{{ $agent->title }}</td>
                                        <td>{{ $agent->person->address }}</td>

                                        <td><a href="{{ route('agent.edit', $agent) }}"><i
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
