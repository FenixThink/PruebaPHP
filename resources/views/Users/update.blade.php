<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid bg-secondary p-5">
	<div class="row">
		<div class="col-md-12">
            <h1 class='mb-4 text-center'>Update User</h1>
                <form id='formD' method='PATCH' action=/users/>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id" class="col-form-label">Name</label>
                            <input type="number" disabled value={{$user->id}} class="form-control" id="id" name='id'>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name='name' value={{$user->name}}>
                            <p style='color:red;'>{{$errors->login->first('name')}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="LastName" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" id="LastName" name='LastName' value={{$user->last_name}}>
                            <p style='color:red;'>{{$errors->login->first('LastName')}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="Email" name='email' value={{$user->email}}>
                            <p style='color:red;'>{{$errors->login->first('email')}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="address" name='address' value={{$user->address}}>
                            <p style='color:red;'>{{$errors->login->first('address')}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="Cellphone" class="col-form-label">Cellphone</label>
                            <input type="text" class="form-control" id="Cellphone" name='Cellphone' value={{$user->cellphone}}>
                            <p style='color:red;'>{{$errors->login->first('Cellphone')}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="CC" class="col-form-label">CC</label>
                            <input type="text" class="form-control" id="CC" name='CC' value={{$user->CC}}>
                            <p style='color:red;'>{{$errors->login->first('CC')}}</p>
                        </div>
                        <div class="mb-3 d-flex justify-content-evenly">
                            <div class="left">
                                <label for="Category" class="col-form-label">Category</label>
                                <select name="Category" id="Category" id='Category'>
                                    <option value={{$user->id}}> {{$user->nameCategories}}</option>
                                    @foreach ($category as $elemento)
                                        <option value={{$elemento->id}}> {{$elemento->nameCategories}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="rigth">
                                <label for="Country" class="col-form-label">Country</label>
                                <select name="Country" id="Country">
                                    <option value={{$user->id}}> {{$user->nameCountries}}</option>
                                    @foreach ($country as $elemento)
                                        <option value={{$elemento->id}}> {{$elemento->nameCountries}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-evenly">
                        <button class='btn btn-secondary' type="button"><a href="/users" class='text-decoration-none color text-white'>Close</a></button>
                        <button type="submmit" class="btn btn-primary">Update user</button>
                    </div>
                </form>

		</div>
	</div>
</div>

</body>
</html>
