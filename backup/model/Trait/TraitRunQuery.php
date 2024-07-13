<?php


namespace model\Trait;
trait TraitRunQuery
{

    protected function runQuery($sql): array|null
    {

        $select = $this->db->query($sql);
        if ($select->rowCount() === 0) return null;
        $array = $select->fetchAll();
        $select->closeCursor();

        return $array;
    }

}