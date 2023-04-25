<?php

function selectRegion($id) {

    $query = 'SELECT * FROM region WHERE id = :id';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $selKindgrind = $req->fetch(PDO::FETCH_ASSOC);
    return $selKindgrind;
}
function modificRegion() {

    $query = 'SELECT k.name, p.name
            FROM region as picture
            INNER JOIN name as k
            ON k.id_picture = p.id';
    $req = dbConnect()->prepare($query);
    $req->bindValue('')
}
