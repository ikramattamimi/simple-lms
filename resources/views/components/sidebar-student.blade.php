<!-- Sidebar -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <p class="course-title">{{ $courseTitle }}</p>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a>EF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Pembuka</li>
            @foreach ($openingChapters as $ch)
                <li class="dropdown {{ $ch->slug == $slug ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('chapters.show', $ch->slug) }}">
                        <i class="fas fa-door-open"></i><span>{{ $ch->title }}</span>
                    </a>
                </li>
            @endforeach
            <li class="menu-header">Materi Utama</li>
            @foreach ($mainChapters as $ch)
                @php
                    $hasCurrentSection = false;
                    foreach ($ch->sections as $sec) {
                        if ($sec->slug == $slug) {
                            $hasCurrentSection = true;
                            break;
                        }
                    }
                @endphp
                <li class="dropdown {{ $ch->slug == $slug || $hasCurrentSection ? 'active' : '' }}">
                    <a class="nav-link has-dropdown" href="{{ route('chapters.show', $ch) }}">
                        <i class="fas fa-book"></i><span>{{ $ch->title }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($ch->sections as $sec)
                            <li class="{{ $sec->slug == $slug ? 'active' : '' }}">
                                <a class="nav-link nav-link-sections" data-toggle="tooltip" data-placement="right" href="{{ route('sections.show', $sec) }}" title="{{ $sec->title }}">
                                    {{ $sec->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </aside>
</div>
