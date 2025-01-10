<x-admin-layout>

    @section('styles')
        <link href="{{ asset('modules/datatables/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <div class="container">
            <h1>Setup Section</h1>
        </div>
    @endsection

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('sections.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Chapter</th>
                                <th>Title</th>
                                <th>Sequence</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="white-space: nowrap;">{{ $section->chapter->title }}</td>
                                    <td>{{ $section->title }}</td>
                                    <td>{{ $section->sequence }}</td>
                                    <td>
                                        <input type="checkbox" {{ $section->is_active ? 'checked' : '' }} disabled>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <a class="btn btn-primary" href="{{ route('sections.edit', $section->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this section?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        @if ($section->is_active)
                                            <form action="{{ route('sections.deactivate', $section->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('sections.activate', $section->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

    </div>
    @section('scripts')
        <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    @endsection
</x-admin-layout>
