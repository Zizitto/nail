<?php

namespace AppBundle\Entity\User;

use AppBundle\Entity\Company\Company;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\User\ManagerRepository")
 */
class Manager extends User
{
    const ROLE = 'ROLE_MANAGER';
    const TYPE = 'manager';

    /**
     * @var Collection|Company[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Company\Company", mappedBy="manager")
     */
    private $companies;

    public function __construct()
    {
        parent::__construct();
        $this->setRole(self::ROLE);

        $this->companies = new ArrayCollection();
    }

    public function getType()
    {
        return self::TYPE;
    }

    /**
     * Add company
     *
     * @param Company $company
     *
     * @return Manager
     */
    public function addCompany(Company $company)
    {
        if (!$this->getCompanies()->contains($company))
            $this->getCompanies()->add($company);

        return $this;
    }

    /**
     * Remove company
     *
     * @param Company $company
     *
     * @return Manager
     */
    public function removeCompany(Company $company)
    {
        if ($this->getCompanies()->contains($company))
            $this->getCompanies()->removeElement($company);

        return $this;
    }

    /**
     * Get companies
     *
     * @return Collection
     */
    public function getCompanies()
    {
        return $this->companies;
    }
}
