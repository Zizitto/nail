<?php

namespace AppBundle\Entity\Event;

use AppBundle\Entity\RangeTrait;
use AppBundle\Entity\User\Master;
use AppBundle\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\GedmoTrait;


/**
 * Event
 *
 * @ORM\Table(name="Event")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "free" = "FreeEvent",
 *      "busy" = "BusyEvent",
 *      "client" = "ClientEvent",
 * })
 */
abstract class Event
{
    use GedmoTrait;
    use RangeTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Master
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\Master", inversedBy="events")
     */
    private $master;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\User", inversedBy="eventCreator")
     */
    private $creator;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set master
     *
     * @param Master $master
     *
     * @return Event
     */
    public function setMaster(Master $master = null)
    {
        $this->master = $master;

        return $this;
    }

    /**
     * Get master
     *
     * @return Master
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Set creator
     *
     * @param User $creator
     *
     * @return Event
     */
    public function setCreator(User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }
}
