@extends('welcome')
        @section('titulo' )
        <br>
        @endsection
        @section('contenido')
        
       <!-- Project Card Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Model Category</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Description</th>
                                                            <th class="text-center">Category Id</th>                                                    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ( $modelcat as $mode)
                                                            
                                                        <tr class="text-center">
                                                            <td>{{$mode->id_modcat}}</td>
                                                            <td>{{$mode->description}}</td>
                                                            <td>{{$mode->category_id}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
        
        
                                    @endsection
        @section('footer')
        @endsection 
        
@push('styles')
<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
@endpush
@push('scripts')
<script src="{{asset('libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
@if (!$errors->isEmpty())
@if ($errors->has('post'))
<script>
    $(function(){
        $('createMdl').modal('show')
    });
</script>
@else
<script>
     $(function(){
        $('editMdl').modal('show')
    });
</script>
    
@endif
    
@endif    



@endpush