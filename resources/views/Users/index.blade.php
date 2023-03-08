@extends('layouts.app')
@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUsers" data-bs-whatever="@mdo">Crear Usuario</button>


<div class="modal fade" id="createUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear nuevo Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id='formD' method='POST' action='/users'>
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" id="name" name='name'>
                <p style='color:red;'>{{$errors->login->first('name')}}</p>
            </div>
            <div class="mb-3">
                <label for="LastName" class="col-form-label">Last Name</label>
                <input type="text" class="form-control" id="LastName" name='LastName'>
                <p style='color:red;'>{{$errors->login->first('LastName')}}</p>
            </div>
            <div class="mb-3">
                <label for="Email" class="col-form-label">Email</label>
                <input type="email" class="form-control" id="Email" name='email'>
                <p style='color:red;'>{{$errors->login->first('email')}}</p>
            </div>
            <div class="mb-3">
                <label for="address" class="col-form-label">Address</label>
                <input type="text" class="form-control" id="address" name='address'>
                <p style='color:red;'>{{$errors->login->first('address')}}</p>
            </div>
            <div class="mb-3">
                <label for="Cellphone" class="col-form-label">Cellphone</label>
                <input type="text" class="form-control" id="Cellphone" name='Cellphone'>
                <p style='color:red;'>{{$errors->login->first('Cellphone')}}</p>
            </div>
            <div class="mb-3">
                <label for="CC" class="col-form-label">CC</label>
                <input type="text" class="form-control" id="CC" name='CC'>
                <p style='color:red;'>{{$errors->login->first('CC')}}</p>
            </div>
            <div class="mb-3">
                <label for="Category" class="col-form-label">Category</label>
                <select name="Category" id="Category" id='Category'>
                    @foreach ($category as $elemento)
                        <option value={{$elemento->id}}> {{$elemento->nameCategories}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="Country" class="col-form-label">Country</label>
                <select name="Country" id="Country">
                    @foreach ($country as $elemento)
                        <option value={{$elemento->id}}> {{$elemento->nameCountries}}</option>
                    @endforeach
                </select>
            </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submmit" class="btn btn-primary">Send message</button>
        </div>
       </form>
    </div>
  </div>
</div>



<table class="table table-success table-striped table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Last_name</th>
      <th scope="col">Address</th>
      <th scope="col">Cellphone</th>
      <th scope="col">CC</th>
      <th scope="col">Category</th>
      <th scope="col">Country</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($user as $elemento)
        <tr>
            <th scope="row">{{$elemento->id}}</th>
            <td>{{$elemento->name}}</td>
            <td>{{$elemento->last_name}}</td>
            <td>{{$elemento->address}}</td>
            <td>{{$elemento->cellphone}}</td>
            <td>{{$elemento->CC}}</td>
            <td>{{$elemento->nameCategories}}</td>
            <td>{{$elemento->nameCountries}}</td>
            <td>
            <form action=/users/{{$elemento->id}}>
                <button type="submmit" class="btn btn-primary">Modificar Usuarios</button>
            </form>
            <form method='POST' action=/users/{{$elemento->id}}>
                @csrf
                @method('DELETE')
                <input type="number" disabled name='id' value={{$elemento->id}}>
                <button type="submmit" class="btn btn-danger">Eliminar</button>
            </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
