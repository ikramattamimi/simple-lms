<x-admin-layout>
    @section('styles')
        <link href="{{ asset('modules/summernote/summernote-bs4.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <h1>Create section</h1>
    @endsection

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Create section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Chapter</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('chapter') is-invalid @enderror" name="chapter_id">
                                @foreach($chapters as $chapter)
                                    <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                                @endforeach
                            </select>
                            @error('chapter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote form-control @error('body') is-invalid @enderror" name="body"></textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sequence</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control @error('sequence') is-invalid @enderror" type="number" name="sequence">
                            @error('sequence')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">Create Section</button>
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
