@props(['title', 'description', 'image', 'courseid'])

<article class="article">
    <div class="article-header">
        <div class="article-image" data-background="{{ asset('storage/uploads/' . $image) }}">
        </div>
        <div class="article-title">
            <h2><a href="{{ route('course.show', ['course' => $courseid]) }}">{{ $title }}</a></h2>
        </div>
    </div>
    <div class="article-details">
        <p>{{ $description }}</p>
        <div class="article-cta">
            <a class="btn btn-primary" href="{{ route('course.show', ['course' => $courseid]) }}">Selengkapnya</a>
        </div>
    </div>
</article>
