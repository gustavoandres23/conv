@extends('layouts.app')

@section('content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Distribución de recursos por comuna</div>

                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">  
                        {{ csrf_field() }}

                        @foreach($results as $res)
                                <label># {{$res->cod_programa}} <br> {{$res->nom_programa}} </label>

                        @endforeach
                  
                        <!--
                        <div class="form-group">
                        <label>Comuna</label>
                        <select id="select" name="programa" class="form-control">
                          <option value="">Seleccione una comuna</option>
                          <option value="1">Comuna 1</option>
                          <option value="2">Comuna 2</option>
                          <option value="3">Comuna 3</option>
                        </select>
                        </div> -->

                    <hr>
                    <div id="myform">
                    <b>Seleccione la comuna para asignarle un monto</b>
                        <table class="table">
                            <tr>
                                <td>Establecimiento:</td>
                                <td><div class="form-group">
                                    <select id="municipio" name="municipio" class="form-control">
                                    <option value="">Seleccione una comuna</option>
                                    <option value="1">Calbuco</option>
                                    <option value="2">Chaitén</option>
                                    <option value="3">Cochamó</option>
                                    <option value="4">Fresia</option>
                                    <option value="5">Frutillar</option>
                                    <option value="6">Futaleufú</option>
                                    <option value="7">Llanquihue</option>
                                    <option value="8">Los Muermos</option>
                                    <option value="9">Maullín</option>
                                    <option value="10">Palena</option>
                                    <option value="11">Puerto Montt</option>
                                    <option value="12">Puerto Varas</option>

                                    </select>
                                    </div> </td>
                            </tr>
                            <tr>
                                <td>Monto:</td>
                                <td><input type="text" class="form-control" id="monto"></td>
                            </tr>
                            <tr>
                                <td>Meta:</td>
                                <td><input type="text" class="form-control" id="meta"><br>
                                  <input type="button" id="add" value="(+) Agregar monto a comuna" class="btn btn-secondary" onclick="Javascript:addRow()"></td>
                            </tr>
                        </table>
                    </div>
                    </form>

                    <form action="/DisRecursosCom/{{$res->cod_programa}}" method="POST">
                        {{ csrf_field() }}
                        <div id="mydata">
                            <b>Tabla de movimientos</b>
                                <table id="myTableData"  cellpadding="2" class="table">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>Establecimiento</b></td>
                                        <td><b>Monto</b></td>
                                        <td><b>Meta</b></td>
                                    </tr>
                                </table>
                            &nbsp;<br/>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="form-group">  
                        <button type="submit" class="btn btn-primary">Asignar recursos</button>   
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
function addRow() {
         
    var estab = document.getElementById("municipio");
    var monto = document.getElementById("monto");
    var meta = document.getElementById("meta");
    var table = document.getElementById("myTableData");

    var rowCount = table.rows.length;

    var row = table.insertRow(rowCount);

    if(estab.value==1)var municipalidad = "Calbuco";
    if(estab.value==2)var municipalidad = "Chaitén";
    if(estab.value==3)var municipalidad = "Cochamo";
    if(estab.value==4)var municipalidad = "Fresia";
    if(estab.value==5)var municipalidad = "Frutillar";
    if(estab.value==6)var municipalidad = "Futaleufú";
    if(estab.value==7)var municipalidad = "Llanquihue";
    if(estab.value==8)var municipalidad = "Los Muermos";
    if(estab.value==9)var municipalidad = "Maullín";
    if(estab.value==10)var municipalidad = "Palena";
    if(estab.value==11)var municipalidad = "Puerto Montt";
    if(estab.value==12)var municipalidad = "Puerto Varas";

    
    row.insertCell(0).innerHTML= '<input type="button" class="btn-secondary" value="Quitar" onClick="Javascript:deleteRow(this)">';
    row.insertCell(1).innerHTML= "Municipalidad de "+municipalidad+'<input type="hidden" class="form-control" name="comuna'+rowCount+'"  value='+estab.value+'>';
    row.insertCell(2).innerHTML= '<input type="number" class="form-control" name="monto'+rowCount+'"  value='+monto.value+'>';
    row.insertCell(3).innerHTML= '<input type="text" class="form-control" name="meta'+rowCount+'"  value='+meta.value+'>';

   // myName.value = "";
    
}
/*
function change(obj) {

    var selectBox = obj;
    var selected = selectBox.options[selectBox.selectedIndex];
    selected.style.display = "none";


}
*/
function deleteRow(obj) {
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
}
</script>

@endsection
