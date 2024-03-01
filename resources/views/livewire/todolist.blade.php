<div>
    <h3 class="mb-4" >Todo List</h3>
    <form class="mb-3"  wire:submit="save">
        <div class="mb-2">
            <label for="name">Judul Todo</label>
            <input type="text"  id="name" wire:model="name" class="form-control shadow-none">
        </div>
        <button type="submit" class="btn btn-primary">{{ $isEdit == true ? 'Edit Todo' : 'Buat' }}</button>
    </form>
    <hr class="mb-4">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Todo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $todolist as $key => $item)
                <tr>
                        
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" wire:click="edit({{ $item->id  }})" class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="delete({{ $item->id }})" wire:confirm="Apakah Kamu ingin Menghapusnya??">Hapus</button>
                        </div>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
