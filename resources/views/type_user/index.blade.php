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




<!-- Content Row -->



<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Project Card Example -->
        <div class="d md-flex justify-content-md-end">
                <form action="{{ route('type_user.index') }}" method="GET">
                    <div class="btn-group">
                    <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="busqueda" placeholder="Digita que deseas buscar" class="form-control">
                        <input type="submit" value="Buscar" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                            <div class="d-flex justify-content-end">
                                   <a class="btn btn-success" href="type_user/create"><i class="fa-solid fa-user-plus"></i></a>
                        </div>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Tipo Usuario</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="mydatatable-container">
                                <table  cellspacing="0" width="100%" class="records_list table table-striped table-bordered table-hover table-condensed" id="mydatatable">
                                                    <thead>
                                                    <tr class="text-center">
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Tipo</th>
                                                            <th class="text-center">Nombre Usuario</th>
                                                            <th class="text-center">Ver</th>
                                                            <th class="text-center">Eliminar</th>
                                                            <th class="text-center">Editar</th>                                                                              
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($typeuser as $tyus)
                                                        <tr>
                                                            <td>{{$tyus->id}}</td>
                                                            <td>{{$tyus->type}}</td>
                                                            <td>{{$tyus->name}}</td>
                                                            <td><a href="type_user/{{ $tyus->id }}" class="btn btn-primary m-6"><i class="fa-solid fa-eye"></i></a></td>
                                                           <td>
                                                            <form action="{{ route('type_user.destroy',$tyus->id) }}" class="d-inline formulario-eliminar" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger m-6"><i class="fa-solid fa-trash"></i></button>
                                                           </form>
                                                        </td>
                                                            <td><a href="type_user/{{ $tyus->id }}/edit" class="btn btn-warning m-6"><i class="fa-solid fa-pen"></i></a></td>
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
     'Tipo Usuario Modificado',
     'success'
    )
                                    </script>
                                    @endif   

                                    @if(session('agregar') == 'Ok')
                                    <script>
                                 swal.fire(
      'Agregado!',
      'El usuario a sido agregado.',
      'success'
    )
                                    </script>
                                    @endif 


                                    @if(session('eliminar') == 'Ok')
                                    <script>
                                      Swal.fire(
     'Eliminado',
     'Tipo de Usuario Eliminado',
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