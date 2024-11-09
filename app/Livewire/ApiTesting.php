<?php

namespace App\Livewire;

use App\Models\ApiManagement;
use Livewire\Component;

class ApiTesting extends Component
{
    public function render()
    {
        $apis = ApiManagement::with('fields')->get();
        return view('livewire.api-testing')->with([
            'apis' => $apis
        ]);
    }
}
