<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <form class="needs-validation" method="post" action="{{ route('profile.update') }}" novalidate="">
            @csrf
            @method('patch')
            <div class="card-header">
                <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" required="">
                        <div class="invalid-feedback">
                            Nama harus diisi
                        </div>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Kelas</label>
                        {{-- <input class="form-control" type="text" name="student_class" value="{{ Auth::user()->student_class }}" required=""> --}}
                        <select class="form-control select2" name="student_class" required>
                            @foreach($classes as $class)
                                <option value="{{ $class }}" {{ old('student_class', Auth::user()->student_class) == $class ? 'selected' : '' }}>{{ $class }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Kelas harus diisi
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}" required="">
                        <div class="invalid-feedback">
                            Email harus diisi
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
