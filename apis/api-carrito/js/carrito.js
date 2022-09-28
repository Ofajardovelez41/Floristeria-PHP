$(document).ready(()=>{
    console.log('QUERY');
    $('.registro').hide();
    getProductosCarrito();


    function getProductosCarrito(){
        let idUser =  $('.nombre-user')[0].textContent;
        let templateC = '';

        $('.tituloP').html('Productos en el Carrito del Usuario: ' + idUser);

        $.post('/flower-shop/apis/api-carrito/listar-carrito.php', {idUser}, (response)=>{
            productosC = JSON.parse(response);

            if(productosC.length == 0){
                alert('AGREGUE PRODUCTOS AL CARRITO')
                window.location.href = 'productos.php';
            }

            console.log(productosC);

            productosC.forEach(productoC =>{
                templateC += `<div class="producto" >
                <img src="/flower-shop/apis/api-plantas/img/${productoC.imagen}" alt="Imagen del Porducto ${productoC.nombre}">
                <div class="info" id-producto="${productoC.idProducto}" id-carrito="${productoC.idCarrito}" nom-producto = '${productoC.nombre}'>
                    <p class="nombre-producto fw-300 centrar-texto">${productoC.nombre}</p>
                    <p class="precio fw-300 centrar-texto">Precio Unitario $<span class="precio precio-${productoC.idProducto}">  ${productoC.precio}</span></p>
                    <p class="precio fw-300 centrar-texto">Total $<span class="precio precio-total-${productoC.idProducto}">${productoC.total}</span></p>
                    <p class="fw-300 centrar-texto stock" ><span class="stock-${productoC.id}">${productoC.cantidad}</span> und</p>
                    <div class="acciones"> 
                        <a href="#" class="boton  boton-eliminar-producto"><img src="/flower-shop/apis/api-carrito/img/dejar.svg" alt=""></a>
                        <a href="#" class="boton boton-realizar-compra"><img src="/flower-shop/apis/api-carrito/img/comprar.svg" alt=""></a>
                    </div>
                </div>
            </div>
            `;

            $('.contenedor-productos').html(templateC);
            })
            $('.tituloP').html('Productos en el Carrito del Usuario: ' + productosC[0].user);
            
        })
    }

    $(document).on('click', '.boton-eliminar-producto', function(e){
        e.preventDefault();
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id-producto');
        console.log(id)
        if(confirm("Esta seguro de eliminar el producto con ID:  " + id)){
            $.post('/flower-shop/apis/api-carrito/eliminar-producto-carrito.php', {id}, (response)=>{
                alert(response);
                getProductosCarrito();
            });
        };
    })


    $('.borrar-todo').click((e)=>{
        e.preventDefault();
        $.post('/flower-shop/apis/api-carrito/eliminar-todo.php', (response)=>{
            alert(response)
            window.location.href = 'productos.php';
        })
    })


    function getDirecciones(){
       let idUser = $('.nombre-user')[0].textContent;
       $.post('/flower-shop/apis/api-carrito/get-categorias-usuarios.php', {idUser}, (response)=>{
           let direcciones = JSON.parse(response);
           let template = '';
            console.log(direcciones);
           direcciones.forEach(direccion =>{
            template = `
                <option value="${direccion.idDireccion}">${direccion.ciudad} -- ${direccion.municipio} -- ${direccion.barrio}</option>;
            `;

            $('#direccion').append(template);
           })
       })
    }

    function borrarProductoCarrito(id){
        $.post('/flower-shop/apis/api-carrito/eliminar-producto-carrito.php', {id}, (response)=>{
            console.log(response);
        } )
    }

    function restarStock(id, cantidadProducto){
        $.post('/flower-shop/apis/api-carrito/descontar-stock.php', {id, cantidadProducto}, (response)=>{
            console.log(response);
        })
    }

    $(document).on('click', '.boton-realizar-compra', function(e){
        $('.registro').show();
        $('.main').hide();
        e.preventDefault();
        let element = $(this)[0].parentElement.parentElement;
        let idP = $(element).attr('id-producto');
        let idC= $(element).attr('id-carrito');

        const data = {
            idCarrito: idC,
            idProducto: idP
        }
        $.post('/flower-shop/apis/api-carrito/producto-comprar.php', data, (response)=>{
            productos = JSON.parse(response);
            $('#nid').val(productos.idUs);
            $('#idProducto').val(productos.idPr);
            $('#estadoCompra').val('En progreso........');
            $('#precio').val(productos.precio);
            $('#cantidadProducto').val(productos.cantidad);
            $('#total').val(productos.total);
            getDirecciones();
        })
    })

    $('.form-compra').submit((e)=>{
        e.preventDefault();

        let idUser = $('.nombre-user')[0].textContent;
        var fecha = new Date();
        var idFe = fecha.getHours()+''+fecha.getMinutes()+''+fecha.getSeconds()+''+fecha.getMilliseconds();
        var fechaCompra = fecha.getFullYear()+'-0'+(fecha.getMonth()+1)+'-'+fecha.getDate();

        const postData = {
            idUsuario:  $('#nid').val(),
            idProducto: $('#idProducto').val(),
            idDireccion: $('#direccion').val(),
            idCompra: idFe,
            precio: $('#precio').val(),
            fecha: fechaCompra,
            cantidadProducto: $('#cantidadProducto').val(),
            estadoCompra: 'Realizada',
            total: $('#total').val()
        }
        idPaBorrar = $('#idProducto').val();
        borrarProductoCarrito(idPaBorrar);
        restarStock(postData.idProducto, postData.cantidadProducto);
        $.post('/flower-shop/apis/api-compras/agregar-compra.php', postData, (response)=>{
            alert(response);
            window.location.href = 'productos.php';
        })
    })
})