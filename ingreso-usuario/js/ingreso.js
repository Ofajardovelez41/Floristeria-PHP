$(document).ready(()=>{
    console.log("jQuery Working");
    let user, pass;
    getSesion();
    
    $('.form-registro').submit((e)=>{
        e.preventDefault();

        
        const dataUsuario = {
            tipoId: $('#tipo-id').val(),
            nid: $('#nid').val(),
            nombres: $('#nombre').val(),
            apellidos: $('#apellido').val(),
            fechaNacimiento: $('#fecha-nacimiento').val(),
            email: $('#email').val(),
            telefono: $('#telefono').val(),
            username: $('#user').val(),
            pass: $('#pass').val()
        }

        const dataDireccion = {
            nid: $('#nid').val(),
            pais: $('#pais').val(),
            dpto: $('#dpto').val(),
            ciudad: $('#ciudad').val(),
            municipio: $('#municipio').val(),
            barrio: $('#barrio').val(),
            direccion: $('#direccion').val(),
            infoAdicional: $('#info-adicional').val(),
        }
        $.ajax({
            type: 'GET',
            url: 'listar-usuarios.php',
            success: function(response){
               let users = JSON.parse(response);
               let existeEmail = false;
               let existeUser = false;
               console.log(users);
               users.forEach(user =>{
                   
                    if(user.email == $('#email').val()){
                        alert('Email Ya está registrado');
                        existeEmail = true;
                        $('#email').css('border', '1px solid red');
                    }

                    if(user.username == $('#user').val()){
                        alert('Usuario ya existe')
                        existeUser = true;
                        $('#user').css('border', '1px solid red');
                    }
               })
               if(!existeUser && !existeEmail){
                   $.post('registrar-usuario.php', dataUsuario, (response)=>{
                       alert(response);
                   })

                   $.post('registrar-direccion.php', dataDireccion, (response)=>{
                       alert(response+ "(" + $('#user').val() + ")");
                   })
               }

               window.location.href = "../index.php";
            }


        });
    });
    
    

    function getSesion(){
        $.ajax({
            url: './sesion.php',
            type: 'GET',
            success: function(response){
                if(response == 1){
                    $('.user').html("<?php echo $_SESSION['user']?>")
                    $('.salir').css('display', 'none');
                    $('.navegacion').append('<a href="ingreso-usuario/logout.php">Salir</a>')
                }
            }
        });
    }

    $('.form-login').submit((e)=>{
        e.preventDefault();

        user = $('#user').val();
        pass = $('#pass').val();
        console.log(user, pass);
        getLogin(user, pass);
    });

    function getLogin(user, pass){
        $.post('login-usuario.php', {user, pass}, (response)=>{
            let login = JSON.parse(response);
            console.log(login);
            if(login.user === user && login.pass){
                window.location.href = "../index.php";
            }else{
                alert('Credenciales Incorrectas');
                $('#user').css('border', '1px solid red');
                $('#pass').css('border', '1px solid red');
            }
        })
    }
});