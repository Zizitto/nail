<?php

namespace AppBundle\Entity\Event;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class FreeEvent extends Event
{
    const TYPE = "free";

    public function getType()
    {
        return self::TYPE;
    }
}
