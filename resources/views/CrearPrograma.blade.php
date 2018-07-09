@extends('layouts.app')

@section('content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Distribución de Recursos</div>

                <div class="panel-body">
                    <form action="/newPrograma" method="POST">  
                        {{ csrf_field() }}
                        <div class="form-group">
                        <label>Programa</label>
                        <select id="select" name="programa" class="form-control">
                          <option value="">Seleccione un programa</option>
                          <optgroup label="Option group 1">
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                          </optgroup>
                        </select>
                        </div> 
                        <div class="form-group">
                        <label>dis</label>
                        <select id="select" name="dep" class="form-control">
                          <option value="">Seleccione un programa</option>
                          <optgroup label="Option group 1">
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                          </optgroup>
                        </select>
                        </div> 
                          <div class="form-row">
                          <div class="form-group col-md-6">
                          <label>n° Componente name </label>
                          <input id="input" type="input" class="form-control" placeholder="$ Monto" id="monto" name="monto" id="txtMonto_" type="text" required>
                          </div>
                        <!-- Button trigger modal -->
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
        <a href="/pdf/conv1.pdf">res</a>
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
