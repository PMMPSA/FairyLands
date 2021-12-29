<?php

namespace PTK\Trade;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TF::GREEN . "Trade Đã Hoạt Động");
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd->getName() == "trade"){
			$sender->sendMessage(TF::BLUE . "§9[§6Trade§9]§b»  §6Sử dụng: /trade list để xem danh sách gói vật phẩm, sử dụng /trade item (tên vật phẩm) để đổi vật phẩm");
			if(isset($args[0])){
				switch(strtolower($args[0])){
				case "list":
				$sender->sendMessage(TF::BLUE . "§9[§6Trade§9]§b»  §bDanh sách các gói vật phẩm đặc biệt (/trade item (vật phẩm) để để đổi)");
				$sender->sendMessage(TF::GREEN . "1.Cúp Sắt Cường Hóa - 3 Thủy Ngọc (cú pháp: cup1)");
				$sender->sendMessage(TF::GREEN . "2.Cúp Kim Cương Cường Hóa - 4 Thổ Ngọc (cú pháp: cup2");
				$sender->sendMessage(TF::GREEN . "3.Cúp Hắc Diện Thạch - 5 Hỏa Ngọc (cú pháp: cup3)");
				$sender->sendMessage(TF::GREEN . "4.Cúp Ánh Sáng - 6 Trái Tim Rồng (cú pháp: cup4)");
				$sender->sendMessage(TF::GREEN . "5.Kiếm Titanium - 5 Trái Tim Rồng (cú pháp: kiem)");
				$sender->sendMessage(TF::GREEN . "6.Set Giáp+Kiếm Khởi Đầu - 5 Mắt Thần (cú pháp: set1)");
				$sender->sendMessage(TF::GREEN . "7.Set Giáp+Kiếm Boss - 200000000xu (cú pháp: set2)");
				$sender->sendMessage(TF::GREEN . "8.Gậy Thông Trĩ Siêu Cấp - 400000xu (cú pháp: gaythongtri)");
				$sender->sendMessage(TF::BLUE . "§9[§6Trade§9]§b»  §bGhi /trade list 2 để xem trang tiếp theo ---->");
				   if(isset($args[1])){
					   switch (strtolower($args[1])){
						   case "2":
				           $sender->sendMessage(TF::BLUE . "§9[§6Trade§9]§b»  §bList 2 của Trade");
                           $sender->sendMessage(TF::GREEN . "9. Cánh Cứng - 60000xu (cú pháp: canhcung)");
						   $sender->sendMessage(TF::GREEN . "10.Thủy Ngọc - 50000xu (cú pháp: thuyngoc)");
						   $sender->sendMessage(TF::GREEN . "11.Thổ Ngọc - 50000xu (cú pháp: thongoc)");
						   $sender->sendMessage(TF::GREEN . "12.Token - 30000xu (cú pháp: token");
						   return true;
						   break;
					   }
				   }
				return true;
				case "item":
				   if(isset($args[1])){
					   switch (strtolower($args[1])){
						   //Cúp Sắt
						  case "cup1":
						  $p = $this->getServer()->getPlayer($sender->getName());
						  $item = Item::get(257, 0, 1);
						  $item->setCustomName("§r§6Cúp Sắt Phù Phép");
						  if($sender->getInventory()->contains(Item::get(370,0,3))){
							  $item->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							  $item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
							  $sender->getInventory()->addItem($item);
							  $sender->getInventory()->removeItem(Item::get(370,0,3));
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::YELLOW . "Bạn đã đổi cúp sắt phù phép với 3 Thủy Ngọc");
						  }
						  else{
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::RED . "Bạn không có vật phẩm để đổi");
						  }
				          return true;
						  break;
						  //Cúp Kim Cương
						  case "cup2":
						  $p = $this->getServer()->getPlayer($sender->getName());
						  $item = Item::get(278, 0, 1);
						  $item->setCustomName("§r§6Cúp Kim Cương Phù Phép");
						  if ($sender->getInventory()->contains(Item::get(336,0,4))){
							  $item->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							  $sender->getInventory()->removeItem(Item::get(336,0,4));
							  $item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
							  $sender->getInventory()->addItem($item);
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::YELLOW . "Bạn Đã Đổi Thành Công Cúp Kim Cương Phù Phép 4 Thổ Ngọc");
						  }
						  else{
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
						  }
						  return true;
						  break;
						  //Cúp Hắc Diện Thạch
						  case "cup3":
						  $p = $this->getServer()->getPlayer($sender->getName());
						  $item = Item::get(278, 0, 1);
						  $item->setCustomName("§r§6Cúp Hắc Diện Thạch");
						  if ($sender->getInventory()->contains(Item::get(378,0,5))){
							  $item->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							  $sender->getInventory()->removeItem(Item::get(378,0,5));
							  $item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(7));
							  $item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
							  $item->addEnchantment(Enchantment::getEnchantment(18)->setLevel(1));
							  $sender->getInventory()->addItem($item);
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::YELLOW . "Bạn Đã Đổi Thành Công Cúp Hắc Diện Thạch Bằng 5 Hỏa Ngọc");
						  }
						  else{
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
						  }
						  return true;
						  break;
						  //Blaze Enchant Pickaxe
						  case "cup4":
						  $p = $this->getServer()->getPlayer($sender->getName());
						  $item = Item::get(278, 0, 1);
						  $item->setCustomName("§r§6Cúp  Ánh Sáng");
						  if ($sender->getInventory()->contains(Item::get(3 ,0,5))){
							  $item->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							  $sender->getInventory()->removeItem(Item::get(378,0,5));
							  $item->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							  $item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
							  $item->addEnchantment(Enchantment::getEnchantment(18)->setLevel(2));
							  $sender->getInventory()->addItem($item);
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::YELLOW . "Bạn Đã Đổi Thành Công Cúp Ánh Sáng Bằng 6 Trái Tim Rồng");
						  }
						  else{
							  $sender->sendMessage("§9[§6Trade§9]§b» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
					     }
						 return true;
						 break;
						 case "set1":
						 $p = $this->getServer()->getPlayer($sender->getName());
						 $item1 = Item::get(306, 0, 1);
						 $item2 = Item::get(307, 0, 1);
						 $item3 = Item::get(308, 0, 1);
						 $item4 = Item::get(309, 0, 1);
						 $item5 = Item::get(267, 0, 1);
						 $item6 = Item::get(257, 0, 1);
						 $item7 = Item::get(258, 0, 1);
						 $item8 = Item::get(256, 0, 1);
						 $item1->setCustomName("§r§6Mũ Khởi Đầu");
						 $item2->setCustomName("§r§6Áo Khởi Đầu");
						 $item3->setCustomName("§r§6Quần Khởi Đầu");
						 $item4->setCustomName("§r§6Giày Khởi Đầu");
						 $item5->setCustomName("§r§6Kiếm Khởi Đầu");
						 $item6->setCustomName("§r§6Cúp Khởi Đầu");
						 $item7->setCustomName("§r§6Rìu Khởi Đầu");
						 $item8->setCustomName("§r§6Xẻng Khởi Đầu");
						 if ($sender->getInventory()->contains(Item::get(385,0,5))){
							 $item1->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item2->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item3->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item4->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item5->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item6->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item7->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
							 $item8->setLore(array(TF::RED."§lVẬT PHẨM KHÔNG BÁN TẠI SHOP CHỈ CÓ THỂ TRADE!"));
				             $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(1));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(1));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(1));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(1));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(1));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(3));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item7->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
							 $item7->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $item8->addEnchantment(Enchantment::getEnchantment(15)->setLevel(3));
							 $item8->addEnchantment(Enchantment::getEnchantment(17)->setLevel(3));
							 $sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 $sender->getInventory()->addItem($item7);
							 $sender->getInventory()->addItem($item8);
							 $sender->sendMessage("§9[§6Trade§9]§b» ".TF::YELLOW . "Bạn Đã Đổi Thành Công Set Khởi Đầu Bằng Mắt Thần");
						 }
						 else{
							 $sender->sendMessage("§9[§6Trade§9]§b» ".TF::RED . "Bạn Không Có Đủ Vật Phẩm Để Đổi");
						 }
						 return true;
						 break;
						 case "set2":
						 $p = $this->getServer()->getPlayer($sender->getName());
						 $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(277, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§r§b•>§1Đ§2ồ§3 Đ§4ặ§5c§6 B§7i§8ệ§9t§0:§a Mũ Của Boss§b<•");
						 $name2 = $item2->setCustomName("§r§b•>§1Đ§2ồ§3 Đ§4ặ§5c§6 B§7i§8ệ§9t§0:§a Áo Của Boss§b<•");
						 $name3 = $item3->setCustomName("§r§b•>§1Đ§2ồ§3 Đ§4ặ§5c§6 B§7i§8ệ§9t§0:§a Quần Của Boss§b<•");
						 $name4 = $item4->setCustomName("§r§b•>§1Đ§2ồ§3 Đ§4ặ§5c§6 B§7i§8ệ§9t§0:§a Giày Của Boss§b<•");
						 $name5 = $item5->setCustomName("§r§b•>§1Đ§2ồ§3 Đ§4ặ§5c§6 B§7i§8ệ§9t§0:§a Kiếm Của Boss§b<•");
						 $name6 = $item6->setCustomName("§r§b•>§1Đ§2ồ§3 Đ§4ặ§5c§6 B§7i§8ệ§9t§0:§a Cúp Của Boss§b<•");
						 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						 if ($money < 200000000){
							 $sender->sendMessage(TF::RED . "Không đủ tiền");
						 }
						 else{
					         $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 200000000);
				             $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(5));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(5));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(5));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(5));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(5));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(2));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 $item1->setCustomName($name1);
							 $item2->setCustomName($name2);
							 $item3->setCustomName($name3);
							 $item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 $item6->setCustomName($name6);
							 $sender->sendMessage(TF::YELLOW . "Bạn đã chính thức trở thành Boss Trong Server với $name1 trị giá 200000000 xu");
						 }

						 return true;
						 break;
						 case "gaythongtri":
						  $p = $this->getServer()->getPlayer($sender->getName());
						  $item = Item::get(280, 0, 1);
						  $name = $item->setCustomName("§aGậy Thông Trĩ Siêu Cấp");
		                  $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 400000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 400000);
							  $item->addEnchantment(Enchantment::getEnchantment(9)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
							  $item->addEnchantment(Enchantment::getEnchantment(10)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(11)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(12)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(13)->setLevel(5));
							  $item->addEnchantment(Enchantment::getEnchantment(14)->setLevel(5));
							  $sender->getInventory()->addItem($item);
							  $item->setCustomName($name);
							  $sender->sendMessage(TF::YELLOW . "Bạn đã mua Iron Gậy Thông Trĩ với giá 400000 xu");
						  }
				          return true;
						  break;
						//lol xd
						case "thuyngoc":
						$p = $this->getServer()->getPlayer($sender->getName());
						$item = Item::get(370, 0, 1);
						$name = $item->setCustomName("§c§lThủy Ngọc");
						$item->setLore(array(TF::AQUA."§lVẬT PHẨM DÙNG ĐỂ TRADE!"));
						$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						if ($money < 50000){
							$sender->sendMessage(TF::RED . "Không đủ tiền");
						}
						else{
							$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 50000);
							$sender->getInventory()->addItem($item);
							$item->setCustomName($name);
							$sender->sendMessage(TF::YELLOW . "Bạn đã mua Thủy Ngọc với giá 50000 xu");
						}
						return true;
						break;
						case "thongoc":
						$p = $this->getServer()->getPlayer($sender->getName());
						$item = Item::get(336, 0, 1);
						$name = $item->setCustomName("§c§lThổ Ngọc");
						$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						if ($money < 50000){
							$sender->sendMessage(TF::RED . "Không đủ tiền");
						}
						else{
							$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 50000);
							$sender->getInventory()->addItem($item);
							$item->setCustomName($name);
							$sender->sendMessage(TF::YELLOW . "Bạn đã mua chữ Thổ Ngọc với giá 50000 xu");
						}
						return true;
						break;
						case "vevip":
						$p = $this->getServer()->getPlayer($sender->getName());
						$item = Item::get(339, 0, 1);
						$name = $item->setCustomName("§5§lToken");
						$item->setLore(array(TF::RED."§lToken"));
						$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						if ($money < 30000){
							$sender->sendMessage(TF::RED . "Không đủ tiền");
						}
						else{
							$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 30000);
							$item->addEnchantment(Enchantment::getEnchantment(17)->setLevel(1));
							$sender->getInventory()->addItem($item);
							$item->setCustomName($name);
							$sender->sendMessage(TF::YELLOW . "Bạn đã mua Token với giá 30000 xu");
						}
						return true;
						break;
						case "canhcung":
						$p = $this->getServer()->getPlayer($sender->getName());
						$item = Item::get(444, 0, 1);
						$name = $item->setCustomName("§b§lELYTRA");
						$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						if ($money < 60000){
							$sender->sendMessage(TF::RED . "Không đủ tiền");
						}
						else{
							$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 60000);
							$sender->getInventory()->addItem($item);
							$item->setCustomName($name);
							$sender->sendMessage(TF::YELLOW . "Bạn đã mua Cánh Cứng (Elytra) với giá 60000 xu");
						}
						return true;
						break;
				}
				return true;
			}
		}
	}
	
}
}
}