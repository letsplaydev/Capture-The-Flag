
Changes in version 1.5.0 
=============
fixes 
=============
- team member can not break own team flag
- when a team member carry a enermy flag dead, enemy flag return to original location
- game starts when only have members join

new features
=============
- code re-factoring and optimization
- source code uploaded to github 

Customization 
  - multi-lingual support
  - border fence
  - team own defence fence 
  - player kits 
  - arena building blocks for wall
  - arena building blocks for floor
  - easy sign setup commands
   
===============================================================================================
MCG76 Minigame "Capture The Flag" plugin for MCPE Server | PocketMine alpha 1.4x
===============================================================================================
This is a new MCPE version of Capture the flag mini-game. 
Your goal is to capture the enemy's flag. 
The enemy's flag will be on a fence post in or near their base. 
Break into the enemy's base and steal their flag. 

Testing Status:  Verified 
-Minecraft Pocket Edition 0.10.0 
-PocketMine Server: Latest Alpha 1.4 Beta 7+ Build 
===============================================================================================

Project: MCG76 Minigame - Capture the Flag - Build #1

Player Commands: 
----------------------------------------------------------------------------------------------
"/ctf joinred"          -- join red team
"/ctf joinblue"         -- join blue team
"/ctf leave"            -- leave the team
"/ctf start"            -- start the game
"/ctf stop"             -- stop the game
"/ctf home"             -- send player to CTF game world
"/ctf stats"             -- display game stats 

Administrator | OP Commands: 
----------------------------------------------------------------------------------------------
"/ctf create | reset"  -- re-build arena - take a bit longer
"/ctf setsignnew"      -- set sign location for new game 
"/ctf setsignstats"    -- set sign location for view stats
"/ctf setsignblue"     -- set sign location for join blue team
"/ctf setsignred"      -- set sign location for join red team

Sign portal
----------------------------------------------------------------------------------------------
  line-1 ctf 
  line-2 home

  line-1 ctf 
  line-2 joinred
  
  line-1 ctf 
  line-2 joinblue
  
  line-1 ctf 
  line-2 leave


How To Play?
----------------------------------------------------------------------------------------------


SETUP
------------------------------
1. Administrator/Ops can continue use existing arena or reset "/ctf create" if needed     
   Please see note below:    

PLAY | JOINING
------------------------------

2. player go to game board then tap [new game] sign, if busy then please wait. 

3. player select a team to join RED or BLUE sign, tap to join
   note: default maximum 10 players per team, change in config file

4. On joining player 

   4.1 player automatically equip with equal armors, bows, arrows and food
      - Red Team armor is Chainmail 
      - Blue team armor is Iron 
        
        note: both armors have same capabilities

   4.2 player display name tag will show along the team join and player name 
     eg. 
       -  Blue Team | mcpad19
       -  Red Team | crafter99
 
   4.3 player will be transport to selected team flag base. 
       the empty white block, next to yoru team flag is reserved to place enermy flag   
   
   4.4 player scout the area, avoid lava holes and fence is up before game start
    
   4.5 two team border fence get remove when the game start   
 
Alternatives: 
players can also join/leave/start/stop the game using commands. 
recommend way is use signs / color blocks
 
GAME START 
------------------------------
5. When all players on each team join the game, then when agree to start. 
   one player goto border and tap [GREEN] block to start the game
   after game start and fire lift up, GREEN button is gone. 

       [GREEN] block  -- start the game 
       [YELLOW] block -- leave the game 
       [BLUE] block   -- stop the game   

OBJECTIVE
------------------------------
6. Your goal is capture the enermy flag, first break the flag then safely move back to your team base and place next to your team flag.   

7. Your team got one point for each win, there are total of 3 rounds for each game. this can be change in configuration.

8. On end of each round, team member of each team moved back to own base, fence is up and open again in 350 ticks for next round.

9. When all 3 rounds finished, the game stop automatically and players will be teleport out to the game board.

10. game inventory will also remove 

DEATH
------------------------------
When you die,during the play , you can join back to your team. equipments will be added automatically on joining.


INSTALLATION and SETUP OPTIONS
------------------------------
Option #1  (Recommend)
download the demo maps and drop this plugin in server folder. 
you are ready to go. 

Option #2
download this plugin, drop to server folder. 
use admin console issue command /ctf create
Customized, location of signin/exit

Download links

PlugIn: http://www.mediafire.com/download/dx034d039f3r9xg/mcg76_CTF_v1.0.0.phar
World Map:http://www.mediafire.com/download/032vy283xkrtyw7/worlds_CTF.zip


KNOW ISSUES
=====================
1) when player joining from creative mode then switch to survival mode.
   somethings, players don't see each other. 
  
   work-around: disconnect and join back 
   
2) At night it's very dark and glowstone or torch has no light. 
  
   work-around: always carry a torch, place it to the floor to force the server update lightings 
   
3) Wriring on the sign dissapear  
  
   work-around: re-create the sign, still not sure why this is happening on latest pocketmine builds (822)

4) re-buiding arena takes a longer on slower machines


Installation: 
-------------------------
Just drop .phar into PocketMine Server plugin folder 
Restart server

---------------------------------------------------------------------------------------------------
 	  Leather 	Gold 	Chainmail 	Iron 	Diamond
Helmet 	56 	78 	166 	166 	364
Chestplate 	81 	113 	241 	241 	529
Leggings 	76 	106 	226 	226 	496
Boots 	66 	92 	196 	196 	430

-----------------------------------------------------------------------------------------------------
PERMISSIONS

permissions:
  mcg76.ctf:
    description: "Catpure The Flag Mini-game Plugin"
    default: true
    children:
      mcg76.ctf.command:
        description: "Allows use all CTF commands."
        default: true
        children:
          mcg76.ctf.command.home:
            description: "Allow use of [home] command"
            default: true
          mcg76.ctf.command.start:
            description: "Allows use of [start]commands"
            default: true            
          mcg76.ctf.command.stop:
            description: "Allows use of [stop] commands"
            default: true
          mcg76.ctf.command.leave:
            description: "Allows use of [leave] commands" 
            default: true           
          mcg76.ctf.command.create:
            description: "Allows use of [create] commands"            
            default: op            
          mcg76.ctf.command.reset:
            description: "Allows use of [reset] commands"
            default: op                                    
          mcg76.ctf.command.stats:
            description: "Allows use of [stats] commands"                                               
            default: true 
          mcg76.ctf.command.joinblue:
            description: "Allows use of [joinblue] commands."
            default: true
          mcg76.ctf.command.blockon:
            description: "Allows use of [blockon] commands"                                               
            default: true 
          mcg76.ctf.command.blockoff:
            description: "Allows use of [blockoff] commands."
            default: op			
          mcg76.ctf.command.joinred:
            description: "Allows use of [joinred] commands."
            default: op
          mcg76.ctf.command.setblue:
            description: "Allows use of [setsignblue] commands."
            default: op			
          mcg76.ctf.command.setred:
            description: "Allows use of [setsignred] commands."
            default: op          
          mcg76.ctf.command.setnew:
            description: "Allows use of [setsignnew] commands."
            default: op			
          mcg76.ctf.command.setstat:
            description: "Allows use of [setsignstat] commands."
            default: op      


Configuration: (config.xml)
---------------------------------------------------------------------------------------------------
# ---------------------------
# default world lobby location
# ---------------------------
enable_spaw_lobby: "no"
# ---------------------------
lobby_world: "world"
lobby_x: "489"
lobby_y: "5"
lobby_z: "388"
#---------------------------
ctf_game_world: "world"
ctf_game_x: "97"
ctf_game_y: "4"
ctf_game_z: "155"
#---------------------------
# GAME SETTINGS
#---------------------------
maximum_team_players: "10"
maximum_game_rounds: "3"
round_wait_time: "380"
#---------------------------
# Arena Building Location
#--------------------------- 
ctf_arena_name: "world"
ctf_arena_size: "26"
ctf_arena_x: "123"
ctf_arena_y: "4"
ctf_arena_z: "148"
#---------------------------
# waiting room
#--------------------------- 
ctf_waiting_room_x: "148"
ctf_waiting_room_y: "4"
ctf_waiting_room_z: "183"
#---------------------------
# New game sign
#--------------------------- 
ctf_new_sign_x: "149"
ctf_new_sign_y: "5"
ctf_new_sign_z: "180"
#---------------------------
# Game Stats sign
#--------------------------- 
ctf_stat_sign_x: "148"
ctf_stat_sign_y: "5"
ctf_stat_sign_z: "180"
#---------------------------
# Game Start Buttton Location
#---------------------------
ctf_start_button_1_x: "149"
ctf_start_button_1_y: "8"
ctf_start_button_1_z: "160"
#---------------------------
# Game Leave Buttton Location
#---------------------------
ctf_leave_button_1_x: "149"
ctf_leave_button_1_y: "8"
ctf_leave_button_1_z: "158"
#---------------------------
# Game Stop Buttton Location
#---------------------------
ctf_stop_button_1_x: "149"
ctf_stop_button_1_y: "8"
ctf_stop_button_1_z: "156"

#---------------------------
# RED TEAM
#---------------------------
ctf_red_team_flag_x: "173"
ctf_red_team_flag_y: "8"
ctf_red_team_flag_z: "149"
#---------------------------
ctf_red_team_enermy_flag_x: "172"
ctf_red_team_enermy_flag_y: "8"
ctf_red_team_enermy_flag_z: "149"
#---------------------------
ctf_red_team_join_sign1_x: "150"
ctf_red_team_join_sign1_y: "5"
ctf_red_team_join_sign1_z: "181"
#---------------------------
ctf_red_team_spawn_x: "170"
ctf_red_team_spawn_y: "5"
ctf_red_team_spawn_z: "152"

#---------------------------
# BLUE TEAM
#---------------------------
ctf_blue_team_flag_x: "124"
ctf_blue_team_flag_y: "8"
ctf_blue_team_flag_z: "150"
#---------------------------
ctf_blue_team_enermy_flag_x: "124"
ctf_blue_team_enermy_flag_y: "8"
ctf_blue_team_enermy_flag_z: "151"
#---------------------------
ctf_blue_team_join_sign1_x: "147"
ctf_blue_team_join_sign1_y: "5"
ctf_blue_team_join_sign1_z: "181"
#---------------------------
ctf_blue_team_spawn_x: "127"
ctf_blue_team_spawn_y: "6"
ctf_blue_team_spawn_z: "153"
#---------------------------

HAVE FUN!

Bug Report:
Author: MinecraftGenius76 

================================================================================================

Youtube Channel: https://www.youtube.com/user/minecraftgenius76/videos
(Likes and Subscribe for more future videos)

Twitter: https://twitter.com/minecraftgeni76
Facebook: https://www.facebook.com/minecraftgenius76

Planetminecraft: http://www.planetminecraft.com/member/minecraftgenius76/
(Posted Projects)

Thanks
MinecraftGenius76