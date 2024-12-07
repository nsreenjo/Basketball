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
