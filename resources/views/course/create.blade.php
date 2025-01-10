<x-admin-layout>
    @section('styles')
        <link href="{{ asset('modules/summernote/summernote-bs4.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <h1>Add Course</h1>
    @endsection

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Simple Summernote</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" type="text" name="title">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">Add Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
    @endsection
</x-admin-layout>
