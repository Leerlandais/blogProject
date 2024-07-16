<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\OurPDO;

use model\Mapping\CategoryMapping;

class CategoryManager implements InterfaceManager, InterfaceSlugManager
{

    private OurPDO $pdo;
    public function __construct(OurPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll(): ?array
    {
        $selectAll = $this->pdo->prepare("SELECT * FROM category");
        $selectAll->execute();
        if($selectAll->rowCount() === 0){
            return null;
        }
        $all = $selectAll->fetchAll();
        $selectAll->closeCursor();
        $tabObject = [];
        foreach ($all as $mapping) {
            $tabObject[] = new CategoryMapping($mapping);
        }
        return $tabObject;
    }

    public function selectOneById(int $id)
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(AbstractMapping $mapping)
    {
        // TODO: Implement insert() method.
    }

    public function update(AbstractMapping $mapping)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        $delete = $this->pdo->prepare("DELETE FROM category WHERE category_id = :id");
        $delete->bindValue(':id', $id, OurPDO::PARAM_INT);
        $delete->execute();
        if($delete->rowCount() === 0) return false;
        return true;
    }

    public function selectOneBySlug(string $slug)
    {
        $selectOneBySlug = $this->pdo->prepare("SELECT * FROM category WHERE category_slug = :slug");
        $selectOneBySlug->execute(['slug' => $slug]);
        if($selectOneBySlug->rowCount() === 0){
            return null;
        }
        $fetchOne = $selectOneBySlug->fetch();
        //var_dump($fetchOne);
        return new CategoryMapping($fetchOne);
    }
}