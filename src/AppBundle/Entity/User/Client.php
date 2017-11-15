<?php

namespace AppBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\User\ClientRepository")
 */
class Client extends User
{
    const ROLE = 'ROLE_CLIENT';
    const TYPE = 'client';

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $mobileNumber;

    public function __construct()
    {
        parent::__construct();
        $this->setRole(self::ROLE);
    }

    public function getType()
    {
        return self::TYPE;
    }
    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     *
     * @return Client
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }
}
