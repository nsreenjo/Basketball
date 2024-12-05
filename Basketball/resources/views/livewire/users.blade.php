<div>
    <h2>User Management</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <!-- Create Button -->
    <div class="text-end p-4 pb-sm-2">
        <button wire:click="create" class="btn btn-primary">
            <i class="ti ti-plus f-18"></i> Create User
        </button>
    </div>

    <!-- User Table -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
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
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
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
        {{ $users->links('vendor.pagination.bootstrap-4') }}

    </div>

    <!-- User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $isEditMode ? 'Edit User' : 'Create User' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Profile Image -->
                            <div class="col-sm-3 text-center">
                                <div class="position-relative">
                                    <img class="rounded-circle img-fluid wid-70"
                                         src="{{ $image ? $image->temporaryUrl() : ($user->image ? asset('storage/' . $user->image) : '../assets/images/user/avatar-5.jpg') }}"
                                         alt="User Image" />
                                    <label for="upload-image" class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-1">
                                        <i class="ti ti-camera f-20 text-white"></i>
                                    </label>
                                    <input type="file" id="upload-image" class="d-none" wire:model="image" />
                                </div>
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- User Information -->
                            <div class="col-sm-9">
                                @foreach (['firstName', 'midName', 'lastName', 'firstName_ar', 'midName_ar', 'lastName_ar'] as $field)
                                    <div class="mb-3">
                                        <label>{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                        <input type="text" class="form-control" wire:model="{{ $field }}" />
                                        @error($field) <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endforeach
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" wire:model="email" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" wire:model="phone" />
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Role</label>
                                    <select class="form-select" wire:model="role">
                                        <option value="">Select Role</option>
                                        @foreach (['superAdmin', 'coaches', 'student'] as $role)
                                            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                @unless($isEditMode)
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" class="form-control" wire:model="password" />
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endunless
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Update' : 'Create' }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    window.addEventListener('open-modal', () => new bootstrap.Modal(document.getElementById('userModal')).show());
    window.addEventListener('close-modal', () => bootstrap.Modal.getInstance(document.getElementById('userModal')).hide());
</script>
