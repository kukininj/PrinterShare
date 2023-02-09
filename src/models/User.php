<?php

class User
{
    public int $id_user;
    public string $email;
    public string $password_hash;
    public string $name;
    public string $surname;
    public string $profile_picture;
    public ?int $id_merchant;
    public ?string $area_name;


    public function __construct(
        int $id_user,
        string $email,
        string $password_hash,
        string $name,
        string $surname,
        string $profile_picture,
        ?int $id_merchant,
        ?string $area_name
    ) {
        $this->id_user = $id_user;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->name = $name;
        $this->surname = $surname;
        $this->profile_picture = $profile_picture;
        $this->id_merchant = $id_merchant;
        $this->area_name = $area_name;
    }

    public function checkPassword(string $password): bool
    {
        return strcmp($this->password_hash, $password) === 0;
    }

    public function isMerchant(): bool
    {
        return !is_null($this->id_merchant);
    }
}
