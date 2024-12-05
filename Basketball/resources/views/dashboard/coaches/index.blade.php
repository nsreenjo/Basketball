@extends('layouts.dashboard')

@section('content')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">

            @if ($message = session('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a >Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Coaches</a></li>
                                <li class="breadcrumb-item" aria-current="page">Coaches List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Coaches List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- Coaches Table -->
            <div class="col-md-12">
                <div class="text-end p-4 pb-sm-2">
                    <a href="#" class="btn btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#user-select-modal" id="add-user-btn">
                        <i class="ti ti-plus f-18"></i> Add User
                    </a>
                </div>
                <table id="res-config" class="display table table-striped table-hover dt-responsive " style="width: 100%">
                    <thead>
                    <tr>
                        <th id="first-name-header">First name</th>
                        <th id="mid-name-header">Mid name</th>
                        <th id="last-name-header">Last name</th>
                        <th id="email-header">Email</th>
                        <th id="phone-header">Phone</th>
                        <th id="role-header">Role</th>
                        <th id="action-header">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coaches as $coach)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $coach->user->image ? asset('storage/' . $coach->user->image) : '../assets/images/user/avatar-5.jpg' }}" alt="User Image" class="rounded-circle img-fluid wid-40 me-2" />
                                    <div>
                                        <h6 class="mb-0">{{  $coach->user->firstName }} </h6>
                                        <small>{{  $coach->user->firstName_ar }} </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <h6 class="mb-0"> {{  $coach->user->midName }}</h6>
                                    <small> {{  $coach->user->midName_ar }}</small>
                                </div>
                            </td>
                            <td>
                                <h6 class="mb-0"> {{  $coach->user->lastName }}</h6>
                                <small> {{  $coach->user->lastName_ar }}</small>
                            </td>
                            <td>{{  $coach->user->email }}</td>
                            <td>{{  $coach->user->phone }}</td>
                            <td>{{  $coach->user->role }}</td>
                            <td>


                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                    <form method="POST" action="{{ route('coaches.destroy',  $coach->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this user?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="avtar avtar-xs btn-link-danger btn-pc-default" style="border: none; background: none;">
                                            <i class="ti ti-trash f-18"></i>
                                        </button>
                                    </form>
                                </li>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- Coaches Table end -->
        </div>
    </div>
    @include('dashboard.coaches.create')
    <!-- [ Main Content ] end -->
    <!-- [Page Specific JS] start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/responsive.bootstrap5.min.js') }}"></script>
    <script>
        const translations = {
            "Home": "الرئيسية",
            "Other": "أخرى",
            "Sample Page": "صفحة نموذج",
            "First name": "الاسم الأول",
            "Mid name": "الاسم الثاني",
            "Last name": "الاسم الأخير",
            "Email": "البريد الإلكتروني",
            "Phone": "الهاتف",
            "Role": "الدور",
            "Action": "الإجراء",
            "Add User": "إضافة مستخدم",
            "View": "عرض",
            "Edit": "تعديل",
            "Delete": "حذف",
            "Are you sure you want to delete this user?": "هل أنت متأكد أنك تريد حذف هذا المستخدم؟"
        };

        function translatePageToArabic() {
            // Translate breadcrumb
            document.querySelectorAll('.breadcrumb-item').forEach(item => {
                const text = item.textContent.trim();
                if (translations[text]) {
                    item.textContent = translations[text];
                }
            });

            // Translate headers
            document.querySelectorAll('th, h2, a, button').forEach(el => {
                const text = el.textContent.trim();
                if (translations[text]) {
                    el.textContent = translations[text];
                }
            });

            // Translate tooltips
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                const text = el.getAttribute('title');
                if (translations[text]) {
                    el.setAttribute('title', translations[text]);
                }
            });

            // Update confirmation messages
            document.querySelectorAll('form[onsubmit]').forEach(form => {
                const confirmationText = form.getAttribute('onsubmit');
                if (confirmationText.includes("Are you sure you want to delete this user?")) {
                    form.setAttribute('onsubmit', confirmationText.replace(
                        "Are you sure you want to delete this user?",
                        translations["Are you sure you want to delete this user?"]
                    ));
                }
            });
        }

        // Check RTL mode and apply translations
        if (localStorage.getItem('rtl') === 'true') {
            document.documentElement.setAttribute('dir', 'rtl'); // Set RTL direction for proper layout
            translatePageToArabic();
        }
        // [ Configuration Option ]
        $('#res-config').DataTable({
            responsive: true
        });


    </script>
    <!-- [Page Specific JS] end -->

@endsection
