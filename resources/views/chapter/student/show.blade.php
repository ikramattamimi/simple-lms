<x-student-layout>
    @section('header')
        <div class="container">
            <h1>{{ $chapter->title }}</h1>
        </div>
    @endsection

    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                @if ($chapter->title == 'Peta Konsep')
                    <div class="gallery gallery-fw" data-item-height="500">
                        <div class="gallery-item gallery-more"
                             data-image="{{ asset('storage/uploads/Peta Konsep.png') }}"
                             data-title="Image 1"
                             href="{{ asset('storage/uploads/Peta Konsep.png') }}"
                             title="Image 1"
                             style="background-image: url(&quot;{{ asset('storage/uploads/Peta Konsep.png') }}&quot;);">
                             <div style="line-height: 100px;">Klik untuk melihat</div>
                        </div>
                    </div>
                @else
                    {!! $chapter->description !!}
                @endif
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
