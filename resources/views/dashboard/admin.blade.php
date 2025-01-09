<x-admin-layout>
    @section('header')
        <h1>Dashboard Admin</h1>
    @endsection

    <h2 class="section-title">Modul Saya</h2>
    @if ($enrolledCourses->isEmpty())
        <p class="section-lead">Anda belum terdaftar di modul manapun.</p>
    @endif
    <div class="row">
        @foreach ($enrolledCourses->take(3) as $course)
            <div class="col-12 col-md-4 col-lg-4">
                <x-article-a :image="$course->image" :title="$course->title" :description="$course->description" :courseid="$course->id" :enrolled="true" />
            </div>
        @endforeach
    </div>

    <h2 class="section-title">Semua Modul</h2>
    <p class="section-lead">Semua modul yang saat ini tersedia di aplikasi.</p>
    <div class="row">
        @foreach ($courses->take(3) as $course)
            <div class="col-12 col-md-4 col-lg-4">
                <x-article-a :image="$course->image" :title="$course->title" :description="$course->description" :courseid="$course->id" />
            </div>
        @endforeach
    </div>
</x-admin-layout>
