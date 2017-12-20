<?php

namespace Model\Propel;

use Model\Propel\Base\Employees as BaseEmployees;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Skeleton subclass for representing a row from the 'employees' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Employees extends BaseEmployees  implements UserInterface
{
    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return array($this->getRole());
    }

    public function getSalt() {
        return null;
    }

    public function getUsername(): string {
        return $this->getLastname();
    }

}
