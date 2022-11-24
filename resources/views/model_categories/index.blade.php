@include('layouts.header')
@include('layouts.menu')
@section('header')
@endsection
        <br>
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
            <div class="d md-flex justify-content-md-end">
                <span>Buscar</span>
                <form action="{{ route('model_categories.index') }}" method="GET">
                    <div class="btn-group">
                    <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="busqueda" placeholder="Digita que deseas buscar" class="form-control">
                        <input type="submit" value="Buscar" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                        <div class="d-flex justify-content-end">
                                    <a class="btn btn-success" href="model_categories/create"><i class="fa-solid fa-arrow-up-from-ground-water"></i></a>
                        </div>
                                            <h6 class="m-0 font-weight-bold text-primary">Modelo Categoria</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="mydatatable-container">
                                <table  cellspacing="0" width="100%" class="records_list table table-striped table-bordered table-hover table-condensed" id="mydatatable">
                                                    <thead>
                                                    <tr class="text-center">
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Descripcion</th>
                                                            <th class="text-center">Categoria</th>  
                                                            <th class="text-center">Ver</th>
                                                            <th class="text-center">Eliminar</th>
                                                            <th class="text-center">Editar</th>                                                                              
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($modelcat as $mocat)
                                                        <tr>
                                                            <td>{{$mocat->id}}</td>
                                                            <td>{{$mocat->description}}</td>
                                                            <td>{{$mocat->name_category}}</td>
                                                            <td><a class="btn btn-success m-6" href="model_categories/{{$mocat->id}}" ><i class="fa-regular fa-eye"></i></a></td>
                                                           <td> <form action="{{ route('model_categories.destroy',$mocat->id) }}" class="d-inline formulario-eliminar" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger m-6"><i class="fa-solid fa-trash"></i></button>
                                                           </form>
                                                        </td>
                                                            <td><a href="model_categories/{{ $mocat->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a></td>
                                                            </tr>
                                                        @endforeach
</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @if(session('editar') == 'Ok')
                                    <script>
                                      Swal.fire(
     'Modificado',
     'Categoria Modificada',
     'success'
    )
                                    </script>
                                    @endif   

                                    @if(session('agregar') == 'Ok')
                                    <script>
                                 swal.fire(
      'Agregado!',
      'La Categoria a sido agregada.',
      'success'
    )
                                    </script>
                                    @endif 


                                    @if(session('eliminar') == 'Ok')
                                    <script>
                                      Swal.fire(
     'Eliminado',
     'Eliminada con Exito',
     'success'
    )
                                    </script>
                                    @endif
                                    <script>
                                      $('.formulario-eliminar').submit(function(e){
                                        e.preventDefault();



  
                                        Swal.fire({
  title: '¿Estás seguro?',
  text: "No Puedes Revertir Esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: 'green',
  cancelButtonColor: 'red',
  confirmButtonText: 'Si,Eliminalo!',
  cancelButtonText:'Cancelar'
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
        @include('layouts.footer')
        </body>