<?php

namespace AppBundle\Entity\User;

use AppBundle\Entity\Company\Company;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\User\MasterRepository")
 */
class Master extends User
{
    const ROLE = 'ROLE_MASTER';
    const TYPE = 'master';

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company\Company", inversedBy="masters")
     */
    private $company;

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
     * Set company
     *
     * @param Company $company
     *
     * @return Master
     */
    public function setCompany(Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}
