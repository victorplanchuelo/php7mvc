$(() => {
    //Apartado Registro usuarios
    function validateRegister()
    {
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var ok = true;
        if (nombre.length < 1) {
          ok = false;
        }
        if (apellidos.length < 1) {
          ok = false;
        }
        if (email.length < 1) {
          ok = false;
        } else {
          //var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
          var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          var validEmail = regEx.test(email);
          if (!validEmail) {
            ok = false;
          }
        }
        if (password.length < 8) {
          ok = false;
        }

        return ok;
    }

    $('#boton_registro').on('click',(event) => {
        event.preventDefault();

        $('#box').addClass('hidden').removeClass('alert').removeClass('success');

        var valido = false
        valido = validateRegister();
        if(!valido)
        {
            //Mostramos error y finaliza accion
            $('.msg-error').text('La validación de los campos devolvió un error. Por favor, revise los campos antes de volver a enviar el formulario');
            $('#box').addClass('alert').removeClass('hidden');
        }
        else {
            //Ha pasado la validacion. Enviamos los datos por post al controllador
            var data = new FormData();
            var nombre = $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var url = $('.url').val();

            data.append("nombre", nombre);
            data.append('apellidos', apellidos);
            data.append('email', email);
            data.append('password',password);

            $.ajax({
                url: url + "usuario/save",
                method: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                },
                success: function (respuesta) {
                    //Recuperar respuesta del controller
                }
            });
        }
    })
});
