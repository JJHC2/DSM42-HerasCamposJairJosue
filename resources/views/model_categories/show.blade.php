@include('layouts.header')
@include('layouts.menu')
@section('header')
@endsection
<style>
    h1{
        position: relative;
        left: 35%;
        font-family: cursive;
        font-style: italic;
    }
</style>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<!-- Bootstrap CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
<script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        </head>
<body class="container-fluid p-0">
    <h1>MODELO CATEGORIA</h1>
    <br>
    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Model Categoria</h6>
                                        </div>
                                        <div class="card-body">
                    
                                            <div class="table-responsive" id="mydatatable-container">
                                <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Descripcion</th>
                                                            <th class="text-center">Categoria</th>                                                                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$modelcategories->id}}</td>
                                                            <td>{{$modelcategories->description}}</td>
                                                            <td>{{$modelcategories->category->name_category}}</td>
                                                            </tr>
                                                            <div class="row">
                    <a href="/model_categories" class="btn btn-danger m-3">Salir</a>
                                                            </div>
                                                    </tbody>
                                                </table>
                                            </div>
                                    @include('layouts.footer')