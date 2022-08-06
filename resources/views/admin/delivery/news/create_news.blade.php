@extends('layout.app')
@section('content')
    <h2>Create news</h2>
@endsection
<style>
    #a{
     display: flex;
     align-items: center;
     justify-content: center;
    }
    #b{
        margin-top: 60px;
    }
</style>
<div class="container">
    <div class="row" id="a">
        <!-- left column -->
        <div class="col-md-6" id="b">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create News</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ url('product/createPost') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Topic</label>
                            <input type="text" class="form-control" name="topic" id="topic"
                                placeholder="Enter Prodcut Name" required>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Content</label>
                                <input type="text" class="form-control" name="content" id="content"
                                    placeholder="Enter Prodcut Description" required>
                            </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">File Input</label>
                                        <input type="file" class="file" name="file" id="file" required>
                                    </div>
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div> --}}
                                </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div>

                            @if (session('err_msg'))
                                <h6 style="color: red">
                                    Errors: {{ session('err_msg') }}
                                </h6>
                            @endif
                        </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->

    @section('script-section')
        <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <script>
            $(function() {
                bsCustomFileInput.init();
            });
        </script>
    @stop
