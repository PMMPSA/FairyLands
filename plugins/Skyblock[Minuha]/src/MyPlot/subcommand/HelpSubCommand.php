<?php
namespace MyPlot\subcommand;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;

class HelpSubCommand extends SubCommand
{
    public function canUse(CommandSender $sender) {
        return $sender->hasPermission("myplot.command.help");
    }

    /**
     * @return \MyPlot\Commands
     */
    private function getCommandHandler()
    {
        return $this->getPlugin()->getCommand($this->translateString("command.name"));
    }

    public function execute(CommandSender $sender, array $args) {
        if (count($args) === 0) {
            $pageNumber = 1;
        } elseif (is_numeric($args[0])) {
            $pageNumber = (int) array_shift($args);
            if ($pageNumber <= 0) {
                $pageNumber = 1;
            }
        } else {
            return false;
        }

        if ($sender instanceof ConsoleCommandSender) {
            $pageHeight = PHP_INT_MAX;
        } else {
            $pageHeight = 5;
        }

        $commands = [];
        foreach ($this->getCommandHandler()->getCommands() as $command) {
            if ($command->canUse($sender)) {
                $commands[$command->getName()] = $command;
            }
        }
        ksort($commands, SORT_NATURAL | SORT_FLAG_CASE);
        $commands = array_chunk($commands, $pageHeight);
        /** @var SubCommand[][] $commands */

							//////
            $sender->sendMessage("  §l§c-=- §b§lFairyLands§a SkyBlock - Help §c-=-");
			$sender->sendMessage("§c☆▶§e/sb play§c: §aĐi đến một hòn đảo");
			$sender->sendMessage("§c☆▶§e/sb claim§c: §aMua ngay hòn đảo bạn đang đứng");
			$sender->sendMessage("§c☆▶§e/sb add §e<Tên Người Chơi>§c: §aThêm người vào đảo của bạn");
			$sender->sendMessage("§c☆▶§e/sb kick §e<Tên Người Chơi>§c: §aXóa người chơi trong đảo của bạn");
			$sender->sendMessage("§c☆▶§e/sb homes§c: §aDanh sách đảo của bạn");
			$sender->sendMessage("§c☆▶§e/sb home §e<ID đảo>§c: §aDịch chuyển về đảo của bạn");
			$sender->sendMessage("§c☆▶§e/sb info§c: §a§eXem thông tin hòn đảo");
			$sender->sendMessage("§c☆▶§e/sb give §e<Tên người chơi>§c: §aCho người khác hòn đảo của bạn");
	        $sender->sendMessage("§c☆▶§e/sb warp §e[x;y]§c:§a Di chuyển đến hòn đảo nào đó");
	        $sender->sendMessage("§c☆▶§e/sb delete§c: §aXóa hòn đảo của bạn!");
        return true;
    }
}
