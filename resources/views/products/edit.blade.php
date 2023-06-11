<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD </title>
</head>
<body>
    <div class="md-2">
    <h1>Edit a Product</h1>
    <a href="{{route('product.index')}}" class="btn btn-danger position-absolute top-0 end-0 mb-3"  >Product list</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
        <strong> {{ Session::get('message')}}</strong>
        </div>
          @endif
        <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
      <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control mb-3"  value="{{old('name', $product->name)}}" name="name" placeholder="Enter Product">
    
  </div>
   <div class="form-group">
    <label>Quantity</label>
    <input type="text" class="form-control mb-3" name="qty" value="{{old('qty',$product->qty)}}"  placeholder="qty">
    </div>

    <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control mb-3"  value="{{old('price',$product->price)}}" name="price" placeholder="Enter Price">
    
    
    </div>
    <div class="form-group">
    <label>Description</label>
    <textarea type="text" class="form-control mb-3 row-4"    name="description" placeholder="Enter Description">{{old('description',$product->description)}}</textarea>
    </div>
    </div>
   <div class="form-group">
    <label>image</label>
    <input type="file" class="form-control mb-3" name="image">
      <img src="{{ asset('images/'.$product->image) }}" alt="" width="50" height="50"  class="rounded-circle">
    
    </div>
   <div>
  <button type="submit" class="btn btn-dark" class ="mb-4" >Submit</button>
     </div>
 
</form>

    
  
</body>
</html>