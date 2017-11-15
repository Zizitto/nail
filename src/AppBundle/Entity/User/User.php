<?php

namespace AppBundle\Entity\User;

use AppBundle\Entity\Event\Event;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\GedmoTrait;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\User\UserRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *      "admin" = "Admin",
 *      "manager" = "Manager",
 *      "master" = "Master",
 *      "client" = "Client"
 * })
 * @UniqueEntity(
 *     fields={"username"},
 *     errorPath="username",
 *     message="This Username is already in use",
 *     repositoryMethod="findUniqueBy"
 * )
 * @UniqueEntity(
 *     fields={"email"},
 *     errorPath="email",
 *     message="This Email is already in use",
 *     repositoryMethod="findUniqueBy"
 * )
 */
abstract class User implements UserInterface, AdvancedUserInterface, \JsonSerializable
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
     * @Assert\NotNull()
     * @Assert\Regex(pattern="/^[A-Za-z0-9-_.()\/']+$/", message="Allowed only letters, numbers and symbols: '_', '-'.")
     * @Assert\Length(min="3")
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @Assert\Email()
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\Length(min="2")
     * @Assert\Regex(pattern="/^[A-Za-z][A-Za-z- ()\/']+$/", message="Allowed only letters.")
     * @ORM\Column(type="string", nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Assert\Regex(pattern="/^[A-Za-z][A-Za-z- ()\/']+$/", message="Allowed only letters.")
     * @ORM\Column(type="string", nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $restoreCode;

    /**
     * @var string
     *
     */
    private $plainPassword;

    private $oldPassword;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean", options={"default"=0})
     */
    private $locked;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $role;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var Collection|Event[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Event\Event", mappedBy="creator")
     */
    private $createdEvents;


    public function __construct()
    {
        $this->setLocked(0);

        $this->createdEvents = new ArrayCollection();
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return $this->isEnabled();
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled(){
        return !$this->getLocked();
    }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return User
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    abstract public function getType();

    /**
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return [$this->getRole()];
    }

    /**
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'email' => $this->getEmail(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
        ];
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Set restoreCode
     *
     * @param string $restoreCode
     *
     * @return User
     */
    public function setRestoreCode($restoreCode)
    {
        $this->restoreCode = $restoreCode;

        return $this;
    }

    /**
     * Get restoreCode
     *
     * @return string
     */
    public function getRestoreCode()
    {
        return $this->restoreCode;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }


    /**
     * @return string
     */
    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    /**
     * @param string $oldPassword
     */
    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;
    }


    /**
     * Add createdEvent
     *
     * @param Event $createdEvent
     *
     * @return User
     */
    public function addCreatedEvent(Event $createdEvent)
    {
        $this->createdEvents[] = $createdEvent;

        return $this;
    }

    /**
     * Remove createdEvent
     *
     * @param Event $createdEvent
     */
    public function removeCreatedEvent(Event $createdEvent)
    {
        $this->createdEvents->removeElement($createdEvent);
    }

    /**
     * Get createdEvents
     *
     * @return Collection|Event[]
     */
    public function getCreatedEvents()
    {
        return $this->createdEvents;
    }
}
