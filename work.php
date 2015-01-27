<?php

    mysql_connect('localhost', 'root', 'ouardi')
        or die (mysql_error());

    
    $s = $_GET['s'] ? $_GET['s'] : 1;

    mysql_select_db('film');
    
    $r = mysql_query("select * from f_tags limit $s,100");

    while($row = mysql_fetch_array($r)):

        $result = mysql_query("select id_film,nom_film from f_films where nom_film like '%{$row['tag']}%'");
        while($ids = mysql_fetch_array($result)):

            echo  $row['tag'] . " / " . $ids['nom_film'] . "<br />";

            mysql_query("insert ignore into f_films_tags(id_film, id_tag)
                    value('{$ids['id_film']}' , '{$row['id_tag']}');");
        endwhile;

        $s++;
    endwhile;
?>

<html>

    <head>
        <title></title>
        <meta http-equiv="Refresh" content="1;URL=work.php?s=<?php echo $s;?>" />
    </head>

    <body>
        
    </body>
</html>