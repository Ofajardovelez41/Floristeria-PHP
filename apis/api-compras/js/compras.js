$(document).ready(()=>{
    console.log("jQuery is Working");
    getCompras();


    function getCompras(){
        $.ajax({
            url: 'lista-compras.php',
            type: 'GET',
            success: function(response){
                compras = JSON.parse(response);
                let template = '';
                console.log(compras)
                compras.forEach(compra =>{
                    template += `
                    <tr id-compra="${compra.id_compra}">
                        <td class="td-compra id-compra">${compra.id_compra}</td>
                        <td class="td-compra">${compra.usuario}</td>
                        <td class="td-compra">${compra.direccion}</td>
                        <td class="td-compra">${compra.producto}</td>
                        <td class="td-compra">${compra.precio}</td>
                        <td class="td-compra">${compra.fecha}</td>
                        <td class="td-compra">${compra.cantidad_pro}</td>
                        <td class="td-compra">${compra.estado_compra}</td>
                        <td class="td-compra">${compra.total}</td>
                    </tr>
                    `;
                });

                $('.tbody').html(template);
            }
        }); 
    }
});