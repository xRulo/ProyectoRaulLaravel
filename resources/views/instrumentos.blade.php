<!--COMPLETA: extiende el layout -->
@extends('layout.app')
<!--COMPLETA: empieza la sección -->
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Nueva instrumento
    </div>

    <div class="panel-body">
		<!-- Mostrar errores de validación -->
		@include('common.errors')
        
        <!-- Formulario para añadir una instrumento -->
        <form action="{{url('/instrumento')}}" method="POST" class="form-horizontal">
           <!-- Evitar XSS Cross Site Scripting -->
		   {{csrf_field()}}
            <!-- Nombre de la instrumento  -->
            <div class="form-group">
                <label for="instrumento-nombre" class="col-sm-3 control-label">Nombre</label>

                <div class="col-sm-6">
                    <input type="text" name="nombre" id="instrumento-nombre" class="form-control" value="{{ old('nombre') }}">
                </div>
            </div>
            <!-- tipo de la instrumento  -->
            <div class="form-group">
                <label for="instrumento-tipo" class="col-sm-3 control-label">Tipo de Instrumentos</label>

                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="tipo" value="Cuerda" checked {{ (old('tipo') == 'Cuerda') ? 'checked' : ''}}>Cuerda</label><br>
                    <label class="radio-inline"><input type="radio" name="tipo" value="Viento" {{ (old('tipo') == 'Viento') ? 'checked' : ''}}>Viento</label><br>
                    <label class="radio-inline"><input type="radio" name="tipo" value="Percusion" {{ (old('tipo') == 'Percusion') ? 'checked' : ''}}>Percusión</label><br>
                    <label class="radio-inline"><input type="radio" name="tipo" value="Electronicos" {{ (old('tipo') == 'Electronicos') ? 'checked' : ''}}>Electrónicos</label>
                </div>
            </div>
            <div class="form-group">
                <label for="instrumento-precio" class="col-sm-3 control-label">Precio</label>

                <div class="col-sm-6">
                    <input type="text" name="precio" id="instrumento-precio" class="form-control" value="{{ old('precio') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="instrumento-cantidad" class="col-sm-3 control-label">Cantidad</label>

                <div class="col-sm-6">
                    <input type="text" name="cantidad" id="instrumento-cantidad" class="form-control" value="{{ old('cantidad') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="instrumento-cantidad" class="col-sm-3 control-label">Color</label>

                <div class="col-sm-6">
                    @php ($datos = array("Negro", "Blanco", "Rojo", "Verde", "Azul", "Naranja"))
                    <select class="form-control" name="color">
                    @foreach($datos as $dato)
                    <option value="{{$dato}}" {{ old('color') == "$dato" ? 'selected' : '' }}>{{$dato}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="instrumento-marca" class="col-sm-3 control-label">Marca</label>

                <div class="col-sm-6">
                    <input type="text" name="marca" id="instrumento-marca" class="form-control" value="{{ old('marca') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="instrumento-estado" class="col-sm-3 control-label">Estado</label>

                <div class="col-sm-6">
                <label class="radio-inline"><input type="radio" name="estado" value="Nuevo" checked {{ (old('estado') == 'Nuevo') ? 'checked' : ''}}>Nuevo</label><br>
                <label class="radio-inline"><input type="radio" name="estado" value="Seminuevo" {{ (old('estado') == 'Seminuevo') ? 'checked' : ''}}>Seminuevo</label><br>
                </div>
            </div>
            <div class="form-group">
                <label for="instrumento-descripcion" class="col-sm-3 control-label">Descripción</label>
                
                <div class="col-sm-6">
                    <textarea rows=7 name="descripcion" id="instrumento-descripcion" class="form-control">
                        {{ old('descripcion') }}
                    </textarea>
                </div>
            </div>

            <!-- Add instrumento Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Nuevo instrumento
                    </button>
                </div>
            </div>
        </form>
    </div>
<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
		
			<!-- En este punto IRA el formulario para añadir una nueva instrumento -->
			
			<!-- instrumentoes Actuales -->
			@if (count($instrumentos) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						 Instrumentos Actuales
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Instrumento</th>
                                <th>Tipo</th>
                                <th>Precio</th>
							</thead>
							<tbody>
								@foreach ($instrumentos as $inst)
									<tr>
										<td class="table-text"><div>{{ $inst->nombre }}</div></td>
                                        <td class="table-text"><div>{{ $inst->marca }}</div></td>
                                        <td class="table-text"><div>{{ $inst->precio }}€</div></td>
                                        <td><form action="{{url('/instrumento/deleteinstrumento')}}" method="POST">
                                        {{ csrf_field() }}
                                            <!-- {{ method_field('DELETE') }} -->
                                            
                                            <input type="hidden" name="id_instrumento" value="{{ $inst->id }}" />
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>Eliminar
                                            </button>
                                        </form>
                                        </td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
<!--COMPLETA: termina la sección -->
@endsection
