<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitCleanString;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;
use Exception;

class UserMapping extends AbstractMapping
{
    use TraitCleanString;
    use TraitTestString;
    use TraitTestInt;

    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $user_id=null;
    protected ?string $user_login=null;
    protected ?string $user_password=null;
    protected ?string $user_full_name=null;
    protected ?string $user_mail=null;
    protected ?int $user_status=null;
    protected ?string $user_secret_key=null;
    protected ?int $permission_permission_id=null;

    // Les getters et setters

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): void
    {
        if (!$this->verifyInt($user_id, 0)){
            throw new Exception("User id must be an integer");
        }
        $this->user_id = $user_id;
    }

    public function getUserLogin(): ?string
    {

        return $this->user_login;
    }

    public function setUserLogin(?string $user_login)
    {
        if(is_null($user_login)) return null;
        $texte = trim(strip_tags($user_login));
        if(empty($texte)) throw new Exception("Le login n'est pas renseigné");
        if(strlen($texte) < 3) throw new Exception("Le login doit contenir au moins 3 caractères");

        $this->user_login = $texte;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(?string $user_password): void
    {
        $this->user_password = $user_password;
    }

    public function getUserFullName(): ?string
    {
        return $this->user_full_name;
    }

    public function setUserFullName(?string $user_full_name) :void
    {
        if(!$this->verifyString($this->cleanString($user_full_name))) {
            throw new Exception("User Full Name cannot be an empty string");
        }
        $this->user_full_name = $user_full_name;
    }

    public function getUserMail(): ?string
    {
        return $this->user_mail;
    }

    public function setUserMail(?string $user_mail)
    {
        if(is_null($user_mail)) return null;
        $cleanEmail = filter_var($user_mail, FILTER_VALIDATE_EMAIL);
        if(!$cleanEmail) throw new Exception("Not a valid email address");
        $this->user_mail = $cleanEmail;

    }

    public function getUserStatus(): ?int
    {
        return $this->user_status;
    }

    public function setUserStatus(?int $user_status): void
    {
        if(!$this->verifyInt($user_status, 0,2)){
            throw new Exception("User must be 0-2");
        }
        $this->user_status = $user_status;
    }

    public function getUserSecretKey(): ?string
    {
        return $this->user_secret_key;
    }

    public function setUserSecretKey(?string $user_secret_key): void
    {
        $this->user_secret_key = $user_secret_key;
    }

    public function getPermissionPermissionId(): ?int
    {
        return $this->permission_permission_id;
    }

    public function setPermissionPermissionId(?int $permission_permission_id): void
    {
        if(!$this->verifyInt($permission_permission_id, 0,2)){
            throw new Exception("Permission ID must be an integer");
        }
        $this->permission_permission_id = $permission_permission_id;
    }


}