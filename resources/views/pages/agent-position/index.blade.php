@extends('layouts.app')

@section('content')
    <section class="invoice-list-wrapper">
        <!-- create invoice button-->
        <div class="invoice-create-btn mb-1">
            <a href="{{ route('agent-position.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"
            >New Agent Position</a
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
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($agent_positions as $position)
                                    <tr>
                                        <td>{{ $position->id }}</td>
                                        <td>{{ $position->description }}</td>
                                        <td><a href="{{ route('agent-position.edit', $position) }}"><i
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
