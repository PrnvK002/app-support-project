<?php

namespace App\Livewire;

use App\Models\ApiManagement;
use Livewire\Attributes\On;
use Livewire\Component;

class ApiTesting extends Component
{

    public $apis = [];

    public function render()
    {
        $this->apis = ApiManagement::with('fields')->get();
        return view('livewire.api-testing')->with([
            'apis' => $this->apis
        ]);
    }

    #[On('form-submitted')]
    public function onSubmit($data)
    {
        $index = $data['id'];
        $filteredObjects = array_filter($this->apis->all(), function ($object) use ($index) {
            return $object->id === $index;
        });
        unset($data['id']);
        dd($data, $filteredObjects[0]['method']);
        // print_r($data);
    }
}
