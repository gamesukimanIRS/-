<?php
public function onSignChange(SignChangeEvent $event){
        $player = $event->getPlayer();
        if (strtolower(trim($event->getLine(0))) == "info" || strtolower(trim($event->getLine(0))) == "[info]") {
            if ($player->hasPermission("serverinfo") or $player->hasPermission("serverinfo.create")) {
                $tps = $this->getServer()->getTicksPerSecond();
                $p = count($this->getServer()->getOnlinePlayers());
                $level = $event->getBlock()->getLevel()->getName();
                $full = $this->getServer()->getMaxPlayers();
                $load = $this->getServer()->getTickUsage();
                $format = $this->format->getAll();
                
                for ($x = 0; $x <= 3; $x++) {
                    $v = $format["format"][$x + 1];
                    $v = str_replace("{ONLINE}", $p, $v);
                    $v = str_replace("{MAX_ONLINE}", $full, $v);
                    $v = str_replace("{WORLD_NAME}", $level, $v);
                    $v = str_replace("{TPS}", $tps, $v);
                    $v = str_replace("{SERVER_LOAD}", $load, $v);
                    $event->setLine($x, $v);
                }
                $player = $event->getPlayer();
                $player->sendMessage($this->prefix . $this->translation->get("info_play"));
            } else {
                $player->sendMessage($this->prefix . $this->translation->get("sign_no_per"));
                $event->setCancelled();
            }
        }
    }
