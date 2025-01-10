<x-student-layout>
    @section('header')
        <div class="container">
            <h1>{{ $section->title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a>{{ $section->chapter->title }}</a></div>
            </div>
        </div>
    @endsection

    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                {!! $section->body !!}
            </div>
        </div>
    </div>

    @section('styles')
        <link rel="stylesheet" href="{{ asset('modules/chocolat/dist/css/chocolat.css') }}">
    @endsection

    @section('scripts')
        <script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    @endsection

</x-student-layout>
