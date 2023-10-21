@extends('layouts.app')

@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height justify-content-center">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">New credit type</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" method="post" action="{{ route('credit-type.store') }}" novalidate>
                @csrf
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="first-name-vertical">Title</label>
                      <input type="text" id="first-name-vertical champ" class="form-control" name="title" required
                      data-validation-required-message="This First Name field is required"
                        placeholder="Title">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" id="description" class="form-control champ" name="description"
                        placeholder="Description">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="contact-info-vertical">Amount range start</label>
                      <input type="number" id="contact-info-vertical" class="form-control champ" name="amount_range_start"
                        placeholder="Amount range start">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="contact-info-vertical">Amount range end</label>
                      <input type="number" id="contact-info-vertical" class="form-control champ" name="amount_range_end"
                        placeholder="Amount range end">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                        <fieldset class="form-label-group">
                              <textarea class="form-control champ" id="label-textarea" rows="3" name="allowed_documents" placeholder="Allowed documents"></textarea>
                              <label for="label-textarea">Allowed documents</label>
                          </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
