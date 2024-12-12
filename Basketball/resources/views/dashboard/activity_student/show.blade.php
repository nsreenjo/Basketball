@extends('layouts.dashboard')
@section('content')
    <style>
        .img-prod {
            height: 400px;
            object-fit: cover;
            width: 100%;
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .img-prod {
                height: 240px; /* Adjust height on smaller screens */
            }
        }
    </style>

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



            <!-- [ Main Content ] end -->
            <div class="ecom-content">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-sm-flex align-items-center justify-content-between gap-3">
                            <div class="form-search d-flex align-items-center">
                                <i class="ti ti-search"></i>
                                <input type="search" class="form-control" placeholder="Search Products" id="student-search"/>
                            </div>


                        </div>
                    </div>

                </div>

                <!-- Card List -->
                <div class="row" id="student-cards-container">
                    @foreach($students as $student)
                        <div class="col-6 col-sm-4 col-xl-3 student-card">
                            <div class="card product-card">
                                <div class="card-img-top">
                                    <a href="{{ route('students.show', $student->id) }}"
                                       data-bs-toggle="modal"
                                       data-bs-target="#student-details-modal-{{ $student->id }}">
                                        <img src="{{ $student->user->image ? asset('storage/' . $student->user->image) : '../assets/images/user/avatar-5.jpg' }}" alt="image" class="img-prod img-fluid" />

                                    </a>
                                    <div class="card-body position-absolute end-0 top-0">
                                        <a href="{{ route('students.edit', $student->id) }}" style="color: red; font-size: 25px;" data-bs-toggle="tooltip" title="Delete">
                                            <i class="ti ti-folder-minus"></i>
                                        </a>
                                    </div>
                                    <div class="btn-prod-cart card-body position-absolute end-0 bottom-0">
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning" data-bs-toggle="tooltip" title="Edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="../application/ecom_product-details.html">
                                        <p class="prod-content mb-0 text-muted">{{ $student->user->firstName }} {{ $student->user->lastName }}</p>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <h4 class="mb-0 text-truncate"><b>{{$student->ageCategory}}</b></h4>
                                        <div class="prod-color">
                                            <span class="bg-success"></span>
                                            <span class="bg-dark"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>




    <!-- [Page Specific JS] start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Search functionality
            $('#student-search').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('.student-card').each(function() {
                    var cardText = $(this).text().toLowerCase();
                    if (cardText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Pagination functionality
            const itemsPerPage = 8; // Number of items to show per page
            let currentPage = 1;

            function paginate() {
                const totalCards = $('.student-card').length;
                const totalPages = Math.ceil(totalCards / itemsPerPage);

                // Show cards for the current page
                $('.student-card').each(function(index) {
                    if (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Create pagination buttons
                let paginationHtml = '';
                for (let i = 1; i <= totalPages; i++) {
                    paginationHtml += `<button class="pagination-btn" data-page="${i}">${i}</button>`;
                }

                $('#pagination').html(paginationHtml);
            }

            // Handle page change
            $(document).on('click', '.pagination-btn', function() {
                currentPage = $(this).data('page');
                paginate();
            });

            // Initialize pagination on page load
            paginate();
        });
    </script>
    <!-- [Page Specific JS] end -->
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
            "Student Details": "تفاصيل الطالب",
            "Close": "إغلاق",
            "First Name": "الاسم الأول",
            "Gender": "الجنس",
            "Nationality": "الجنسية",
            "Birthday": "تاريخ الميلاد",
            "Level of Player": "مستوى اللاعب",
            "Position": "الموقع",
            "Weight": "الوزن",
            "Height": "الطول",
            "School Name": "اسم المدرسة",
            "Age Category": "فئة العمر",
            "Address": "العنوان",
            "undefined": " ",
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

            // Update modal content
            document.querySelector('.modal-title').textContent = translations['Student Details'];
            document.querySelector('.btn-link-danger').setAttribute('title', translations['Close']);

            const modalRows = document.querySelectorAll('.table tr');
            modalRows.forEach(row => {
                const label = row.querySelector('strong') ? row.querySelector('strong').textContent.trim() : '';
                if (translations[label]) {
                    row.querySelector('strong').textContent = translations[label];
                }
            });

            // Translate close button in the modal footer
            document.querySelector('.modal-footer .btn-light').textContent = translations['Close'];
        }

        // Check RTL mode and apply translations
        if (localStorage.getItem('rtl') === 'true') {
            document.documentElement.setAttribute('dir', 'rtl'); // Set RTL direction for proper layout
            translatePageToArabic();
        }
    </script>






@endsection
