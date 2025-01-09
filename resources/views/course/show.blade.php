<x-app-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('modules/izitoast/css/iziToast.min.css') }}">
    @endsection

    @section('header')
        <div class="section-header-back">
            <a class="btn btn-icon" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ $course->title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>{{ $course->title }}</a></div>
        </div>
    @endsection

    <div class="row">
        <div class="col-md-3">
            <img class="card-img" src="{{ asset('storage/uploads/' . $course->image) }}" alt="{{ $course->title }}">
        </div>
        <div class="col-md-5 ml-md-3">
            <h4 class="card-title">{{ $course->title }}</h4>
            <p class="card-text">{{ $course->description }}</p>
        </div>
        <div class="col-md-3 ml-auto">
            <div class="card">
                <div class="card-body text-center">
                    @if ($course->students->contains(auth()->user()))
                        <a class="btn btn-primary col-12" href="{{ route('course.chapters', ['course' => $course->id]) }}">Lanjut Belajar</a>
                    @else
                        <a class="btn btn-primary col-12" href="{{ route('course.enroll', ['course' => $course->id]) }}">Daftar ke Modul Ini</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('modules/izitoast/js/iziToast.min.js') }}"></script>
        @if (session('status') == 'enrolled')
            <script>
                iziToast.success({
                    title: 'Success',
                    message: 'You have successfully enrolled in the course!',
                    position: 'topRight'
                });
                {{ session()->forget('status') }}
            </script>
        @elseif (session('status') == 'already_enrolled')
            <script>
                iziToast.warning({
                    title: 'Already Enrolled',
                    message: 'You are already enrolled in this course!',
                    position: 'topRight'
                });
                {{ session()->forget('status') }}
            </script>
        @endif
    @endsection

</x-app-layout>
