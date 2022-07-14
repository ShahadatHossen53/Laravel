<x-app-layout>
    @push('title')
        <title>Manage Post</title>
    @endpush
    @auth

        <div class="hold-transition sidebar-mini">
            <div class="wrapper">
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>DataTables</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">DataTables</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">DataTable with default features</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SL.</th>
                                                        <th>Category</th>
                                                        <th>Subategory</th>
                                                        <th>Author</th>
                                                        <th>Title</th>
                                                        <th>Published</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($posts as $key => $row)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $row->category->name }}</td>
                                                            <td>{{ $row->subcategory->subcategory_name }}</td>
                                                            <td>{{ $row->user->name }}</td>
                                                            <td>{{ $row->title }}</td>
                                                            <td>{{ $row->post_date }}</td>
                                                            <td>
                                                                @if ($row->status == 1)
                                                                    <span class="badge badge-success">Active</span>
                                                                @else
                                                                    <span class="badge badge-danger">Not Active</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="row">

                                                                    <div class="col-md-3">
                                                                        <a href="{{ route('posts.edit', $row->id) }}"
                                                                            class="btn btn-info btn-sm">Edit</a>
                                                                    </div>
                                                                    <div class="col-md-4 ml-2">
                                                                        <form
                                                                            action="{{ route('posts.destroy', $row->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="_method"
                                                                                value="Delete">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm delete">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL.</th>
                                                        <th>Category</th>
                                                        <th>Subategory</th>
                                                        <th>Author</th>
                                                        <th>Title</th>
                                                        <th>Published</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- /.control-sidebar -->
        </div>
    @endauth

</x-app-layout>
