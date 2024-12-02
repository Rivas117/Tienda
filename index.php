<?php
include "global/config.php";
include "global/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">Logo De La Empresa Xd</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Carrito(0)</a>
                </li>
            </ul>
        </div>
    </nav>
    <br />
    <br />
    //Aqui estan las tarjetas de los productos
    <div class="container"></div>
    <br>
    <div class=" alert alert-success">
        Mensaje...
        <a href="#" class="badge badge-success">Ver Carrito</a>
    </div>


    <div class="row">
        <?php
        /*Aqui conectamos la BD*/
        $sentencia = $pdo->prepare("SELECT * FROM `productos`");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        //print_r($listaProductos);
        ?>

        <?php
        /*Aqui seeccionamos que queremos la tabla productos*/
        //Desde el Col-3 se crea la tarjetita
        foreach ($listaProductos as $producto) { ?>
            <div class="col-3">
                <div class="card">
                    <img
                        title="<?php echo $producto['nombreProducto']; ?>"
                        alt="<?php echo $producto['nombreProducto']; ?>"
                        class="card-img-top"
                        src="imagenes/<?php echo $producto['Imagen']; ?>">
                    <div class="card-body">
                        <span><?php echo $producto['nombreProducto']; ?></span>
                        <h5 class="card-title">LPS <?php echo $producto['precioVenta']; ?></h5>

                        <form action="" method="post">
                            <button class="btn btn-primary"
                                name="btnAccion"
                                value="Agregar"
                                type="submit">Agregar al carritoa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>