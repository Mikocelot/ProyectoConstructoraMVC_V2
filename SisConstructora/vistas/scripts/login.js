$("#formulario").on('submit',function(e)
{
	e.preventDefault();
    logina=$("#cuenta").val();
    clavea=$("#contraseña").val();
    $.post("../controllers/Usuarios.php?op=verificar",
        {"cuenta":logina,"contraseña":clavea},
        function(data)
    {

        if (data!="null")
        {
            $(location).attr("href","index.php");            
        }
        else
        {
            alert("Usuario y/o Password incorrectos");
        }
    });
})