<?php if (!defined('APPLICATION')) exit();
$this->CheckPermissions();

// Loop through all the groups.
foreach ($this->Items as $Item) {
   // Output the group.
   //echo '<div class="Box Group '.GetValue('class', $Item['Attributes']).'">';
	 echo '<div class="sidebar-nav margint20">';
   

   if (count($Item['Links'])) {
      echo "\n", '<ul class="nav nav-tabs nav-stacked">';
				if ($Item['Text'] != '')
						echo "\n", '<h4>',
						 isset($Item['Url']) ? Anchor($Item['Text'], $Item['Url']) : $Item['Text'],
						 '</h4>';
					
      // Loop through all the links in the group.
      foreach ($Item['Links'] as $Link) {
         //echo "\n  <li".Attribute($Link['Attributes']).">",
				 echo "\n  <li class = 'nav-menu'>",
            Anchor($Link['Text'], $Link['Url']),
            '</li>';
      }

      echo "\n", '</ul>';
   }

   echo "\n", '</div>';
}
