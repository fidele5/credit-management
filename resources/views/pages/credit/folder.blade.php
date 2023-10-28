@extends('layouts.app')

@section('content')
    <section>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h5 class="card-title">Basic details</h5>
                    
                    
                    <a class="btn btn-sm d-block btn-block text-center btn-light-primary" href="{{ route('credit.edit', $credit) }}">
                        <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i>
                        <span>Edit</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
