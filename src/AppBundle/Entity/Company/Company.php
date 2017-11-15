<?php

namespace AppBundle\Entity\Company;

use AppBundle\Entity\User\Manager;
use AppBundle\Entity\User\Master;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\GedmoTrait;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Company
 *
 * @ORM\Table(name="Company")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "salon" = "SalonCompany",
 * })
 */
abstract class Company
{
    use GedmoTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\Length(min="2")
     * @Assert\Regex(pattern="/^[A-Za-z][A-Za-z- ()\/']+$/", message="Allowed only letters.")
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @var Manager
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\Manager", fetch="EXTRA_LAZY", inversedBy="companies")
     */
    private $manager;

    /**
     * @var Collection|Master[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User\Master", mappedBy="master")
     */
    private $masters;

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
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set manager
     *
     * @param Manager $manager
     *
     * @return Company
     */
    public function setManager(Manager $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return Manager
     */
    public function getManager()
    {
        return $this->manager;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->masters = new ArrayCollection();
    }

    /**
     * Add master
     *
     * @param Master $master
     *
     * @return Company
     */
    public function addMaster(Master $master)
    {
        $this->masters[] = $master;

        return $this;
    }

    /**
     * Remove master
     *
     * @param Master $master
     */
    public function removeMaster(Master $master)
    {
        $this->masters->removeElement($master);
    }

    /**
     * Get masters
     *
     * @return Collection|Master[]
     */
    public function getMasters()
    {
        return $this->masters;
    }
}
