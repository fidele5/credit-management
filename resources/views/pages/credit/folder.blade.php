@extends('layouts.app')

@section('content')
    <section>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="py-50">Id Proof</h6>
                        </div>
                        <form action="{{ route('credit.folder.store', $credit) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-12 form-group file-repeater">
                                    <div data-repeater-list="repeater_list">
                                        <div data-repeater-item="">
                                            <div class="row mb-2">
                                                <div class="col-md-4 col-sm-12 form-group">
                                                    <input type="text" class="form-control champ" name="document_name" placeholder="Name">
                                                </div>

                                                <div class="col-6 col-lg-6 mb-1">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input champ" name="file" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-2 col-lg-2 text-lg-right">
                                                    <button class="btn btn-icon btn-danger" type="button"
                                                        data-repeater-delete="">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col form-group p-0">
                                        <button class="btn btn-primary" data-repeater-create="" type="button">
                                            <i class="bx bx-plus"></i>Add
                                        </button>
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
