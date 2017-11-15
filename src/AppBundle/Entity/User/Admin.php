<?php

namespace AppBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\User\AdminRepository")
 */
class Admin extends User
{
    const ROLE = 'ROLE_ADMIN';
    const TYPE = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->setLocked(0);
        $this->setRole(self::ROLE);
    }

    public function getType() {
        return self::TYPE;
    }
}
