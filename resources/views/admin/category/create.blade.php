<x-app-layout>
    @push('title')
        <title>Add Subcategory</title>
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
                                            <h3 class="card-title">Add a new Subcategory</h3>
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
                                        
                                        <form action="{{ route('subcategory.store') }}" method="POST">
                                            @csrf

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Select a category</label>
                                                    <select name="category_id" class="form-control">
                                                        @foreach ($category as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label >Category Name</label>
                                                    <input type="text" class="form-control" 
                                                        placeholder="Enter SubCategory name" name="subcategory_name" required value="{{ old('subcategory_name') }}">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Create</button>
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
