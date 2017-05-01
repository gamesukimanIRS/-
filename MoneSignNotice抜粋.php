<?php

namespace MS;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\tile\Sign;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerChatEvent;

class MoneSignNotice extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}

public function onSignChange(SignChangeEvent $event){
              $p = $event->getPlayer();
              $x = $p->x;
              $y = $p->y;
              $z = $p->z;
              $level = $p->getLevel();
              $ln = $level->getFolderName();
              $n = $p->getName();
              $block = $event->getBlock();
              $si = $event->getLine(0);
              $si1 = $event->getLine(1);
              $si2 = $event->getLine(2);
              $si3 = $event->getLine(3);
              $this->getLogger()->info("§e[ ".$n."さんが看板を設置§c場所: ".$ln." §aX : ".(int)$x." §bY : ".(int)$y." §eZ : ".(int)$z." §e]");
              $this->getLogger()->info("§eLINE1 : ".$si."");
              $this->getLogger()->info("§eLINE2 : ".$si1."");
              $this->getLogger()->info("§eLINE3 : ".$si2."");
              $this->getLogger()->info("§eLINE4 : ".$si3."");
             	
	      }
}

