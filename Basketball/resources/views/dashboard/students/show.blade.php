<div class="modal fade" id="student-details-modal-{{ $student->id }}" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Student Details</h5>
                <a href="#" class="btn btn-link-danger ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-x f-20"></i>
                </a>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <!-- Student Image -->
                    <div class="col-md-4 text-center">
                        <div class="student-image">
                            <img class="img-fluid " src="{{ asset('storage/' . $student->user->image) }}" alt="Student image">
                        </div>
                        <h5 class="mt-3 text-primary">{{ $student->user->firstName }} {{ $student->user->lastName }}</h5>
                        <span class="badge bg-success">Active</span>
                    </div>

                    <!-- Student Details -->
                    <div class="col-md-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-id f-16"></i> <strong>First Name</strong></td>
                                            <td class="py-2">{{ $student->user->firstName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-user f-16"></i> <strong>Gender</strong></td>
                                            <td class="py-2">{{ $student->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-flag f-16"></i> <strong>Nationality</strong></td>
                                            <td class="py-2">{{ $student->Nationality }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-calendar f-16"></i> <strong>Birthday</strong></td>
                                            <td class="py-2">{{ $student->Birthday }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-star f-16"></i> <strong>Level of Player</strong></td>
                                            <td class="py-2">{{ $student->levelOfPlayer }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-map-pin f-16"></i> <strong>Position</strong></td>
                                            <td class="py-2">{{ $student->position }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-weight f-16"></i> <strong>Weight</strong></td>
                                            <td class="py-2">{{ $student->weight }} kg</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-height f-16"></i> <strong>Height</strong></td>
                                            <td class="py-2">{{ $student->height }} cm</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-school f-16"></i> <strong>School Name</strong></td>
                                            <td class="py-2">{{ $student->schoolName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-users f-16"></i> <strong>Age Category</strong></td>
                                            <td class="py-2">{{ $student->ageCategory }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted py-2"><i class="ti ti-map f-16"></i> <strong>Address</strong></td>
                                            <td class="py-2">{{ $student->address }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light text-muted" data-bs-dismiss="modal">
                    <i class="ti ti-x f-18"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
