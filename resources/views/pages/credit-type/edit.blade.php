@extends('layouts.app')

@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height justify-content-center">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit credit type</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" method="post" action="{{ route('credit-type.update', $creditType) }}" novalidate>
                @csrf
                @method('PATCH')
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="first-name-vertical">Title</label>
                      <input type="text" id="first-name-vertical" class="form-control champ" name="title" value="{{ $creditType->title }}"
                        placeholder="Title">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" id="description" class="form-control champ" name="description" value="{{ $creditType->description }}"
                        placeholder="Description">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="contact-info-vertical">Amount range start</label>
                      <input type="number" id="contact-info-vertical" class="form-control champ" name="amount_range_start" value="{{ $creditType->amount_range_start }}"
                        placeholder="Amount range start">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="contact-info-vertical">Amount range end</label>
                      <input type="number" id="contact-info-vertical" class="form-control champ" name="amount_range_end" value="{{ $creditType->amount_range_end }}"
                        placeholder="Amount range end">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                        <label for="other_id">Duration</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Duration"
                                name="duration" aria-describedby="basic-addon1" value="{{ $creditType->duration }}">
                            <div class="input-group-append">
                                <select class="form-control select2" id="basicSelect"
                                    name="duration_unit">
                                    <option value="days" {{ $creditType->duration === 'days' ? 'selected' : '' }}>Days</option>
                                    <option value="month" {{ $creditType->duration === 'month' ? 'selected' : '' }}>Month</option>
                                    <option value="year" {{ $creditType->duration === 'years' ? 'selected' : '' }}>Years</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-12">
                    <div class="form-group">
                        <fieldset class="form-label-group">
                              <textarea class="form-control champ" id="label-textarea" rows="3" name="allowed_documents" placeholder="Allowed documents" required
                              data-validation-required-message="Veuillez completer les documents requis">{{ $creditType->allowed_documents }}</textarea>
                              <label for="label-textarea">Allowed documents</label>
                          </fieldset>
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection