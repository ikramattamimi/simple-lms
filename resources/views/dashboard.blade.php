<x-app-layout>
    @section('header')
        <h1>Dashboard</h1>
    @endsection

    <h2 class="section-title">Semua Modul</h2>
    <p class="section-lead">Semua modul yang saat ini tersedia di aplikasi.</p>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-12 col-md-4 col-lg-4">
                <x-article-a :image="$course->image" :title="$course->title" :description="$course->description" :courseid="$course->id" />
            </div>
        @endforeach
    </div>

    <h2 class="section-title">Modul Saya</h2>
    <div class="row">
        @foreach ($enrolledCourses as $course)
            <div class="col-12 col-md-4 col-lg-4">
                <x-article-a :image="$course->image" :title="$course->title" :description="$course->description" :courseid="$course->id" />
            </div>
        @endforeach
    </div>

</x-app-layout>
