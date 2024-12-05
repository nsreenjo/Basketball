@extends('layouts.dashboard')
@section('content')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Sample Page</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="text-end p-4 pb-sm-2">
            <!-- Button to open the modal for adding a new student -->
            <a href="#" class="btn btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#user-add-modal">
                <i class="ti ti-plus f-18"></i> Add Student
            </a>
        </div>

        <!-- [ Main Content ] start -->
        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Gender</th>
                    <th>Level of Player</th>
                    <th>Position</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Age Category</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->user->firstName }} </td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->levelOfPlayer }}</td>
                    <td>{{ $student->position }}</td>
                    <td>{{ $student->weight }}</td>
                    <td>{{ $student->height }}</td>
                    <td>{{ $student->ageCategory }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                            <a href="{{ route('students.show', $student->id) }}" class="avtar avtar-xs btn-link-secondary btn-pc-default">
                                <i class="ti ti-eye f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="{{ route('students.edit', $student->id) }}" class="avtar avtar-xs btn-link-success btn-pc-default">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="avtar avtar-xs btn-link-danger btn-pc-default">
                                    <i class="ti ti-trash f-18"></i>
                                </button>
                            </form>
                        </li>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- Modal for adding a new student -->
<div class="modal fade" id="user-add-modal" tabindex="-1" aria-labelledby="user-add-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user-add-modalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
    <!-- باقي الحقول السابقة -->

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" class="form-control" required>
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->firstName }} {{ $user->lastName }}</option>
            @endforeach
        </select>
    </div>

    <!-- باقي الحقول -->
</div>



                <div class="modal-body">
                    <!-- Fields for the student form -->
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Nationality" class="form-label">Nationality</label>
                        <input type="text" name="Nationality" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Birthday" class="form-label">Birthday</label>
                        <input type="date" name="Birthday" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="levelOfPlayer" class="form-label">Level of Player</label>
                        <input type="text" name="levelOfPlayer" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" name="position" class="form-control" required>
                    </div>

                      <div class="mb-3">
                        <label for="position" class="form-label">School Name</label>
                        <input type="text" name="schoolName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" name="weight" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <input type="number" name="height" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="ageCategory" class="form-label">Age Category</label>
                        <select name="ageCategory" class="form-control" required>
                            <option value="under 18">Under 18</option>
                            <option value="under 12">Under 12</option>
                            <option value="under 9">Under 9</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- [Page Specific JS] start -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
<script>
    // [ Configuration Option ]
    $('#res-config').DataTable({
        responsive: true
    });
</script>
<!-- [Page Specific JS] end -->

@endsection
