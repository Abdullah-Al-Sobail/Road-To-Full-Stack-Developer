@extends('layouts.backend.backendApp')

@section('backendContent')
    <div class="d-flex">
        <div class="col-md-7 me-2">
        <table class="table">
    <thead>
        <th>SL</th>
        <th>Brand Name</th>
        <th>Brand Image</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Razor</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
    </tbody>
</table>

</div>
    <div class="card col-md-4">
        <div class="card-header">
            <h3>Add New Brnad</h3>
        </div>
         <div class="card-body rounded-2">
             <form action="">

        <input type="text" placeholder="Brand Name" class="form-control mb-2">
        <input type="text" placeholder="Slug" class="form-control mb-2">
        <label for="">Brand Image</label>
        <input type="file" placeholder="Brand Name" class="form-control mb-2">
        <button type="submit" class="btn btn-primary w-100">Upload Brand</button>
    </form>
         </div>
    </div>
    </div>
@endsection
