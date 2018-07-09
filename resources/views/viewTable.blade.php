@extends('layouts.app')

@section('content')
<div class="container">	<br>	<br>	
      <!--<table>
        <thead>
          <tr>
              <th>Name</th>
              <th>Date</th>
          </tr>
        </thead>
@foreach($users as $user)
        <tbody>
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->date}}</td>
          </tr>

        </tbody>
@endforeach
      </table>-->

                              <select id="select" name="programa" class="form-control">
                                        <option value="">Seleccione un usuario</option>
        
@foreach($users as $user)
                                        <option value="">{{$user->name}}</option>
@endforeach
                              
                        </select>
</div>
@stop