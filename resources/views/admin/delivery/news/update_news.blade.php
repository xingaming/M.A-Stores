@extends('layout.app')
@section('content')
    <h2>Update News</h2>
@endsection
<style>
    #a {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #b {
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
                    <h3 class="card-title">Update News [{{ '$n->topic' }}]</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ url('news/updatePost/' . $n->id) }}">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">News ID</label>
                            <input type="text" class="form-control" name="id" id="id"
                                value="{{ $n->id }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Topic</label>
                            <input type="text" class="form-control" name="topic" id="topic"
                                value="{{ $n->topic }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" id="content" rows="3" class="form-control"> {{ $n->content }}</textarea>

                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <img src="{{ asset('images/' . $n->image) }}" alt="{{ $n->image }}" class="img-fluid" />

                            <div class="input-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" class="fileImage"
                                        name="fileImage" id="fileImage">

                                    <label class="custom-file-label" for="">Choose image
                                        file</label>
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


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@stop
