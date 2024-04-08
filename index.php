<?php
//echo "Hola mundo!";

//COMAND: php -s localhost:8000 (esto crea un servidor )

//  API ej La proxima pelicula de marvel
// 1. desde la consola comando: curl whenisthenextmcufilm.com/api
// 2. Inicializamos una nueva sesion de cURL; ch = cURL handle
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

// 3. Vamos a indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 4. Ejecutar la petición y guardamos el resultado
$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);

//var_dump($data); //esto me mustra el contenido



?>


<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>La Proxima Pelicula de Marvel</title>
    <!-- Centered viewport --> 
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />

</head>

<body>
    <main>
        <section>
            <h1>La Proxima Pelicula de Marvel</h1>
            <h2><?php echo $data["title"]; ?></h2>
        </section>
        <section>
            <div>
                <img src="<?php echo $data["poster_url"]; ?>" width="300" alt="poster de <?php $data["title"]; ?>">
            </div>
        </section>
        <section>
            <h2>Se estrena en <?php echo $data["days_until"]; ?> dias!</h2>
            <h2>Fecha de estreno: <?php echo $data["release_date"]; ?> </h2>
            <p>La siguiente sera: <?php echo $data["following_production"]["title"]; ?></p>
        </section>
    </main>
    
</body>
<style>
    body{
        text-align: center;
    }
</style>