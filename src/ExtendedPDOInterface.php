<?php
namespace Asticode\ExtendedPDO;

use Aura\Sql\ExtendedPdoInterface as AuraExtendedPdoInterface;

interface ExtendedPDOInterface extends AuraExtendedPdoInterface
{

    /**
     *
     * Returns the underlying PDO connection object.
     *
     * @return \PDO or Null if connection was manually disconnected
     *
     */
    public function getPdo();

}
