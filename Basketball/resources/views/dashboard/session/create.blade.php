<div class="modal fade" id="session-add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" method="POST" action="{{ route('session.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="mb-0" id="modal-title">Add New Session</h5>
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-x f-20"></i>
                </a>
            </div>
            <div class="modal-body" style="max-height: 750px; overflow-y: auto;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <!-- Session Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" id="session-name-label">Session Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Session Name"
                                    name="name"
                                    required
                                />
                            </div>

                            <!-- Session Name in Arabic -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" id="session-name-ar-label">Session Name (Arabic)</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="أدخل اسم الجلسة"
                                    name="name_ar"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <!-- Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" id="session-date-label">Date</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="date"
                                    required
                                />
                            </div>

                            <!-- Time -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" id="session-time-label">Time</label>
                                <input
                                    type="time"
                                    class="form-control"
                                    name="time"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <!-- Duration -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" id="session-duration-label">Duration (in minutes)</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder="Enter Duration in Minutes"
                                    name="duration"
                                    min="1"
                                    required
                                />
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" id="session-capacity-label">Capacity</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder="Enter Capacity"
                                    name="capacity"
                                    min="1"
                                    required
                                />
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Activity -->
                            <label class="form-label" id="session-activity-label">Activity</label>
                            <select
                                class="form-select"
                                name="activity_id"
                                required
                            >
                                <option value="" disabled selected>Select Activity</option>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <!-- Description -->
                            <label class="form-label" id="session-description-label">Description</label>
                            <textarea
                                class="form-control"
                                placeholder="Enter Session Description"
                                name="description"
                                rows="3"
                            ></textarea>
                        </div>

                        <div class="mb-3">
                            <!-- Upload Image -->
                            <label class="form-label" id="session-image-label">Upload Image</label>
                            <input
                                type="file"
                                class="form-control"
                                name="image"
                                onchange="previewImage(event)"
                            />
                            <img
                                class="img-fluid mt-3"
                                src="../assets/images/placeholder.jpg"
                                alt="Session Image Preview"
                                id="sessionImagePreview"
                                style="max-width: 100px;"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-link-danger btn-pc-default" data-bs-dismiss="modal" id="cancel-btn">Cancel</button>
                <button type="submit" class="btn btn-primary" id="add-session-btn">Add Session</button>
            </div>
        </form>
    </div>
</div>

