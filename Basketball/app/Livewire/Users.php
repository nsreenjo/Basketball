<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;

    public $firstName, $midName, $lastName, $firstName_ar, $midName_ar, $lastName_ar;
    public $email, $password, $phone, $role, $user_id;
    public $isEditMode = false;


    protected $rules = [
        'firstName' => 'required|string|max:255',
        'midName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'firstName_ar' => 'required|string|max:255',
        'midName_ar' => 'required|string|max:255',
        'lastName_ar' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'phone' => 'required|string|max:15',
        'role' => 'required|in:superAdmin,coach,student',
    ];

    public function render()
    {

        return view('livewire.users', [
            'users' => User::latest()->paginate(10),
        ]);
    }

    public function resetInputFields()
    {
        $this->firstName = $this->midName = $this->lastName = '';
        $this->firstName_ar = $this->midName_ar = $this->lastName_ar = '';
        $this->email = $this->password = $this->phone = $this->role = '';
        $this->user_id = null;
        $this->isEditMode = false;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->dispatch('open-modal'); // This should work
    }

    public function store()
    {
        $this->validate();

        User::create([
            'firstName' => $this->firstName,
            'midName' => $this->midName,
            'lastName' => $this->lastName,
            'firstName_ar' => $this->firstName_ar,
            'midName_ar' => $this->midName_ar,
            'lastName_ar' => $this->lastName_ar,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'role' => $this->role,
        ]);

        session()->flash('message', 'User Updated Successfully.');
        $this->dispatch('close-modal'); // Emit Livewire event
        $this->resetInputFields();

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->firstName = $user->firstName;
        $this->midName = $user->midName;
        $this->lastName = $user->lastName;
        $this->firstName_ar = $user->firstName_ar;
        $this->midName_ar = $user->midName_ar;
        $this->lastName_ar = $user->lastName_ar;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role = $user->role;
        $this->isEditMode = true;

        $this->dispatch('open-modal'); // Trigger modal open
    }

    public function update()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->user_id,
        ]);

        $user = User::findOrFail($this->user_id);

        $user->update([
            'firstName' => $this->firstName,
            'midName' => $this->midName,
            'lastName' => $this->lastName,
            'firstName_ar' => $this->firstName_ar,
            'midName_ar' => $this->midName_ar,
            'lastName_ar' => $this->lastName_ar,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
        ]);

        session()->flash('message', 'User Updated Successfully.');
        $this->dispatch('close-modal'); // Emit Livewire event
        $this->resetInputFields();

    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
