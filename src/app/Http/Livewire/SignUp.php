<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SignUp extends Component {

    public $leader_name;
    public $email;
    public $phone;
    public $wilaya;
    public $member_2;
    public $member_3;
    public $member_4;
    public $participations_number;
    public $skills;
    public $step  = 1;

    public function render() {
        return view('livewire.sign-up');
    }

    public function updatedStep() {
        $this->dispatchBrowserEvent('step-updated');
    }

    public function save() {
        dd("hi");
    }

}
