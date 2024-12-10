@extends('layouts.dashboard')
@section('content')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">

            <!-- Display errors if any -->
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
                                <li class="breadcrumb-item"><a>Back</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Sessions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Sessions</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">View Sessions</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Session List</h5>
                    <a class="btn btn-primary"
                       data-bs-toggle="modal"
                       data-bs-target="#session-add-modal"
                    >Add New Session</a>
                </div>

                <div class="card-body">
                    <table id="res-config" class="display table table-striped table-hover dt-responsive " style="width: 100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity</th>
                            <th>Session Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sessions as $session)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $session->activity->name ?? 'Unknown' }}</td>
                                <td>{{ \Carbon\Carbon::parse($session->sessionDate)->format('Y-m-d') }}</td>
                                <td>{{ $session->sessionStartTime }}</td>
                                <td>{{ $session->sessionEndTime }}</td>
                                <td>
                                    @if($session->status == 'Present')
                                        <span class="badge bg-success">Present</span>
                                    @elseif($session->status == 'Absent')
                                        <span class="badge bg-danger">Absent</span>
                                    @elseif($session->status == 'Excused')
                                        <span class="badge bg-warning">Excused</span>
                                    @endif
                                </td>

                                <td>
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('View') }}">
                                        <a href="#" class="avtar avtar-xs btn-link-secondary btn-pc-default" data-bs-toggle="modal" data-bs-target="#cust-modal">
                                            <i class="ti ti-eye f-18"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                        <a href="{{ route('session.edit', $session->id) }}" class="avtar avtar-xs btn-link-success btn-pc-default">
                                            <i class="ti ti-edit-circle f-18"></i>
                                        </a>
                                    </li>

                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                        <form method="POST" action="{{ route('session.destroy', $session->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this user?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="avtar avtar-xs btn-link-danger btn-pc-default" style="border: none; background: none;">
                                                <i class="ti ti-trash f-18"></i>
                                            </button>
                                        </form>
                                    </li>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No sessions available</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>


                </div>
            </div>

        </div>
        @include('dashboard.session.create')
    </div>
    <!-- [ Main Content ] end -->
    <!-- [Page Specific JS] start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
    <script>
        $('#res-config').DataTable({
            responsive: true,
            language: {

            }
        }).on('responsive-display', function (e, datatable, row, showHide, update) {
            // Update the child rows
            const dtrTitles = document.querySelectorAll('.dtr-title');
            dtrTitles.forEach(title => {
                if (title.textContent.trim() === "undefined") {
                    title.textContent = ""; // Your default or translated title
                }
            });
        });
    </script>
    <script>
        // Image preview function
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('sessionImagePreview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Translations
        const modalTranslations = {
            "Add New Session": "إضافة جلسة جديدة",
            "Session Name": "اسم الجلسة",
            "Session Name (Arabic)": "اسم الجلسة (بالعربية)",
            "Date": "التاريخ",
            "Time": "الوقت",
            "Duration (in minutes)": "المدة (بالدقائق)",
            "Capacity": "السعة",
            "Activity": "النشاط",
            "Description": "الوصف",
            "Upload Image": "رفع صورة",
            "Cancel": "إلغاء",
            "Add Session": "إضافة الجلسة"
        };

        function translateModalToArabic() {
            document.getElementById("modal-title").textContent = modalTranslations["Add New Session"];
            document.getElementById("session-name-label").textContent = modalTranslations["Session Name"];
            document.getElementById("session-name-ar-label").textContent = modalTranslations["Session Name (Arabic)"];
            document.getElementById("session-date-label").textContent = modalTranslations["Date"];
            document.getElementById("session-time-label").textContent = modalTranslations["Time"];
            document.getElementById("session-duration-label").textContent = modalTranslations["Duration (in minutes)"];
            document.getElementById("session-capacity-label").textContent = modalTranslations["Capacity"];
            document.getElementById("session-activity-label").textContent = modalTranslations["Activity"];
            document.getElementById("session-description-label").textContent = modalTranslations["Description"];
            document.getElementById("session-image-label").textContent = modalTranslations["Upload Image"];
            document.getElementById("cancel-btn").textContent = modalTranslations["Cancel"];
            document.getElementById("add-session-btn").textContent = modalTranslations["Add Session"];
        }

        if (localStorage.getItem('rtl') === 'true') {
            document.documentElement.setAttribute('dir', 'rtl'); // Set RTL direction
            translateModalToArabic();
        }
    </script>

@endsection
