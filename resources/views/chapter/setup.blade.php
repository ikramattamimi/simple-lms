<x-admin-layout>

    @section('styles')
        <link href="{{ asset('modules/datatables/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection

    @section('header')
        <h1>Setup Modules</h1>
    @endsection

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('course.create') }}" class="btn btn-primary">
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
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{!! $course->description !!}</td>
                                    <td><img class="rounded" data-toggle="tooltip" src="{{ asset('storage/uploads/' . $course->image) }}" title="{{ $course->title }}" alt="image" width="100"></td>
                                    <td><a class="btn btn-secondary" href="#">Detail</a></td>
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
