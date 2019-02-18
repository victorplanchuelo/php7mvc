<h1>Registro de usuarios</h1>
<div id="box" class="hidden">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <span class="msg-error"></span>
</div>
<form id="registro" action="<?=BASE_URL?>usuario/save" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <input type="button" id="boton_registro" value="Registrarse">
</form>
