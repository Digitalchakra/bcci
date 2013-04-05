<?php if (!defined('APPLICATION')) exit();

class BCCI_V2ThemeHooks implements Gdn_IPlugin {
	
   public function Setup() {
		return TRUE;
   }
   public function OnDisable() {
      return TRUE;
   }
	
}