@extends('layout.app')
@section('content')
<!-- page script -->
@yield('script-section')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>News</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lí tin tức và sự kiện</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="product" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>News ID</th>
                                <th>Topic</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $n)
                            <tr>
                                <td>{{ $n->id }}</td>
                                <td>{{ $n->topic }}</td>
                                <td>{{ $n->content }}</td>
                                <td><img width="100px" src="{{ url('images/'.$n->image) }}" /></td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ url('news/update/'.$n->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('news/delete/'.$n->id) }}" onclick="return xacnhan()">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>News ID</th>
                                <th>Topic</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <!-- page script -->
    @yield('script-section')
</table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@stop

@section('scrip-section')
<script>
    $(function(){
        $('#product').DataTable({
            "paging":true,
            "lengthChange":false,
            "searching":false,
            "ordering":true,
            "info":true,
            "autoWidth":false,
        });
    });

    function xacnhan(){
        return comfirm('Are you sure')
    }
</script>
