<x-admin-layout>
    @section('styles')
        <link href="{{ asset('modules/summernote/summernote-bs4.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <h1>Edit Chapter</h1>
    @endsection

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Chapter</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('chapters.update', $chapter->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title', $chapter->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $chapter->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Active</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="form-check">
                                <input type="hidden" name="is_active" value="0">
                                <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox" name="is_active" value="1" {{ old('is_active', $chapter->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label">Yes</label>
                            </div>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">Update chapter</button>
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
