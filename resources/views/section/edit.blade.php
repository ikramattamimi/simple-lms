<x-admin-layout>
    @section('styles')
        <link href="{{ asset('modules/summernote/summernote-bs4.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <div class="container">
            <h1>Edit section</h1>
        </div>
    @endsection

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.update', $section->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Chapter</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('chapter_id') is-invalid @enderror" name="chapter_id">
                                @foreach($chapters as $chapter)
                                    <option value="{{ $chapter->id }}" {{ old('chapter_id', $section->chapter_id) == $chapter->id ? 'selected' : '' }}>{{ $chapter->title }}</option>
                                @endforeach
                            </select>
                            @error('chapter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title', $section->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote form-control @error('body') is-invalid @enderror" name="body">{{ old('body', $section->body) }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sequence</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control @error('sequence') is-invalid @enderror" type="number" name="sequence" value="{{ old('sequence', $section->sequence) }}">
                            @error('sequence')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">Update section</button>
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
