<?php

namespace XFizzer;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if(isset($args[0])){
			switch(strtolower($args[0])){
				case "aogiap":
		 $item = $sender->getInventory()->getItemInHand();
      $enchantment = Enchantment::getEnchantment(mt_rand(0, 5))->setLevel((int)rand(1,5));;
      $xp = $sender->getXpLevel();
		if($xp < 15)
		{
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Không đủ XP!");
		}else{
			$sender->takeXpLevel(15);
			$item->addEnchantment($enchantment);
            $sender->getInventory()->setItemInHand($item);
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Enchant thành công!");
		}
		  break;
		  case "congcu":
		 $item = $sender->getInventory()->getItemInHand();
      $enchantment = Enchantment::getEnchantment(mt_rand(15, 18))->setLevel((int)rand(1,5));;
      $xp = $sender->getXpLevel();
		if($xp < 15)
		{
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Không đủ XP!");
		}else{
			$sender->takeXpLevel(15);
			$item->addEnchantment($enchantment);
            $sender->getInventory()->setItemInHand($item);
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Enchant thành công!");
		}
		  break;
		  case "cung":
		 $item = $sender->getInventory()->getItemInHand();
      $enchantment = Enchantment::getEnchantment(mt_rand(19, 22))->setLevel((int)rand(1,5));;
      $xp = $sender->getXpLevel();
		if($xp < 15)
		{
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Không đủ XP!");
		}else{
			$sender->takeXpLevel(15);
			$item->addEnchantment($enchantment);
            $sender->getInventory()->setItemInHand($item);
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Enchant thành công!");
		}
		  break;
		  case "vukhi":
		 $item = $sender->getInventory()->getItemInHand();
      $enchantment = Enchantment::getEnchantment(mt_rand(9, 14))->setLevel((int)rand(1,5));;
      $xp = $sender->getXpLevel();
		if($xp < 15)
		{
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Không đủ XP!");
		}else{
			$sender->takeXpLevel(15);
			$item->addEnchantment($enchantment);
            $sender->getInventory()->setItemInHand($item);
			$sender->sendMessage("§8[§b◆XPEnchant◆ §8] §7Enchant thành công!");
		}
		  break;
		  case "help":
					$sender->sendMessage("§d◆XPEnchant◆  §7trợ giúp 1 trên 1:");
					$sender->sendMessage("  §8→ §7Cách dùng: /random (aogiap, congcu, cung, vukhi");
					$sender->sendMessage("  §8→ §7Mỗi enchant tốn 15XP");
					break;	  }
    }
  }
}