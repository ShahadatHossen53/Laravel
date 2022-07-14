<x-app-layout>
    @push('title')
        <title>Edit Subcategory</title>
    @endpush

    @auth


        <div class="hold-transition sidebar-mini mt-4">
            <div class="wrapper">
                <div class="content-wrapper">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-sm-3"></div>
                                <div class="col-md-6">

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Edit{{ $data->subcategory_name }} Subcategory</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <!-- Session Status -->
                                        {{-- <strong class="text-success">
                                            <x-auth-session-status class="mb-4" :status="session('success')" />
                                        </strong> --}}
                                        
                                        <!-- Validation Errors -->
                                        <strong class="text-warning">
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        </strong>
                                        
                                        <form action="{{ route('subcategory.update',$data->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PATCH">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Select a category</label>
                                                    <select name="category_id" class="form-control">
                                                        @foreach ($category as $row)
                                                            <option value="{{ $row->id }}" @if ($row->id == $data->category_id )
                                                                selected
                                                            @endif>{{ $row->name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label >Subategory Name</label>
                                                    <input type="text" class="form-control" 
                                                        placeholder="Enter SubCategory name" name="subcategory_name" required value="{{ $data->subcategory_name }}">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


    @endauth

</x-app-layout>
