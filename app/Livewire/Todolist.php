<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todolist extends Component
{
    public $name = '';
    public $id_todo = 0;
    public $isEdit = false;

    public function save(){
        if($this->id_todo != 0){
            Todo::find($this->id_todo)->update(['name'=>$this->name]);
        }else{
            Todo::create([
                'name' => $this->name
            ]);
        }

        $this->reset();
        
    }

    public function edit($id){
        $todo = Todo::find($id);
        $this->id_todo = $todo->id;
        $this->name = $todo->name;
        $this->isEdit = true;        

    }

    public function delete($id){
        Todo::find($id)->delete();
    }
    public function render()
    {
        return view('livewire.todolist', [
            'todolist' => Todo::orderBy('id', 'desc')->get()
        ]);
    }
}
