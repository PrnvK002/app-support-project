<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FormGenerator extends Component implements HasForms
{

    use InteractsWithForms;

    public $id;
    public ?array $data = [];
    public $schema_fields = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                ...array_map(function ($field) {
                    if ($field["input_type"] === "TextInput") {
                        return TextInput::make($field["name"])->columnSpan([
                            'sm' => 2,
                            'lg' => 6
                        ])->required();
                    }
                }, $this->schema_fields),

            ])
            ->statePath('data')
            ->columns(12);
    }

    public function mount($fields, $id)
    {
        $this->id = $id;
        $this->schema_fields = $fields->all();
        $this->form->fill();
    }

    public function create(): void
    {
        $this->dispatch('form-submitted', data: [...$this->form->getState(), "id" => $this->id]);
    }

    public function render()
    {
        return view('livewire.form-generator');
    }
}
