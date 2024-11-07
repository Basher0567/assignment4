<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <h2 class="text-center mt-3 p-4">Search Data from Database</h2>
    <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search For Something">
    <form action="{{ url('search') }}" method="GET" align="center">
        <input type="search" name="search" placeholder="Search for Something">
        <input type="submit" value="Search">
    </form>
    <br><br>
    <h2 class="text-center">Display All Products</h2>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product_Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Image</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <img height="150" width="150" src="{{ $item->image }}" alt="MSG">

                                    </td>
                                    <td>
                                        <a href="{{ url('products', $item->id) }}">View</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('products', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>

                                    </td>
                                    <td>
                                        <a href="/products/{{ $item->id }}/edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('product_js')
</body>

</html>
