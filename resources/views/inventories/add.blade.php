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
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Altas Inventario</h1>
</div>


<!-- Content Row -->



<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alta Inventario</h6>
            </div>
            <div class="card-body">
                    
            <form action="{{ url('inventories') }}" id="agregar" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
              <label for="">ESTATUS</label>
              <select class="form-control form-select" aria-label="Default select example" name="status" required>
                <option>DISPONIBLE</option>
                <option>NO DISPONIBLE</option>
              </select>
              <label for="">USUARIO</label>
                    <select class="form-control form-select" aria-label="Default select example" name="usuario_id" required>
                    <option selected>Elige el Usuario</option>
                        @foreach($usuarios as $user)   
                    <option value={{$user->id}}>{{$user->name}}</option>
                       @endforeach
                    </select>
              <label for="">Nombre Producto</label>
              <select class="form-control form-select" aria-label="Default select example" name="product_id" required>
                    <option selected>Elige el producto</option>
                        @foreach($products as $product)   
                    <option value={{$product->id}}>{{$product->name_p}}</option>
                       @endforeach
                  </select>
                <div class="row">
                    <a href="/inventories" class="btn btn-danger m-3">Cancelar</a>
                    <button type="submit" class="btn btn-success m-3" value="save">Agregar</button>
                </div>
                </div>
</div>
            </form>
            </div>
        </div>

       

    </div>

  
</div>

</div>
<!-- /.container-fluid -->

@include('layouts.footer')

</div>
<!-- End of Main Content -->
<script type="text/javascript">
                                    $('#agregar').submit(function(r){
                                        r.preventDefault();

                             Swal.fire({
                                        title: '¿Estas Seguro?',
  text: "No Puedes Revertir Esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si,Agregalo!',
  cancelButtonText: 'No, Cancelalo!',
  cancelButtonColor: 'red',
  confirmButtonColor: 'green',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    
    this.submit();
  }else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swal.fire(
      'Cancelado',
      '¿Te Arrepentiste?',
      'error'

    )
  }
})
});
                                  </script>    