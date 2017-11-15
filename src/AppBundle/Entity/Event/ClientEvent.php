<?php

namespace AppBundle\Entity\Event;

use AppBundle\Entity\User\Client;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ClientEvent extends Event
{
    const TYPE = "client";

    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\Client", inversedBy="events")
     */
    private $client;


    /**
     * Set client
     *
     * @param \AppBundle\Entity\User\Client $client
     *
     * @return ClientEvent
     */
    public function setClient(\AppBundle\Entity\User\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\User\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
