<?php if (!defined('APPLICATION')) exit();
$User = GetValue('User', $this->_Sender);
if ($User):
   echo '<div class="well">';
      echo UserPhoto($User);
      echo '<div class="WhoIs" style="float:right">';
         echo "<strong class='red'>".UserAnchor($User, 'Username')."</strong>";
         echo '<div class="Email">';

         // Only show the email address if allowed.
         if (GetValue('UserID', $User) == Gdn::Session()->UserID || Gdn::Session()->CheckPermission('Garden.Moderation.Manage'))
            echo "<span class='grey'>".GetValue('Email', $User, '')."</span>";
         else
            echo '&nbsp;';

         echo '</div>';
      echo '</div>';
   echo '</div>';
endif;