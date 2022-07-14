<x-app-layout>
    @push('title')
      <title>All Sub Category</title>
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
                                <table
                                  id="example1"
                                  class="table table-bordered table-striped"
                                >
                                  <thead>
                                    <tr>
                                      <th>Category</th>
                                      <th>Subategory</th>
                                      <th>Subategory Slug</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row->category->name }}</td>
                                            <td>{{ $row->subcategory_name }}</td>
                                            <td>{{ $row->subcategory_slug }}</td>
                                            <td>
                                                <div class="row">
  
                                                    <div class="col-md-3">
                                                        <a href="{{ route('subcategory.edit', $row->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <form action="{{ route("subcategory.destroy", $row->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="Delete">
                                                            <button type="submit" class="btn btn-danger btn-sm delete" >Delete</button>
                                                        </form>
                                                    </div> 
                                                    
                                                    
                                                </div>
                                                </div>  
                                            </td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>Category Name</th>
                                      <th>Category Slug</th>
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
                  <footer class="main-footer">
                    <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
                    <strong
                      >Copyright &copy; 2014-2021
                      <a href="https://adminlte.io">AdminLTE.io</a>.</strong
                    >
                    All rights reserved.
                  </footer>
            
                  <!-- Control Sidebar -->
                  <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                  </aside>
                  <!-- /.control-sidebar -->
                </div>
  
          </div>
      @endauth
  
  </x-app-layout>
  