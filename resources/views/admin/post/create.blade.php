<x-app-layout>
    @push('title')
        <title>Add Subcategory</title>
    @endpush
    @auth


        <div class="hold-transition sidebar-mini">
            <div class="wrapper">
                <div class="content-wrapper">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row justify-content-center pt-4">
                                <div class="col-md-10">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Post</h3>
                                        </div>
                                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Category</label>
                                                    <select name="subcategory_id" class="form-control">    
                                                        <option value="" disabled selected>Select a category</option>       
                                                        @foreach ($category as $row)
                                                            <option value="{{ $row->id }}" class="text-center text-bold" disabled>{{ $row->name }}</option>
                                                            @php
                                                                $subcategory = DB::table('subcategories')->where('category_id', $row->id)->get();
                                                            @endphp
                                                            @foreach ($subcategory as $subcat)
                                                                <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Subcategory</label>
                                                    <select name="subcategory_id" class="form-control">           
                                                        @foreach ($subcategory as $row)
                                                            <option value="{{ $row->id }}">{{ $row->subcategory_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label>Post Title</label>
                                                    <input type="text" class="form-control" placeholder="Post Title" name="post_title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add Tags</label>
                                                    <input type="text" class="form-control" placeholder="Type Tags" name="tags">
                                                </div>
                                                <div class="form-group">
                                                    <label>Post Date</label>
                                                    <input type="date" class="form-control" placeholder="Type Tags" name="post_date">
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control summernote" rows="6" placeholder="Write your post here" required name="description"></textarea>
                                                  </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="image">
                                                            <label class="custom-file-label" for="exampleInputFile" >Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
