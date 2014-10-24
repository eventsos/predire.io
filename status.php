<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>predire.io | Status</title>
</head>
<body>
<table width="100%">
    <tr>
        <td>worker name</td>
        <td>status</td>
        <td>send command</td>
    </tr>


    <?php
    $workers = array();
    $workers = parse_ini_file ( "workers/workers.ini");

    foreach ($workers as $worker) {
    ?>
    <tr>
        <td><? echo $worker ?></td>
        <td></td>
        <td></td>
    </tr>

    <?php
    }
    ?>

</table>
</body>
</html>