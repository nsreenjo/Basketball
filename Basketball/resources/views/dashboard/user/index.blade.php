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
            <a href="#" class="btn btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#user-add-modal">
                <i class="ti ti-plus f-18"></i> Add User
            </a>
        </div>

        <!-- [ Main Content ] start -->
        <table id="res-config" class="display table table-striped table-hover dt-responsive " style="width: 100%">
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
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : '../assets/images/user/avatar-5.jpg' }}" alt="User Image" class="rounded-circle img-fluid wid-40 me-2" />
                            <div>
                                <h6 class="mb-0">{{ $user->firstName }} </h6>
                                <small>{{ $user->firstName_ar }} </small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <h6 class="mb-0"> {{ $user->midName }}</h6>
                            <small> {{ $user->midName_ar }}</small>
                        </div>
                    </td>
                    <td>
                        <h6 class="mb-0"> {{ $user->lastName }}</h6>
                        <small> {{ $user->lastName_ar }}</small>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('View') }}">
                            <a href="#" class="avtar avtar-xs btn-link-secondary btn-pc-default" data-bs-toggle="modal" data-bs-target="#cust-modal">
                                <i class="ti ti-eye f-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                            <a href="{{ route('users.edit', $user->id) }}" class="avtar avtar-xs btn-link-success btn-pc-default">
                                <i class="ti ti-edit-circle f-18"></i>
                            </a>
                        </li>

                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this user?') }}');">
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
</script>
<!-- [Page Specific JS] end -->


@endsection
