<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FormGenerator extends Component implements HasForms
{

    use InteractsWithForms;

    public $values = [];
    public ?array $data = [];
    public $schema_fields = [];

    // public function __construct()
    // {
    //     $this->schema_fields = [
    //         (object) ['name' => 'First Name', 'input_type' => 'TextInput'],
    //         (object) ['name' => 'Age', 'input_type' => 'TextInput'],
    //         (object) ['name' => 'Email', 'input_type' => 'TextInput']
    //     ];
    // }

    function fieldGenerator($field)
    {
        print_r($field);

        if ($field->input_type === "TextInput") {
            return TextInput::make($field->name)->required();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(array_map(function ($field) {
                if ($field["input_type"] === "TextInput") {
                    return TextInput::make($field["name"])->required();
                }
            }, $this->schema_fields))
            ->statePath('data');
    }

    public function mount($fields)
    {
        $this->schema_fields = $fields->all();
        $this->form->fill();
    }

    public function create(): void
    {
        dd($this->form->getState());
        print_r($this->form->getState());
    }

    public function render()
    {
        return view('livewire.form-generator');
    }
}
