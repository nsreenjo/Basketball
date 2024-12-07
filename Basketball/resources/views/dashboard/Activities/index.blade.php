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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Activities</a></li>
                            <li class="breadcrumb-item" aria-current="page">Manage Activities</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Manage Activities</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="text-end p-4 pb-sm-2">
            <a href="#" class="btn btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#activity-add-modal">
                <i class="ti ti-plus f-18"></i> Add Activity
            </a>
        </div>

        <!-- [ Main Content ] start -->
        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration (Hours)</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->description }}</td>
                    <td>{{ $activity->startDate }}</td>
                    <td>{{ $activity->endDate }}</td>
                    <td>{{ $activity->durationHours }}</td>
                    <td>{{ $activity->location }}</td>
                    <td>{{ $activity->price }}</td>
                    <td>{{ ucfirst($activity->type) }}</td>
                    <td>{{ ucfirst($activity->status) }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $activity->image) }}" alt="Activity Image" style="width: 50px; height: 50px;">
                    </td>
                    <td>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                            <a href="{{ route('activities.show', $activity->id) }}" class="avtar avtar-xs btn-link-secondary btn-pc-default">
                                <i class="ti ti-eye f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                            <a href="{{ route('activities.edit', $activity->id) }}" class="avtar avtar-xs btn-link-success btn-pc-default">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display: inline;">
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

@include('dashboard.Activities.creat')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
<script>
    $('#res-config').DataTable({
        responsive: true
    });
</script>

@endsection
