<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Specific Product Details.</h1>

    Product_id:{{$data->product_id}}
    <br><br>
    Name:{{$data->name}}
    <br><br>
    Description:{{$data->description}}
    <br><br>
    Price:{{$data->price}}
    <br><br>
    Stock:{{$data->stock}}
    <br><br>
    Image: <img height="150" width="150" src="{{ $data->image }}" alt="MSG">

</body>
</html>
