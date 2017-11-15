<?php

namespace AppBundle\Entity\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class SalonCompany extends Company
{
    const TYPE = "salon";

    public function getType()
    {
        return self::TYPE;
    }
}
