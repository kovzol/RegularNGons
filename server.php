<?php

/*
 * This is a script for storing and retrieving intermediate data on a server. You need an HTTP server with PHP and
 * SQLITE3 support to make this work. On Ubuntu Linux you can simply use the packages apache2, libapache2-mod-php and
 * php-sqlite3 to achieve that. You may want to enable mod_headers and set "Header set Access-Control-Allow-Origin *"
 * to allow direct communication between the client and a server even if they are installed on different machines.
 *
 * Please note that this script writes to the file $dbfile defined at the beginning of the script (see below).
 * You can define a different path for that. The database schema will be created on the first run automatically.
 *
 * The server side accepts HTTP POST requests for registering, updating, getting heartbeat information
 * and providing information to continue a job. These are handled on the client side when the URL of the
 * script is given by the startup GET parameter z=..., in this mode RegularNGons will regularly restart
 * itself and append the GET parameter c=... to the startup URL to retrieve data from the previous runs.
 *
 * A restart can be initiated directly as well, by using the same method, that is, by adding the GET
 * parameter c=... directly to the startup URL.
 */

$dbfile = "/tmp/RegularNGons.sqlite";
if (!file_exists($dbfile)) {
    fopen($dbfile, "w");
    fclose($dbfile);
    $db = new SQLite3($dbfile);
    $db->exec("CREATE TABLE clients (id text, parameters text, ggb text, log text, changes text)");
} else {
    $db = new SQLite3($dbfile);
}

$action = $_POST['action'];

if ($action == "register") {
    $id = substr(md5(rand()), 0, 7);
    echo $id;
    $parameters = $_POST['parameters'];
    $db->exec("insert into clients (id, parameters, log) values ('$id', '$parameters', '')");
    die();
}

if ($action == "update") {
    $id = $_POST['id'];
    $text = $_POST['update'] . "\n";
    $ggb = $_POST['ggb'];
    $db->exec("update clients set log = log || '$text', ggb = '$ggb' where id = '$id'");
    die();
}

if ($action == "heartbeat") {
    $id = $_POST['id'];
    $changes = $_POST['changes'] . "\n";
    $db->exec("update clients set changes = '$changes' where id = '$id'");
    die();
}

if ($action == "continue") {
    $id = $_POST['id'];
    $results = $db->query("SELECT changes || ';ggb=\"' || ggb || '\";fulllog=\"' || " .
        "replace(log,'\n','\\n') || '\";'  FROM clients where id = '$id'");
    while ($row = $results->fetchArray()) {
        echo $row[0];
    }
    die();
}

?>