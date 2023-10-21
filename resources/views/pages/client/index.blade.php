@extends('layouts.app')

@section('content')
<section class="invoice-list-wrapper">
  <!-- create invoice button-->
  <div class="invoice-create-btn mb-1">
    <a href="{{ route('client.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"
      >New Client</a
    >
  </div>
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <!-- datatable start -->
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                    <th>id</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Adress</th>
                    <th>Other Id</th>
                    <th>Credits</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->person->first_name }} {{ $client->person->last_name }}</td>
                        <td>{{ $client->person->email }}</td>
                        <td>{{ $client->person->phone_number }}</td>
                        <td>{{ $client->person->address }}</td>
                        <td>{{ $client->other_id }}</td>
                        <td>{{ $client->credits->count() }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client) }}">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <a class="delete" href="{{ route("client.destroy", $client) }}">
                                <i class="bx bx-trash"></i>
                            </a>
                        </td>
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