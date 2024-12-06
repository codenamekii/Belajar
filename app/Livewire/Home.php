<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Home extends Component
{
  public $show = false;

  public $newTask = " ";

  public function addTask()
  {
    $this->validate([
      'newTask' => 'required'
    ]);
    Todo::create([
      'tugas' => $this->newTask,

    ]);

    $this->reset('newTask');
    $this->reset('show');
  }

  public function toggleStatus(Todo $todo)
  {
    $newStatus = !$todo->selesai;

    $todo->update([
      "selesai" => $newStatus,
    ]);
  }

  public function deleteTask(Todo $todo)
  {
    $todo->delete();
  }

  public function render()
  {
    return view('livewire.home', [
      'todos' => Todo::orderBy('selesai')->get()
    ]);
  }
}
