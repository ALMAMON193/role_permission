<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Add Role: {{ $role->name }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.givePermission', ['roleId' => $role->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label>Add Role Permission</label>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" value="{{ $permission->name}}" name="permission[]" class="form-check-input" id="permission-{{ $permission->name }}" {{ in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="permission-{{ $permission->name }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
