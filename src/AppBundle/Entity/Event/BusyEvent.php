<?php

namespace AppBundle\Entity\Event;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class BusyEvent extends Event
{
    const TYPE = "busy";

    public function getType()
    {
        return self::TYPE;
    }
}
