<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros en PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bibliotech</h1>
    </header>
    <main>
        <form method="GET" action="index.php">
            <input
                type="text"
                name="busqueda"
                placeholder="Buscar libro por título..."
                value="<?= isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : '' ?>"
            >
            <button type="submit">Buscar</button>
        </form>
        <?php if (isset($mensaje)): ?>
            <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <section>
            <h2>Resultado de Búsqueda</h2>
            <?php if ($busqueda): ?>
                <p>
                    <strong>ID:</strong> <?= $busqueda->getId() ?> |
                    <strong>Título:</strong> <?= $busqueda->getTitulo() ?> |
                    <strong>Autor:</strong> <?= $busqueda->getAutor() ?> |
                    <strong>Categoría:</strong> <?= $busqueda->getCategoria() ?> |
                    <strong>Estado:</strong> <?= $busqueda->getEstado() ?>
                </p>
            <?php else: ?>
                <p>No se encontraron resultados.</p>
            <?php endif; ?>
        </section>

        <section>
            <h2>Lista de Libros</h2>
            <ul>
                <?php foreach ($libros as $libro): ?>
                <li>
                    <span>
                        <strong>ID:</strong> <?= $libro->getId() ?> ||
                        <strong>Título:</strong> <?= $libro->getTitulo() ?> ||
                        <strong>Autor:</strong> <?= $libro->getAutor() ?> 
                        <strong>Categoría:</strong> <?= $libro->getCategoria() ?> ||
                        <strong>Estado:</strong> <?= $libro->getEstado() ?>
                    </span>
                    <div>
                        <?php if ($libro->getEstado() === "disponible"): ?>
                            <a class="boton-prestar" href="index.php?accion=prestar&id=<?= $libro->getId() ?>">Prestar</a>
                        <?php else: ?>
                            <a class="boton-devolver" href="index.php?accion=devolver&id=<?= $libro->getId() ?>">Devolver</a>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
</body>
</html>
