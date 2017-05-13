
 {{ csrf_field() }}
 
<div class="form-group">
	<label for="">Nombre</label>
	<input type="text" class="form-control" name="nombre">
</div>
<div class="form-group">
	<label for="">Correo</label>
	<input type="email" class="form-control" name="correo">
</div>
<div class="form-group">
	<label for="">Teléfono</label>
	<input type="text" class="form-control" name="telefono">
</div>
<div class="form-group">
	<label for="">Contraseña</label>
	<input type="password" class="form-control" name="password">
</div>
<div class="form-group">
	<input type="submit" class="form-control" value="Enviar">
</div>