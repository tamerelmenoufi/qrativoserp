<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");


    header('Content-Type: application/pdf');
    // header('Content-Length: '.strlen( $content ));
    // header('Content-disposition: inline; filename="' . $name . '"');
    // header('Cache-Control: public, must-revalidate, max-age=0');
    // header('Pragma: public');
    // header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    // header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');

    $query = "select * from os where codigo = '{$_GET['os']}'";
    $result = mysqli_query($con, $query);
    $d = mysqli_fetch_object($result);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório O.S. #'.$d->codigo.'</title>
    <style>
        .img{
            width:200px;
        }
    </style>
</head>
<body>
    <h2>'.$d->titulo.'</h2>
    <p>'.$d->descricao.'</p>

    <div>';

    $q = "select * from os_fotos where cod_os = '{$d->codigo}'";
    $r = mysqli_query($con, $q);
    while($e = mysqli_fetch_object($r)){
        $html .= '    <img src="http://qrativoserp.com.br/src/os/fotos/'.$d->codigo.'/'.$e->foto.'" class="img" />';
    }

    $html .= '</div>
</body>
</html>';


$postdata = http_build_query(
    array(
        'html' => base64_encode($html)
    )
);
$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);
$context = stream_context_create($opts);
$result = file_get_contents('http://html2pdf.mohatron.com/', false, $context);

$result = json_decode($result);

echo base64_decode($result['doc']);
// echo $html;