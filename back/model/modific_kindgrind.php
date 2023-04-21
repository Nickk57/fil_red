<?php

function selectKindgrind($id) {

    $query = 'SELECT * FROM kind_grind WHERE id = :id';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $selKindgrind = $req->fetch(PDO::FETCH_ASSOC);
    return $selKindgrind;
}
function modificKindgrind() {

    $query = 'SELECT k.name, p.name
            FROM king_grind as picture
            INNER JOIN name as k
            ON k.id_picture = p.id';
    $req = dbConnect()->prepare($query);
    $req->bindValue('')
}
