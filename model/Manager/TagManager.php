<?php

namespace model\Manager;

use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\OurPDO;
use model\Mapping\TagMapping;

class TagManager implements InterfaceManager, InterfaceSlugManager
{

    private OurPDO $pdo;

    public function __construct(OurPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll(): array
    {
        // TODO: Implement selectAll() method.
    }

    public function selectOneById(int $id): object
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(object $object): void
    {
        // TODO: Implement insert() method.
    }

    public function update(object $object): void
    {
        $tagId = $object->tag_id;
        $tagSlug = $object->tag_slug;

        $sql = "UPDATE tag
                SET tag_slug = :tag_slug
                WHERE tag_id = :tag_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':tag_id', $tagId, OurPDO::PARAM_INT);
        $statement->bindParam(':tag_slug', $tagSlug);

        $statement->execute();
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    public function selectOneBySlug(string $slug): ?TagMapping
    {
        $prepare = $this->pdo->prepare("SELECT t.*, COUNT(tha.`tag_tag_id`) AS count_tag FROM `tag` t 
           LEFT JOIN `tag_has_article` tha on t.`tag_id` = tha.`tag_tag_id`
           WHERE `tag_slug` = :slug");
        $prepare->execute([':slug' => $slug]);
        if($prepare->rowCount() === 0) return null;
        return new TagMapping($prepare->fetch());
    }
}