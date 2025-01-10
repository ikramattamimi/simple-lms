<x-admin-layout>

    @section('styles')
        <link href="{{ asset('modules/datatables/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <h1>Setup Modules</h1>
    @endsection

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('courses.create') }}" class="btn btn-primary">
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
                                <th>Title</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chapters as $chapter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $chapter->title }}</td>
                                    <td>
                                        <input type="checkbox" {{ $chapter->is_active ? 'checked' : '' }} disabled>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('chapters.edit', $chapter->id) }}">Edit</a>
                                        @if ($chapter->is_active)
                                            <form action="{{ route('chapters.deactivate', $chapter->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning">Deactivate</button>
                                            </form>
                                        @else
                                            <form action="{{ route('chapters.activate', $chapter->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-info">Activate</button>
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
