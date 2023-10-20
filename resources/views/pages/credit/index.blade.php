@extends('layouts.app')

@section('content')
<section class="invoice-list-wrapper">
  <!-- create invoice button-->
  <div class="invoice-create-btn mb-1">
    <a href="{{ route('credit.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true"
      >New Credit</a
    >
  </div>
  <!-- Options and filter dropdown button-->
  <div class="action-dropdown-btn d-none">
    <div class="dropdown invoice-filter-action">
      <button
        class="btn border dropdown-toggle mr-1"
        type="button"
        id="invoice-filter-btn"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        Filter Invoice
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="invoice-filter-btn">
        <a class="dropdown-item" href="#">Downloaded</a>
        <a class="dropdown-item" href="#">Sent</a>
        <a class="dropdown-item" href="#">Partial Payment</a>
        <a class="dropdown-item" href="#">Paid</a>
      </div>
    </div>
    <div class="dropdown invoice-options">
      <button
        class="btn border dropdown-toggle mr-2"
        type="button"
        id="invoice-options-btn"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        Options
      </button>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="invoice-options-btn">
        <a class="dropdown-item" href="#">Delete</a>
        <a class="dropdown-item" href="#">Edit</a>
        <a class="dropdown-item" href="#">View</a>
        <a class="dropdown-item" href="#">Send</a>
      </div>
    </div>
  </div>
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
          <th>Tags</th>
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
                <a href="app-invoice-view.html">INV-00956</a>
            </td>
            <td><span class="invoice-amount">$459.30</span></td>
            <td><small class="text-muted">12-08-19</small></td>
            <td><span class="invoice-customer">Pixinvent PVT. LTD</span></td>
            <td>
                <span class="bullet bullet-success bullet-sm"></span>
                <small class="text-muted">Technology</small>
            </td>
            <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
            <td>
                <div class="invoice-action">
                <a href="app-invoice-view.html" class="invoice-action-view mr-1">
                    <i class="bx bx-show-alt"></i>
                </a>
                <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                    <i class="bx bx-edit"></i>
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