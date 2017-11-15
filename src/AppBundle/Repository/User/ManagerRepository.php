<?php

namespace AppBundle\Repository\User;

class ManagerRepository extends UserRepository
{
    public function findUniqueBy(array $criteria)
    {
        return $this->_em->getRepository('AppBundle:User\User')->findBy($criteria);
    }
}