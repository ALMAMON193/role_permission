<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>updaet permission</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.update', $permissions->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <lavel for="name">Permission Name</lavel>
                                <input type="text" name="name" class="form-control" value="{{ $permissions->name }}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





