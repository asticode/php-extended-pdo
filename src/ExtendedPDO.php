<?php
namespace Molotov\ExtendedPDO;

use Aura\Sql\ExtendedPdo as AuraExtendedPdo;

class ExtendedPdo extends AuraExtendedPdo
{
    // Attributes
    private $aPostConnectCommands;

    // Construct
    public function __construct(
        $sDSN,
        $sUsername = null,
        $sPassword = null,
        array $aOptions = array(),
        array $aAttributes = array(),
        array $aPostConnectCommands = []
    ) {
        // Parent construct
        parent::__construct($sDSN, $sUsername, $sPassword, $aOptions, $aAttributes);

        // Attributes
        $this->aPostConnectCommands = $aPostConnectCommands;
    }

    // Connect
    public function connect()
    {
        if ($this->pdo) {
            return;
        }

        // Parent connect
        parent::connect();

        // Loop through post connect commands
        foreach ($this->aPostConnectCommands as $sCommand) {
            $this->query($sCommand);
        }
    }
}
