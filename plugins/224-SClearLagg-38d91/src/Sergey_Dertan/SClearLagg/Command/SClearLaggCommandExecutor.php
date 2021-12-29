<?php
namespace Sergey_Dertan\SClearLagg\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as F;
use Sergey_Dertan\SClearLagg\SClearLaggMainFolder\SClearLaggMain;

/**
 * Class SClearLaggCommandExecutor
 * @package Sergey_Dertan\SClearLagg\Command
 */
class SClearLaggCommandExecutor
{
    /**
     * @param CommandSender $s
     * @param Command $cmd
     * @param array $args
     */
    function __construct(CommandSender $s, Command $cmd, array $args)
    {
        $this->executeCommand($s, $cmd, $args);
    }

    /**
     * @param CommandSender $s
     * @param Command $cmd
     * @param array $args
     * @return bool
     */
    private function executeCommand(CommandSender $s, Command $cmd, array $args)
    {
        $main = SClearLaggMain::getInstance();
        $entitiesManager = $main->getEntityManager();
        switch ($cmd->getName()) {
            case"scl":
                if (!isset($args[0])) {
                    $s->sendMessage(F::RED . "§6[§aGAME§6] §aDỌNRÁC V_" . $main->getDescription()->getVersion() . "\n /scl clear - §bDọn rác command\n" "/scl killmob - Kill mob command");
                    return true;
                }
                if (!in_array(strtolower($args[0]), array("clear", "mobkill"))) {
                    $s->sendMessage(F::RED . "§6[§aGAME§6] §cCÁCH DÙNG ĐÚNG: §a/scl <clear|mobkill>" );
                    return true;
                }
                switch (array_shift($args)) {
                    case"clear":
                        $s->sendMessage(F::YELLOW . "§6[§aGAME§6] §bĐã dọn " . $entitiesManager->removeEntities() . " §ccần");
                        return true;
                        break;
                    case"mobkill":
                        $s->sendMessage(F::YELLOW . "§6[§aGAME§6] §bĐã dọn " . $entitiesManager->removeMobs() . " §cmob");
                        return true;
                        break;
                }
                break;
        }
        return true;
    }
}