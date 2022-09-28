$(document).ready(()=>{
    console.log('jQuery is Working');
    getCategorias();
    let editar = false;

    $('.productos').hide();
    $('.cargando').hide();
    $('.main-form').hide();
    $('.tit2').hide();
    $('#id-categoria').hide();

    $('.agg').click((e)=>{
        e.preventDefault();
        $('.tit1').hide();
        $('.listado-categorias').hide();
        
        $('.cargando').show();
       setTimeout(()=>{
            $('.cargando').hide();
            $('.main-form').show();
            $('.tit2').show();
            console.log('CARGANDO BOTON AGG');
       }, 1000);
    });

    $('.back').click((e)=>{
        e.preventDefault();

        $('.tit2').hide();
        $('.main-form').hide();
        
        $('.cargando').show();
       setTimeout(()=>{
            $('.cargando').hide();
            $('.listado-categorias').show();
            $('.tit1').show();
            console.log('CARGANDO BOTON BACK');
       }, 1000);
    })


    $('#form-categoria').submit((e)=>{
        e.preventDefault();
        var fecha = new Date();
        var idF = 1;


        $('#id-categoria').hide();
        $('.main-form').hide();
        $('.tit2').hide();
        $('.cargando').show();
        setTimeout(()=>{
            $('.cargando').hide();
            $('.tit1').show();
            $('.listado-categorias').show();
            console.log('CARGANDO BOTON FORMULARIO CON editar EN: ' + editar);
        }, 2000);
        if(editar){
            idF = $('#id-categoria').val();
        }else{
            idF = fecha.getHours()+''+fecha.getMinutes()+''+fecha.getSeconds()+''+fecha.getMilliseconds();
        }

        const postData = {
            nombre: $('#nombre').val(),
            imagen: $('#imagen').prop('files')[0].name,
            id: idF 
        }

        let url = editar === false ? 'add-categoria.php' : 'editar-categoria.php';
        if(editar){
            $('.editar-boton').html('Agregar Categoria');
            $('.tit2 h2').html('Agregando Categoria');
        }
        editar = false;
        $.post(url, postData, (response)=>{
            $('#form-categoria').trigger('reset');
            alert(response);
            getCategorias();
        })
    });

    function getCategorias(){
        $.ajax({
            url: '/flower-shop/apis/api-categorias/lista-categorias.php',
            type: 'GET',
            success: function(response) {
                let categorias = JSON.parse(response);
                let template ='', seccionCategoria= "";
                console.log(categorias);
                
                // En este punto listamos todas las categorias en la pagina del Administrador
                categorias.forEach(categoria => {
                    template += `
                    <tr  id-categoria="${categoria.id}">
                        <td class="td-categoria id-categoria">${categoria.id}</td>
                        <td class="td-categoria">${categoria.nombre}</td>
                        <td class="td-producto td-imagen"><a href="./img/${categoria.imagen}" target = '_blank'><img src='img/${categoria.imagen}' id='imagenP'></a></td>
                        <td class="td-producto actions"><a href="#" class="eliminar-categoria"><img src="img/eliminar.svg"></a>
                        <a href="#" class="item-categoria"><img src="img/editar.svg"></a></td>
                    </tr>
                    `
                });
    
                $('#form-categoria').trigger('reset');
                $('.tbody').html(template);

                // En este Punto ponemos en el Front-end todas las categorias
                categorias.forEach(categoria =>{
                    seccionCategoria+=`
                        <div class="categoria" id-categoria="${categoria.id}">
                            <img src="/flower-shop/apis/api-categorias/img/${categoria.imagen}" alt="">
                            <p class="fw-300 centrar-texto">${categoria.nombre}</p>
                            <input type="button" value="Ver Categoria" class="boton boton-amarillo boton-ver">
                        </div>
                    `
                });

                $('.contenedor-categorias').html(seccionCategoria);
            }
        })
    }


    $(document).on('click', '.eliminar-categoria', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-categoria');
        if(confirm("Esta seguro de eliminar la Categoria " + id)){
            $.post('eliminar-categoria.php', {id}, (response)=>{
                alert(response);
                getCategorias();
            })
        };
    })

    $(document).on('click', '.item-categoria', function(){  
        $('.tit1').hide();
        $('.listado-categorias').hide();
        $('.cargando').show();
        setTimeout(()=>{
            $('.cargando').hide();
            $('.main-form').show();
            $('.tit2').show();
            $('#id-categoria').show();
            console.log('CARGANDO BOTON EDITAR CATEGORIA');
        }, 1000);

        let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('id-categoria');
            $.post('categoria.php', {id}, (response)=>{
                const categoria = JSON.parse(response);
                $('#nombre').val(categoria.nombre);
                $('#id-categoria').val(categoria.id);
                editar = true;
                if(editar){
                    $('.editar-boton').html('Editar Categoria');
                    $('.tit2 h2').html('Editando Categoria');
                }
            })
    })



    // Funciones de los botones de la seccion de Categorias
    $(document).on('click', '.boton-ver', function(){
        let element = $(this)[0].parentElement;
        let id = $(element).attr('id-categoria');
        console.log(element);
        // window.location.href = 'ver-categoria.php';
        $.post('/flower-shop/apis/api-categorias/productos-categoria.php', {id}, (response)=>{
            productos = JSON.parse(response);
            console.log(productos);
            let productoT = '';
            productos.forEach( producto =>{
                productoT +=`
                <div class="producto" id-categoria="${producto.id}">
                    <img src="img/purple-petal-flower-173499.jpg" alt="">
                    <p class="fw-300 centrar-texto">${producto.nombre}</p>
                    <input type="button" value="Carro" class="boton boton-amarillo boton-ver">
                </div>
                `;
            });

            $('.main').hide();
            $('.productos').show();
            $('.titulo-productos').append(productos[0].nombreCategoria);
            $('.contenedor-productos').html(productoT);
            
        })


    })
});