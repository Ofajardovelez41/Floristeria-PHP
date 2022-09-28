$(document).ready( ()=>{
    console.log("jQuery Working");
    var user, pass;
    var user_Admin;
    var autenticado = false;
    function getAdmin(user, pass){
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {user, pass},
            success: function(response){
                let admin = JSON.parse(response);
                if(admin.user === user && admin.pass === pass){
                    window.location.href = "home.php";
                }else{
                    alert('Usuario Incorrecto');
                    $('#form-admin').trigger('reset');
                }
            }
        });
    }

    $('#form-admin').submit((e)=>{
        e.preventDefault();
        user = $('#user').val();
        pass = $('#password').val();
        console.log(user, pass);
        getAdmin(user, pass);
    });

    $('.logout').click(()=>{
        window.location.href = "logout.php";
    });
});