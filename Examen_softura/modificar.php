<?php
include('include/bd.php');
$pid = $_GET['nombre'];
if (isset($_POST['submit'])) {
    $nombreP = $_POST['nombreP'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];

    $sql = mysqli_query($con, "UPDATE productos SET nombre_producto='$nombreP', cantidad='$cantidad', tipo='$tipo' where nombre_producto='$pid' ");
    $mensaje['msg'] = "¡Los datos del producto fueron actulizados!";
}
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="images/logo.png" type="">
    <!--Logo de la página -->
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1 class="text-center mt-5">Modificar producto</h1>
    <div class="container">
        <h3>Actualiza los datos necesarios.</h3>

        <?php if (isset($_POST['submit'])) { ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>¡Registro actulizado!</strong> <?php echo htmlentities($mensaje['msg']); ?><?php echo htmlentities($mensaje['msg'] = ""); ?>
            </div>
        <?php } ?>



        <?php
        $query = mysqli_query($con, "select * from productos where nombre_producto='$pid'");
        while ($row = mysqli_fetch_array($query)) {
        ?>

            <form method="POST">
                <div>
                    <label class="form-label">Nombre del producto:</label>
                    <input type="text" class="form-control" name="nombreP" id="nombreP" value="<?php echo htmlentities($row['nombre_producto']); ?>">
                </div>
                <div>
                    <label class="form-label">Cantidad:</label>
                    <input type="text" class="form-control" name="cantidad" id="cantidad" value="<?php echo htmlentities($row['cantidad']); ?>">
                </div>
                <div>
                    <label class="form-label">Tipo de producto:</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo htmlentities($row['tipo']); ?>">
                </div>
                <div class=" btns container text-end mt-3">
                    <button name="submit" type="submit" class="btn btn-success">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Regresar</a>
                </div>
            </form>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>