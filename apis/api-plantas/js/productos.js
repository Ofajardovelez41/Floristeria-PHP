$(document).ready(()=>{
    console.log('jQuery  Working');
    getCargarCategorias();
    getProductos();
    let editar = false, ima = '';

    $('.cargando').hide();
    $('.main-form').hide();
    $('.tit2').hide();

    function getCargarCategorias(){
        $.ajax({
            type: 'GET',
            url: '/flower-shop/apis/api-plantas/getCategorias.php',
            success: (response)=>{
                categorias = JSON.parse(response);
                template = '';

                categorias.forEach( categoria=>{
                    template = `
                        <option value="${categoria.id}">${categoria.nombre}</option>;
                    `;

                    $('.categorias').append(template);
                });
            }
        });
    }

    $('.imagenP').click((e)=>{
        console.log('Ver imagen')
    });

    $('.agg').click((e)=>{
        e.preventDefault();
        $('.tit1').hide();
        $('.listado-productos').hide();
        
        $('.cargando').show();
       setTimeout(()=>{
            $('.cargando').hide();
            $('.main-form').show();
            $('.tit2').show();
       }, 1000);
    })

    $('.back').click((e)=>{
        e.preventDefault();

        $('.tit2').hide();
        $('.main-form').hide();
        
        $('.cargando').show();
       setTimeout(()=>{
            $('.cargando').hide();
            $('.listado-productos').show();
            $('.tit1').show();
       }, 1000);
    })

    $('#form-planta').submit((e)=>{
        e.preventDefault();
        var fecha = new Date();
        var idF = 1;

        if(editar){
            idF = $('#id-planta').val();
        }else{
            idF = fecha.getHours()+''+fecha.getMinutes()+''+fecha.getSeconds()+''+fecha.getMilliseconds();
        }

        const postData ={
            id: idF,
            categoriaSe: $('.categorias').val(),
            nombre: $('#nombre').val(),
            precio: $('#precio').val(),
            stock: $('#cantidad_stock').val(),
            imagen: $('#imagen').prop('files')[0].name
        }   

        console.log(editar);

        let url = editar == false ? 'add-producto.php' : 'editar-producto.php';
        if(editar){
            $('.editar-boton').html('Agregar Producto');
        }
        editar = false;
        $.post(url, postData, (response)=>{
            $('#form-planta').trigger('reset');
            alert(response);
            $('.main-form').hide();
            $('.tit2').hide();
        
            $('.tit1').show();
            $('.listado-productos').show();
            getProductos();
        });
    })


    function getProductos(){
        $.ajax({
            url: '/flower-shop/apis/api-plantas/listar-productos.php',
            type: 'GET',
            success: function(response){
                let productos = JSON.parse(response);
                let template = '', templateFE = '';
                productos.forEach(producto =>{
                    template += `
                    <tr  id-producto="${producto.id}">
                        <td class="td-producto id-producto"><a href="#" class="item-producto">${producto.id}</a></td>
                        <td class="td-producto">${producto.nombreCategoria}</td>
                        <td class="td-producto nombre-producto">${producto.nombre}</td>
                        <td class="td-producto">${producto.precio}</td>
                        <td class="td-producto">${producto.stock}</td>
                        <td class="td-producto td-imagen"><a href="./img/${producto.imagen}" target = '_blank'><img src='img/${producto.imagen}' id='imagenP'></a></td>
                        <td class="td-producto actions"><a href="#" class="eliminar-producto"><img src="img/eliminar.svg"></a><a href="#" class="editar-producto"><img src="img/editar.svg"></a></td>
                    </tr>
                    `

                    $('#form-planta').trigger('reset');
                    $('.tbody').html(template);


                    // Template que se mostrara en el Frontend de los productos
                });


                productos.forEach(producto =>{
                    templateFE += `
                    <div class="producto" >
                        <img src="/flower-shop/apis/api-plantas/img/${producto.imagen}" alt="Imagen del Porducto ${producto.nombre}">
                        <div class="info" id-producto="${producto.id}" nom-producto = '${producto.nombre}'>
                            <p class="nombre-producto fw-300 centrar-texto">${producto.nombre}</p>
                            <p class="nombre-categoria fw-300 centrar-texto">${producto.nombreCategoria}</p>
                            <p class="precio fw-300 centrar-texto">$ <span class="precio precio-${producto.id}"> ${producto.precio}</span></p>
                            <p class="fw-300 centrar-texto stock" ><span class="stock-${producto.id}">${producto.stock}</span> und</p>
                            <div class="acciones"> 
                                <input class="boton ${producto.id}" type="number" name="cantidad" max="${producto.stock}">
                                <a href="#" class="boton boton-agg-carro"><img src="img/anadir-al-carrito.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    `;

                    $('.contenedor-productos').html(templateFE);
                })
            }
        });
    }

    $(document).on('click', '.eliminar-producto', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-producto');
        if(confirm("Esta seguro de eliminar El producto con ID: " + id)){
            $.post('eliminar-producto.php', {id}, (response)=>{
                alert(response);
                getProductos();
            })
        };
    })


    $(document).on('click', '.editar-producto', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-producto');
        $('.tit1').hide();
        $('.listado-productos').hide();

        $('.main-form').show();
        $('.tit2').show();
        $.post('producto.php', {id}, function(response){
            const producto = JSON.parse(response);
            console.log(ima);
            console.log(producto);
            $('#id-planta').val(producto.id);
            $('.categorias').val(producto.idCategoria);
            $('#nombre').val(producto.nombre);
            $('#precio').val(producto.precio);
            $('#cantidad_stock').val(producto.stock);
            editar = true;
            if(editar){
                $('.editar-boton').html('Editar Producto');
            }
        })
    })

    $('.boton-agg-carro').click((e)=>{
        e.preventDefault();
        let cant = $('#cantidad').val();
        console.log(cant);
    })



    // Logica para agregar producto al carrito
    $(document).on('click', '.boton-agg-carro', function(e){
        e.preventDefault();
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-producto');
        let cant = $('.'+id).val();
        let stock = $('.stock-'+id)[0].textContent;
        if(parseInt(cant) > parseInt(stock) || parseInt(cant) < 1 || cant === ''){
            console.log('ERROR');
            alert('Cantidad Invalida');
            $('.'+id).css('border', '1px solid red')
        }else{

            let fe = new Date()
            let idCa = fe.getHours()+''+fe.getMinutes()+''+fe.getSeconds()+''+fe.getMilliseconds();
            let idUser =  $('.nombre-user')[0].textContent;
            var precioP = $('.precio-'+id)[0].textContent;;
            var pF = parseInt(precioP) * cant;

            const data = {
                idCarrito: idCa,
                idProducto: id,
                idUsuario: idUser,
                cantidad: cant,
                total: pF
            }

            console.log(data);

            
            $.post('apis/api-carrito/add-carrito.php', data, function(res){
                alert(res);
            });

        }
        
    });
})