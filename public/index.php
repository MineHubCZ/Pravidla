<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MineHub Pravidla</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <!-- CSS-->
    <link rel="stylesheet" href="app.css">
    
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="py-5 container">
    
    <?php
        $metadata = file_get_contents('../data/metadata.json');
        $metadata = json_decode($metadata);
        
        $last_edit = filemtime('../data/compiled.md');
        $last_edit_formatted = date('d. m. Y H:i:s', $last_edit);
        $last_edit_year = date('Y', $last_edit);
    ?>
    
    <header class="text-center">
        <h1>
            MineHub.cz Pravidla
        </h1>
        
        <p class="text-muted">
            verze: <?=$metadata->version?>,
            poslední změna: <?=$last_edit_formatted?>,
            <a href="/about.php" class="text-muted">
                informace
            </a>
        </p>
    </header>
    
    <section>
        <?php
            //include '../lib/Parsedown.php';
            $content = file_get_contents('../data/compiled.md');
            
            /*$pd = new Parsedown();
            $md =  $pd->text($content);
            $md = preg_replace_callback(
                '/\(id \d*\)/',
                fn ($matches) => '<span class="text-muted">' . $matches[0] . '</span>',
                $md
            );*/

            $md = 'x';
            
            echo $md;
        ?>
    </section>
    
    <footer class="mt-5 text-center text-muted small">
        &copy; Minehub.cz <?=$last_edit_year?>, developed by CoolFido
    </footer>
</body>
</html>
