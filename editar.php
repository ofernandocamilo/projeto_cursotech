<?php
    header('Content-Type: text/html; charset=UTF-8');

    function validar(){
        session_start();

        if(isset($_SESSION["logado"]))
        {

            if ( $_SESSION["logado"] == "OK")
            {
                return true;
            }
            else
            {
                header("Location:index.php");
                //echo "<script>alert('Usuário não logado!');</script>";
            }

        }

        else

        {
            header("Location:index.php");
            //echo "<script>alert('Usuário não logado!');</script>";
        }

    
    }
?>

<?php include("logout.php");?>

<?php 

    validar();

    if (isset($_GET["acao"]))
    {
        
        if ( $_GET["acao"] == "Editar" )
        {
            
            include("conexao.php");
            
            if ($conexao)
            {
            
                $id = $_GET["campo_id"];
                $nome = $_GET["campo_nome"];
                $matricula = $_GET["campo_matricula"];
                $op_curso = $_GET["campo_opcurso"];
              
                $query = "update alunos  set nome = '".$nome."' , matricula = ".$matricula.", curso = '".$op_curso."'  where id_ = ".$id." ;"; //nome, matricula, id_ são os nomes dos campos no banco sql
                
                $stmt = mysqli_prepare($conexao, $query);
                mysqli_execute($stmt);
            
                mysqli_close($conexao);

                echo "<script>alert('Registro alterado com sucesso!');</script>";
                
            }
        }

    }

?>

<?php

    /* SETANDO VALORES 0 PARA VARIÁVEIS NULAS*/

    if (!isset($_GET["campo_id"]))
    {
        $campo_id = 1;
    }
    else
    {
        $campo_id = $_GET["campo_id"];
    }
    
    if (!isset($_GET["campo_nome"]))
    {
        $campo_nome = "";
    }
    else
    {
        $campo_nome = $_GET["campo_nome"];
    }  
    
    if (!isset($_GET["campo_matricula"]))
    {
        $campo_quantidade = 0;
    }
    else
    {
        $campo_quantidade = $_GET["campo_matricula"];
    }
    

?>

<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Alunos | Curso Tech</title>

    <link rel="icon" href="img/favicon.png" />

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <link href="css/estilo.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">

    .txtarea {
    width: 70%;
    height: 50px;
    display: inline;
    font-size: 16px;
    line-height: 1.42857;
    color: #222222;
    background-color: #FFF;
    background-image: none;
    border: 1px solid #CCC;
    border-radius: 4px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075);
    padding: 6px 12px;
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
    }

    .txtarea_registro {
    width: 95%;
    height: 50px;
    display: inline;
    font-size: 16px;
    line-height: 1.42857;
    color: #222222;
    background-color: #FFF;
    background-image: none;
    border: 1px solid #CCC;
    border-radius: 4px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075);
    padding: 6px 12px;
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
    }

    .btn_pesquisar {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 10px;
    width: 30%;
    margin-top: 5%;
    margin-right: 9.8%;
    margin-left: 9.8%;
    font-size: 16px;
    margin: auto;
    display: inline;
    /* margin-top: 40px; */
    width: 20%;
    margin-left: 20px;
    }

    .btn_pesquisar:hover {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 10px;
    width: 30%;
    margin-top: 5%;
    margin-right: 9.8%;
    margin-left: 9.8%;
    font-size: 16px;
    margin: auto;
    display: inline;
    /* margin-top: 40px; */
    width: 20%;
    margin-left: 20px;
    }

    .bgbranco{
    background-color: transparent;
    padding: 10px;
    margin-top: 30px;
    border-radius: 20px;
    }

    .corcinza{
    color: white;
    padding: 0;
    margin: 0;
    margin-left: 10px;
    }

        .btn_editar {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 10px;
            width: 95%;
            margin-right: 9.8%;
            font-size: 16px;
            margin: auto;
            display: block;
            margin-left: 18px;
            color:#969696;
            height: 50px;
            margin-top: -7px;
            background-color: #351853;
            color: #fff;
            }

        .btn_editar:hover {
            color: #fff;
            background-color: #651dd4;
            height: 50px;
            margin-top: -7px;
            }

    </style>

</head>

<body>

    <!-- Navigation -->
 
<?php 
            include("conexao.php");
            
            if ($conexao)
            {
                $usuario = $_SESSION["Usuario"];
                $senha = $_SESSION["Usuario_Senha"];

                $query = "SELECT * from usuarios WHERE usuario = '$usuario' AND senha = '$senha'"; 
                // * traz todos os campos do banco

                $resultado = mysqli_query($conexao, $query);

                if($array = mysqli_fetch_array($resultado))
                {
                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome']; //$array pra trazer um dado direto do banco
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                }
               else
               {

                 echo "Usuário/Senha incorretos ou inexistentes!";
               }
        }
?>

<?php
    if ($array['tipo'] == "admin"){

                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome'];
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                    include("menu.php");         

    }
    elseif ($array['tipo'] == "edi") {
                  //session_start();
                  $_SESSION["logado"] = "OK";
                  $_SESSION["Usuario"] = $usuario;
                  $_SESSION["Usuario_Senha"] = $senha;
                  $_SESSION["Usuario_Nome"] = $array['nome'];
                  $_SESSION["Usuario_Tipo"] = $array['tipo'];

                    include("menu_edi.php");  
    }
 ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="formlogin" class="container">
                <h3 class="tituloform">Editar Alunos</h3>
                <br>

       <div id="div_principal">
            
            <fieldset>
                
                <form action="#" method="GET">
                    
                    <table>
                        
                        <!--<tr>
                            <td>
                                Id:
                            </td>
                            <td>
                                <input type="number" name="campo_id" value="<?php echo $campo_id ?>">
                            </td>
                        </tr>-->
                        
                        <tr>
                            <!--<td>
                                <p  class="corwhite inline nomesform">Pesquisar:</p>
                            </td>-->

                            <td>
                                <input type="text" name="campo_id" value="" size="55" align="right" placeholder="Digite o código do aluno" required="" class="txtarea">

                                <input type="submit" value="Pesquisar" name="acao" class="btn_pesquisar btn-danger">

                            </td>
                        </tr>
            
                    </table>
                      
                                <!--<input type="submit" value="Cadastrar" name="acao" class="btn btn-danger">-->
                    
                </form>
            </fieldset>
            
                    </div>

                </div>

                <div id="registro" class="bgbranco">

                <?php

                    if (isset($_GET["acao"]))
                    {

                        if ( $_GET["acao"] == "Pesquisar" )
                        {

                            include("conexao.php");

                            if ($conexao)
                            {

                                $id = $_GET["campo_id"];
                                $query = "select * from alunos where id_ = ".$id.";";

                                $resultado = mysqli_query($conexao, $query);
                                mysqli_close($conexao);
                
                                ?>

                            <form action="#" method="GET">

                                <table>

                                    <tr>
                                        <td>
                                            <p class="corcinza">Código:</p>
                                        </td>

                                        <td>
                                            <p class="corcinza">Nome:</p>
                                        </td>

                                         <td>
                                            <p class="corcinza">Matrícula:</p>
                                        </td>

                                        <td>
                                            <p class="corcinza">Curso:</p>
                                        </td>

                                    </tr>



                                <?php

                                $ind = 0; /*criado para setar a info nos names certos*/
                                while($row = mysqli_fetch_row($resultado))
                                {

                                ?>
                                    <tr>

                                            <td>
                                            <input type="number" value="<?php echo $row[0];  ?>" name="campo_id" class="txtarea_registro" readonly="yes">
                                            </td>

                                            <td>   
                                                <input type="text" value="<?php echo $row[1];  ?>" name="campo_nome" class="txtarea_registro">
                                            </td>

                                            <td>
                                                <input type="number" value="<?php echo $row[2];  ?>" name="campo_matricula" class="txtarea_registro">
                                            </td>

                                            <td>
                                                <input type="text" value="<?php echo $row[3];  ?>" name="campo_opcurso" class="txtarea_registro">
                                            </td>

                                            <td>
                                                <input type="submit" name="acao" class="btn_editar" value="Editar">
                                            </td>
                                    </tr>

                                <?php

                                }

                                ?>

                                </table>

                            </form>

                                <?php

                            }
                        }
                    }
                ?>
 
                    </div>

            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- /.container -->

    <?php include("footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
