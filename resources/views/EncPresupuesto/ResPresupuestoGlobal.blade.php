@extends('layouts.app')

@section('content')
<hr>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Presupuesto Global de Recursos</div>
                <div class="panel-body">
                  <p class="pull-left"">Hoy: {{date("d/m/Y")}}</p><hr>
                    <form action="/insertPrograma" method="POST" enctype="multipart/form-data">  
                        {{ csrf_field() }}
                          <div class="form-group">
                              <label>Programa</label>
                            <select class="form-control" name="programa" >
                              <option value="" disabled="" selected="">Ingrese Opción</option>
                              <option value="1">PRAPS APS Municipal</option>
                              <option value="2">PRAPS APS Serv. Salud</option>
                              <option value="3">Percapita</option>
                              <option value="4">PPV</option>
                            </select>
                          </div> 
                           <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="input" type="input" class="form-control" placeholder="$ Monto" id="monto" name="monto" onkeyup="format(this)" onchange="format(this)"  class="TextBox" runat="server" id="txtMonto_" type="text" onkeypress="return validar(event)" type="number" required>
                            </div>
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
        <h5 class="modal-title" id="exampleModalLabel">¿Realmente esta seguro en registrar este monto?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Por favor, asegurese de que la información este de forma correcta.
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
