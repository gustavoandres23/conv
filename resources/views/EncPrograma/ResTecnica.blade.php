@extends('layouts.app')

@section('content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingresar Resolución Sanitaria Minsal</div>

                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">  
                        {{ csrf_field() }}
                        <div class="form-group">    
                            <label for="input">Resolución</label>
                            <input id="nresolucion" type="input" placeholder="N°" class="form-control" name="nresolucion" required>
                        </div>
                        <div class="form-group">
                  <span><i class="material-icons">picture_as_pdf </i>Resolución</span>
                  <input type="file" name="file" class="form-control">

                        </div>
                        <div class="form-group">    
                            <label>Fecha Resolución</label>
                            <input type="date" id="date" name="date" class="form-control">
                        <div class="form-group">
                            <label>Programa</label>
                            <select id="select" name="programa" class="form-control">
                                        <option value="">Seleccione un programa</option>
                                        @foreach($results as $res)
                                            <option title="{{$res->nom_programa}}" value="{{$res->cod_programa}}">{{$res->cod_programa}} - {{$res->nom_programa}} </option>
                                        @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                        <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#exampleModal">
                          Registrar
                        </button>     
                        </div>  
                    </form>          
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Realmente esta seguro en registrar esta resolución?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Por favor, asegurese de que la informacion este correcta.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>    
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   function format(input)
        {
        var num = input.value.replace(/\./g,"");
        if(!isNaN(num)){
        num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split("").reverse().join("").replace(/^[\.]/, "");
        input.value = num;
        }

        else{ alert("Solo se permiten numeros");
        input.value = input.value.replace(/[^\d\.]*/g,"");
        }
        }
</script>

@endsection
