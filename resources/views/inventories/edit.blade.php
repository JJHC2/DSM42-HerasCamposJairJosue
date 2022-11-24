@include('layouts.header')
@include('layouts.menu')

@section('header')
@endsection
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<!-- Bootstrap CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
<script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!-- CSS only -->
</head>
<body class="container-fluid p-0">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inventario</h6>
    </div>
    <div class="card-body">
<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary">Modificar Inventario</h1>
            </div>
            <div class="card-body">
                
            <form action="{{url('inventories/' .$inventories->id) }}" id="edit" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <label for="">ID</label>
                <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                <input class="form-control" type="text" value="{{$inventories->id}}" aria-label="Disabled input example" disabled>
                </div>
                <label for="">Estatus:</label><br>
                <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-signature"></i></span>
                <select name="status" id="status" class="form-control form-select" value="{{$inventories->status}}">
                    <option>DISPONIBLE</option>
                    <option>NO DISPONIBLE</option>
                </select>
                </div>
                <label for="">Productos:</label><br>
                <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-palette"></i></span>
                <select class="form-control" id="product_id" name="product_id" value="{{$inventories->product_id}}">
            <option selected>Selecciona el producto:</option> 
            @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name_p}}</option>   
            @endforeach
            </select>    
            </div>
            <label for="">Usuarios:</label><br>
                <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-palette"></i></span>
                <select class="form-control" id="usuario_id" name="usuario_id" value="{{$inventories->categories_id}}">
            <option selected>Selecciona el usuario:</option> 
            @foreach($usuarios as $usuario)
            <option value="{{$usuario->id}}">{{$usuario->name}}</option>   
            @endforeach
            </select>    
            </div>
                <div class="row">
                    <a class="btn btn-danger m-1"  href="/model_categories" >Cancelar</a>
                    <br>
                    <button type="submit" class="btn btn-success m-1" value="update">Guardar</button>
                </div>
            </form>
            </div>
        </div>

       

    </div>

  
</div>

</div>
<script>
     $('#edit').submit(function(a){
        a.preventDefault();
        Swal.fire({
  title: '¿Estas seguro?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: 'green',
  cancelButtonColor: 'red',
  confirmButtonText: 'Si,Modificalo!',
  cancelButtonText:'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
})
});
</script>
@include('layouts.footer')
</body>
<!-- End of Main Content -->