<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Exemple;

#[TargetEntity(entityName: Exemple::class)]
class exempleRepository extends AbstractRepository
{

    public function insert(Exemple $film){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET title = :title, synopsis = :synopsis, image=:image ");

        $query->execute([
            "title"=>$film->getTitle(),
            "synopsis"=>$film->getSynopsis(),
            "image"=>$film->getImage()
        ]);
        return $this->pdo->lastInsertId();

    }


}