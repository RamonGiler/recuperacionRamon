@extends('plantilla.app')

@section('css')
     <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('contenido')

    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">:: Ingresar Empleado ::</h3>

          @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
          @endif
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('producto')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
                <label >Categoria</label>
                <select name="tipo_id" >
                    @foreach ($tipos as $item)
                        <option value="{{$item->id}}">{{$item->tipo}}</option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre producto">
            </div>
            <div class="form-group">
                <input type="date" name="fechadecontratacion" class="form-control" placeholder="Fecha de vencimiento">
              </div>
            <div class="form-group">
                <input type="text" name="sueldo" class="form-control" placeholder="Cantidad">
              </div>
              <div class="form-group">
                <input type="text" name="horastrabajas" class="form-control" placeholder="Precio">
              </div>
              <div class="form-group">
                <input type="text" name="departamento" class="form-control" placeholder="Precio">
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>
        </form>
      </div>
    </div>
    <div class="card col-md-12">
      <div class="card-header">
        <h3 class="card-title">:: Lista de Empleado ::</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Item</th>
            <th>nombre</th>
            <th>fecha de contratacion</th>
            <th>sueldo</th>
            <th>horas trabajadas</th>
            <th>departamento</th>
          </tr>
          </thead>
          <tbody>

           @foreach ($empleado as $item)
               <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->fechadecontratacion}}</td>
                  <td>{{$item->sueldo}}</td>
                  <td>{{$item->horastrabajas}}</td>
                  <td>{{$item->departamento}}</td>
                  <td><button class="btn btn-danger"><a href="{{url('empleado',$item->id)}}">Ventas</a></button></td>
                </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

  
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection