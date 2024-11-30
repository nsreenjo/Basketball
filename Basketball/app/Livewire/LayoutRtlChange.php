<?php

namespace App\Livewire;

use Livewire\Component;

class LayoutRtlChange extends Component
{
    public $rtl = false;

    public function mount()
    {
        // Set the initial state from session or default to false (LTR)
        $this->rtl = session()->get('rtl', false);
    }

    public function changeRtl()
    {
        $this->rtl = !$this->rtl;

        // Store the RTL preference in the session
        session()->put('rtl', $this->rtl);

        // Emit event to JavaScript to handle layout change
        $this->dispatch('rtl-changed', ['rtl' => $this->rtl]);
    }

    public function render()
    {
        return view('livewire.layout-rtl-change');
    }
}
