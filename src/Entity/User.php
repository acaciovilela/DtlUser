<?php

namespace DtlUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {

    const STATUS_ACTIVE = 1;
    const STATUS_RETIRED = 2;

    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="string", nullable=false)
     */
    protected $email;

    /**
     *
     * @ORM\Column(name="full_name", type="string")
     */
    protected $fullName;

    /**
     *
     * @ORM\Column(type="string", nullable=false)
     */
    protected $password;

    /**
     *
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     *
     * @ORM\Column(name="date_created", type="date")
     */
    protected $dateCreated;

    /**
     *
     * @ORM\Column(name="password_reset_token", nullable=true)
     */
    protected $passwordResetToken;

    /**
     *
     * @ORM\Column(name="password_reset_token_creation_date", type="date", nullable=true)
     */
    protected $passwordResetTokenCreationDate;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @var User
     */
    protected $parent;

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatus() {
        return $this->status;
    }

    public static function getStatusList() {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_RETIRED => 'Retired'
        ];
    }

    public function getStatusAsString() {
        $list = self::getStatusList();
        if (isset($list[$this->status])) {
            return $list[$this->status];
        }
    }

    public function getDateCreated() {
        return $this->dateCreated;
    }

    public function getPasswordResetToken() {
        return $this->passwordResetToken;
    }

    public function getPasswordResetTokenCreationDate() {
        return $this->passwordResetTokenCreationDate;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    public function setPasswordResetToken($passwordResetToken) {
        $this->passwordResetToken = $passwordResetToken;
        return $this;
    }

    public function setPasswordResetTokenCreationDate($passwordResetTokenCreationDate) {
        $this->passwordResetTokenCreationDate = $passwordResetTokenCreationDate;
        return $this;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setParent(User $parent) {
        $this->parent = $parent;
        return $this;
    }

}
