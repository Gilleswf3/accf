<?php

namespace Model\Propel;

use Model\Propel\Base\EmployeesQuery as BaseEmployeesQuery;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Skeleton subclass for performing query and update operations on the 'employees' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class EmployeesQuery extends BaseEmployeesQuery implements UserProviderInterface
{
    public function loadUserByUsername($username): UserInterface {
        $user = self::create()->findOneByLastname($username);
        
        if( ! $user) {
            throw new UsernameNotFoundException();
        }
        return $user;
    }

    public function refreshUser(UserInterface $user): UserInterface {
        $user =  self::create()->loadUserByUsername($user->getUsername());
        return $user;
    }

    public function supportsClass($class): bool {
        return $class === Employees::class;
    }

}
