<div class="grid place-content-center h-screen gap-4">
  <ul class="menu bg-base-200 rounded-box w-80">
    <li class="menu-title text-center">Todo List</li>
    @forelse ($todos as $todo)
      <li>
        <div @class(['line-through' => $todo->selesai])>
          <div wire:click="toggleStatus({{ $todo->id }})">{{ $todo->tugas }}</div>
          <button class="badge badge-sm badge-error" wire:click="deleteTask({{ $todo->id }})">DEL</button>
        </div>
      </li>
    @empty
      <button class="font-bold justify-between py-2">Belum ada Tugas Yang dibuat</button>
    @endforelse
  </ul>
  <!-- Open the modal using ID.showModal() method -->
  <button class="btn" wire:click="$set('show', 1)">Buat Todolist</button>
  <dialog class="modal" {{ $show ? 'open' : '' }}>
    <form class="modal-box" wire:submit="addTask">
      <h3 class="text-lg font-bold text-center">Tambah Baru</h3>
      <div class="py-4">
        <label class="form-control w-full">
          <input type="text" placeholder="Tambah Tugas Baru" wire:model="newTask" @class([
              'input input-bordered w-full',
              'input-error' => $errors->first('newTask'),
          ]) />
          @error('newTask')
            <div class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
          @enderror
        </label>
        <div class="modal-action justify-center">
          <button type="button" class="btn" wire:click="$set('show', 0)">Close</button>
          <button class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
</form>
</dialog>
</div>
