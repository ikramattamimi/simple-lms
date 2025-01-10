@props(['title', 'description', 'image', 'courseid', 'enrolled' => false])

<article class="article">
    <div class="article-header">
        <div class="article-image" data-background="{{ asset('storage/uploads/' . $image) }}">
        </div>
        <div class="article-title">
            <h2><a href="{{ route('courses.show', ['course' => $courseid]) }}">{{ $title }}</a></h2>
        </div>
    </div>
    <div class="article-details">
        <p>{{ $description }}</p>
        <div class="article-cta">
            @if ($enrolled)
                <a class="btn btn-primary" href="{{ route('courses.chapters', ['course' => $courseid]) }}">Lanjut Belajar</a>
            @else
                <a class="btn btn-primary" href="{{ route('courses.show', ['course' => $courseid]) }}">Selengkapnya</a>
            @endif
        </div>
    </div>
</article>
