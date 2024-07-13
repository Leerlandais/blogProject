<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;
use model\Trait\TraitCleanString;
use model\Trait\TraitDateTime;

class ArticleMapping extends AbstractMapping
{
    use TraitTestInt;
    use TraitTestString;
    use TraitCleanString;
    use TraitDateTime;
    protected ?int $article_id=null;
    protected ?string $article_title=null;
    protected ?string $article_slug=null;
    protected ?string $article_text=null;
    protected null|string|DateTime $article_date_create=null;
    protected null|string|DateTime $article_date_update=null;
    protected null|string|DateTime $article_date_publish=null;
    protected ?int $user_user_id=null;

    public function getArticleId(): ?int
    {
        return $this->article_id;
    }
    public function setArticleId(?int $article_id): void
    {
        if (!$this->verifyInt($article_id, 0)){
            throw new Exception("Article id must be an integer");
        }
        $this->article_id = $article_id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(?string $article_title): void
    {
        if(!$this->verifyString($this->cleanString($article_title))) {
            throw new Exception("Title cannot be an empty string");
        }
        $this->article_title = $article_title;
    }

    public function getArticleSlug(): ?string
    {
        return $this->article_slug;
    }

    public function setArticleSlug(?string $article_slug): void
    {
        if(!$this->verifyString($this->cleanString($article_slug))) {
            throw new Exception("Slug cannot be an empty string");
        }
        $this->article_slug = $article_slug;
    }

    public function getArticleText(): ?string
    {
        return $this->article_text;
    }

    public function setArticleText(?string $article_text): void
    {
        if(!$this->verifyString($this->cleanString($article_text))) {
            throw new Exception("Text cannot be an empty string");
        }
        $this->article_text = $article_text;
    }

    public function getArticleDateCreate(): DateTime|string|null
    {
        return $this->article_date_create;
    }

    public function setArticleDateCreate(DateTime|string|null $article_date_create): void
    {
        $this->formatDateTime($article_date_create, "article_date_create");
    }

    public function getArticleDateUpdate(): DateTime|string|null
    {
        return $this->article_date_update;
    }

    public function setArticleDateUpdate(DateTime|string|null $article_date_update): void
    {
        $this->formatDateTime($article_date_update, "article_date_update");
    }

    public function getArticleDatePublish(): DateTime|string|null
    {
        return $this->article_date_publish;
    }

    public function setArticleDatePublish(DateTime|string|null $article_date_publish): void
    {
        $this->formatDateTime($article_date_publish, "article_date_publish");
    }

    public function getUserUserId(): ?int
    {
        return $this->user_user_id;
    }

    public function setUserUserId(?int $user_user_id): void
    {
        if (!$this->verifyInt($user_user_id, 0)){
            throw new Exception("User id must be an integer");
        }
        $this->user_user_id = $user_user_id;
    }

}  // class end
