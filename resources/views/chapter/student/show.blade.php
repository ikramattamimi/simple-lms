<x-student-layout :openingChapters="$openingChapters" :courseTitle="$courseTitle" :currentChapterId="$chapter->id">
    @section('header')
        <div class="section-header-back">
            <a class="btn btn-icon" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ $courseTitle }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a>{{ $courseTitle }}</a></div>
            <div class="breadcrumb-item"><a>Sections</a></div>
        </div>
    @endsection

    <div class="card">
        <div class="card-body">
            {!! $chapter->body !!}
        </div>
    </div>

</x-student-layout>
