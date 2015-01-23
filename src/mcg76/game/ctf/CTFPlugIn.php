<?php

namespace mcg76\game\ctf;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\event\Listener;
use pocketmine\math\Vector3 as Vector3;
use pocketmine\block\Block;

/**
 * CaptureTheFlag PlugIn - MCPE Mini-Game
 *
 * Copyright (C) 2015 minecraftgenius76
 *
 * @author MCG76
 * @link http://www.youtube.com/user/minecraftgenius76
 *        
 */
class CTFPlugIn extends PluginBase implements CommandExecutor {
	
	// object variables
	public $config;
	public $ctfBlockBuilder;
	public $ctfManager;
	public $ctfMessages;
	public $ctfGameKit;
	public $ctfSetup;
	
	// keep track of all block points
	public $redTeamPlayers = [ ];
	public $blueTeamPLayers = [ ];
	public $gameStats = [ ];
	
	// players with the flag
	public $playersWithRedFlag = [ ];
	public $playersWithBlueFlag = [ ];
	
	// keep game statistics
	public $gameMode = 0;
	public $gameState = 0;
	public $blueTeamWins = 0;
	public $redTeamWins = 0;
	public $pos_display_flag = 0;
	public $currentGameRound = 0;
	public $maxGameRound = 3;
	
	// language messages
	public $messages = [ ];

	//setup mode
	public $setupModeAction = "";
	
	/**
	 * OnLoad
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onLoad()
	 */
	public function onLoad() {		
		$this->ctfSetup = new CTFSetup ( $this );
		$this->ctfMessages = new CTFMessages ( $this );
		$this->ctfManager = new CTFManager ( $this );		
		$this->ctfBlockBuilder = new CTFBlockBuilder ( $this );
		$this->ctfGameKit = new CTFGameKit ( $this );
	}
	
	/**
	 * OnEnable
	 *
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onEnable()
	 */
	public function onEnable() {		
		$time_start = microtime(true);
		
		if (! file_exists ( $this->getDataFolder () . "config.yml" )) {
			@mkdir ( $this->getDataFolder (), 0777, true );
			file_put_contents ( $this->getDataFolder () . "config.yml", $this->getResource ( "config.yml" ) );
		}
		$this->getConfig ()->getAll ();
		
		$maxRounds = $this->ctfSetup->getMaxGameRounds();
		
		$this->enabled = true;
		$this->getServer ()->getPluginManager ()->registerEvents ( new CTFListener ( $this ), $this );
		
		$this->redTeamPlayers = [ ];
		$this->blueTeamPLayers = [ ];
		
		$time_end = microtime(true);
		$time = $time_end - $time_start;
		//$this->getLogger ()->info (TextFormat::AQUA."Max Rounds ".$maxRounds);
		$this->getLogger ()->info (TextFormat::AQUA."enable took time $time seconds\n");
		$this->getLogger ()->info ( TextFormat::GREEN . "-" . $this->ctfMessages->getMessageByKey ( "plugin.enable" ) );		

		if ($this->getConfig()->get("run_selftest_message")=="YES") {
			//run test message
			$tmsg = new TestMessages($this);
			$tmsg->runTests();
		}
	}
	
	/**
	 * OnDisable
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onDisable()
	 */
	public function onDisable() {
		$this->getLogger ()->info ( TextFormat::RED . $this->ctfMessages->getMessageByKey ( "plugin.disable" ) );
		$this->enabled = false;
	}
	
	public function setGameMode($mode) {
		$this->gameMode = $mode;
	}
	
	public function getGameMode() {
		return $this->gameMode;
	}
	
	public function clearSetup() {
		$this->setupModeAction="";
	}
	
	/**
	 * OnCommand
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onCommand()
	 */
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		$this->ctfManager->onCommand ( $sender, $command, $label, $args );
	}
}
