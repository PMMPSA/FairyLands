<?php

namespace Enes5519\colorfularmor;

use pocketmine\command\{CommandSender, Command};
use pocketmine\Player;

class Komut extends Command{
    
    private $p;
    
    public function __construct($plugin){
        $this->p = ColorfulArmor::getInstance();
        $this->setAliases(array("ca"));
        parent::__construct("colorfularmor", "ColorfulArmor by Enes5519 (Việt hoá by KingofPro)");
    }
    
    public function execute(CommandSender $g, $label, array $args){
        $main = $this->p;
        if($g instanceof Player){
            if($g->hasPermission("enes5519.colorfularmor")){
                if(empty($main->kullanan[$g->getName()])){
                    $main->kullanan[$g->getName()] = "Aktif";
                    $g->sendMessage("§8» §aColorfulArmor bật!");
                }else{
                    unset($main->kullanan[$g->getName()]);
                    $main->zirhsil($g);
                    $g->sendMessage("§8» §cColorfulArmor tắt!");
                }
            }else{
                $g->sendMessage("§8» §cKhông có quyền để sử dụng ColorfulArmor!");
            }
        }
    }

}