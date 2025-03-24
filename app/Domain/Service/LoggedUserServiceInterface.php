<?php

namespace App\Domain\Service;

interface LoggedUserServiceInterface
{
    public function getName(): ?string;
    public function getEmail(): ?string;
    public function getPhone(): ?string;
}
