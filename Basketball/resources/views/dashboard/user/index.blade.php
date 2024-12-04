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
                <a
                    href="#"
                    class="btn btn-primary d-inline-flex align-items-center gap-2"
                    data-bs-toggle="modal"
                    data-bs-target="#user-add-modal"
                >
                    <i class="ti ti-plus f-18"></i> Add Customer
                </a>
            </div>

            <!-- [ Main Content ] start -->
            <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Mid name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : '../assets/images/user/avatar-5.jpg' }}"
                                     alt="User Image" class="rounded-circle img-fluid wid-40 me-2" />
                                <div>
                                    <h6 class="mb-0">{{ $user->firstName }} {{ $user->lastName }}</h6>
                                    <small>{{ $user->firstName_ar }} {{ $user->lastName_ar }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h6 class="mb-0">{{ $user->firstName }} {{ $user->lastName }}</h6>
                                <small>{{ $user->firstName_ar }} {{ $user->lastName_ar }}</small>
                            </div>
                        </td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                                <a
                                    href="#"
                                    class="avtar avtar-xs btn-link-secondary btn-pc-default"
                                    data-bs-toggle="modal"
                                    data-bs-target="#cust-modal"
                                >
                                    <i class="ti ti-eye f-18"></i>
                                </a>
                            </li>
                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                <a  wire:click="edit({{ $user->id }})" class="avtar avtar-xs btn-link-success btn-pc-default">
                                    <i class="ti ti-edit-circle f-18"></i>
                                </a>
                            </li>
                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                                <a wire:click="delete({{ $user->id }})" class="avtar avtar-xs btn-link-danger btn-pc-default">
                                    <i class="ti ti-trash f-18"></i>
                                </a>
                            </li>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            <!-- [ Main Content ] end -->
        </div>
        @include('dashboard.user.create')
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

        // [ New Constructor ]
        var newcs = $('#new-cons').DataTable();

        new $.fn.dataTable.Responsive(newcs);

        // [ Immediately Show Hidden Details ]
        $('#show-hide-res').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
            }
        });
    </script>
    <!-- [Page Specific JS] end -->


@endsection
