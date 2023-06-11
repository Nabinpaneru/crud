<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD</title>
    <div class="card-body" >
    <table class="table card-body">

    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
    <strong>{{Session::get('message')}}</strong>
     </div>
  @endif
        
  <thead>
    <tr>
      <th scope="col">Sn</th>
      <th scope="col">Name</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      
      
      
    </tr>
  </thead> 
  <tbody>
  
    @foreach($product as $product)
    <tr>
      <th scope="row">{{$product-> id}}</th>
      <td>{{ $product->name}}</td>
      <td>{{ $product->qty}}</td>
      <td>{{ $product->price}}</td>
      <td>{{ $product -> description}}</td>
      <td>
        <img src= "{{ asset('/images/'.$product-> image) }}" alt="img" width="50" height="50" class="rounded-circle" />
       </td>

      <td><a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-primary ">Edit</a>
      <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger ">Delete</a></td>

      
    </tr>
    @endforeach
    <th>
      <tr><a href= "{{ route('product.create') }}" class="btn btn-dark">Product</a></tr>
    </th>
 </tbody>  
  

</table>
</div>   
</head>
<body>
   
</body>
</html>