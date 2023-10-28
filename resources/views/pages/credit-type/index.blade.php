@extends('layouts.app')

@section('content')
<section class="invoice-list-wrapper">
  <!-- create invoice button-->
  <div class="invoice-create-btn mb-1">
    <a href="{{ route('credit-type.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"
      >New Credit type</a
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Amount range start</th>
                    <th>Amount range end</th>
                    <th>Duration</th>
                    <th>Allowed documents</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($types as $type)
                    <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->title }}</td>
                    <td>{{ $type->description }}</td>
                    <td>{{ $type->amount_range_start }}</td>
                    <td>{{ $type->amount_range_end }}</td>
                    <td>{{ $type->duration }} days</td>
                    <td>{{ $type->allowed_documents }}</td>
                    <td><a href="{{ route('credit-type.edit', $type) }}"><i
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