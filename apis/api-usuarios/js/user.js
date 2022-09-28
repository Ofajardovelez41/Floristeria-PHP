$(document).ready(()=>{
    console.log('jQuery is Working');
    getUsuarios();

    function getUsuarios(){
        $.ajax({
            url: 'lista-usuarios.php',
            type: 'GET',
            success: (response)=>{
                usuarios = JSON.parse(response);
                let template = '';
                usuarios.forEach(user =>{
                    template += `
                    <tr id-user="${user.nid}">
                        <td class="td-user">${user.tipo_id}</td>
                        <td class="td-user id-user">${user.nid}</td>
                        <td class="td-user">${user.nombres}</td>
                        <td class="td-user">${user.apellidos}</td>
                        <td class="td-user">${user.fecha_nacimiento}</td>
                        <td class="td-user sin-cap">${user.email}</td>
                        <td class="td-user">${user.telefono}</td>
                        <td class="td-user sin-cap">${user.username}</td>
                        <td class="td-user">${3}</td>
                    </tr>
                    `;
                });

                $('.tbody').html(template);
            }    
        })
    }
});