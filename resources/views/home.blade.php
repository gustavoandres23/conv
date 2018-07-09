@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="{{url('/test')}}" method="POST" enctype="multipart/form-data">  
                        {{ csrf_field() }}
                        <div class="form-group">    
                            <label for="input">text</label>
                            <input id="name" type="input" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">    
                            <label for="input">Monto</label>
                            <input id="input" type="input" class="form-control" name="input" placeholder="$" id="monto" name="monto" onkeyup="format(this)" onchange="format(this)"  class="TextBox" runat="server" id="txtMonto_" type="text" onkeypress="return validar(event)" type="number" required>
                        </div>
                        <div class="form-group">
                  <span><i class="material-icons right">picture_as_pdf </i>Resolución</span>
                  <input type="file" name="file" class="form-control">

                        </div>
                        <div class="form-group">    
                            <label>date</label>
                            <input type="date" id="date" name="date" class="form-control">   
                        </div>
                        <div class="form-group">
                            <label> select</label>
                        <select id="select" class="form-control">
                                        <option value="">Choose...</option>
                                <optgroup label="Option group 1">
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                        <option value="">Option 3</option>
                                </optgroup>
                        </select>
                        </div>  
                        <div class="form-group">    
                            <button type="submit" class="btn btn-primary center-block">Guardar</button>    
                        </div>  
                    </form>          
                </div>
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
