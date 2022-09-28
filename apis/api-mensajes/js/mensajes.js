$(document).ready(()=>{
    console.log('jQuery Working');
    getMensajes();
    $('.section-form').hide();

    $('#buscar').keyup(()=>{
        let busqueda = $('#buscar').val();
        if(busqueda){
            // $.ajax({
            //     type: 'POST',
            //     url: 'buscar-msj',
            //     data: {search}
            // })

            $.post('buscar-msj.php', {busqueda}, (response)=>{
                console.log(response);
            })
        }
    });

    $('#form-mensaje').submit((e)=>{
        e.preventDefault();

        const postData = {
            respuesta: $('#contenido-msj').val(),
            id_Mensaje: $('#id-mensaje').val()
        }
        
        console.log(postData);
        let url = 'responder-msj.php';

        $.post(url, postData, (response)=>{
            $('.section-form').hide();
            alert(response);
            getMensajes();
        });
    });


    function getMensajes(){
        $.ajax({
            url: 'lista-msj.php',
            type: 'GET',
            success: function(response){
                let mensajes = JSON.parse(response);
                let template = '', texto='';
                let resp = '';
                let contMsj = 0;
                mensajes.forEach(mensaje => {
                    if(mensaje.respuesta === null){
                        resp = 'Sin respuesta'
                    }else{
                        resp = mensaje.respuesta;
                    }
                    
                    contMsj++;
                    template += `
                    <tr  id-mensaje="${mensaje.id}">
                        <td class="td-mensaje id-mensaje">${mensaje.id}</td>
                        <td class="td-mensaje">${mensaje.usuario}</td>
                        <td class="td-mensaje">${mensaje.producto}</td>
                        <td class="td-mensaje">${mensaje.mensaje}</td>
                        <td class="td-mensaje">${resp}</td>
                        <td class="td-mensaje"><input type="button" value="Borrar" class="boton boton-rojo boton-responder borrar-mensaje">
                        <input type="button" value="Responder" class="boton boton-rojo boton-responder responder-mensaje item-mensaje"></td>
                    </tr>
                    `
                });

                texto = `
                <div class="sin-mensajes">
                    <h3 class="fw-300 centrar texto">Sin Mensajes en estos momentos</h3>
                    <a class="boton boton-rojo boton-salir"  href="../apiadmin/home.php">Regresar</a>
                </div>
                `
                if(contMsj == 0){
                    $('.listado-mensajes').html(texto);
                }

                $('.tbody').html(template);
            }
        });
    }


    $(document).on('click', '.item-mensaje', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-mensaje');
        $.post('mensaje.php', {id}, (response)=>{
            const respuesta = JSON.parse(response);
            $('.section-form').show();
            $('#id-mensaje').val(respuesta.id_Mensaje)
            $('#id_Admin').val(respuesta.id_Admin),
            $('#contenido-msj').val(respuesta.respuesta)
        })
    });

    $(document).on('click', '.borrar-mensaje', function(){
       let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-mensaje');
        if(confirm("¿Está seguro de borrar el Mensaje con radicado #"+id+"?")){
            $.post('borrar-msj.php', {id}, (response)=>{
                alert(response);
                getMensajes();
            })
        }
    });
});