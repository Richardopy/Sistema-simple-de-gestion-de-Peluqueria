<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\User;

class Perfil extends Component{
    public function render()
    {

        $usuario_id = User::where(auth()->id());
       	$usuario = User::where('id',$usuario_id)->get();

        return view('livewire.perfil',['usuario'=>$usuario]);
    }
}
