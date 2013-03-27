<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
if (Gdn::Config('Garden.Profile.ShowAbout')) {
   require_once Gdn::Controller()->FetchViewLocation('helper_functions', 'Profile', 'Dashboard');
   
?>
<div class="About P">
   <h2 class="H"><?php echo T('About'); ?></h2>
   <div class="About well">
   <!--Custom Design-->
   <div class="row-fluid">
   		<?php
      if ($this->User->Banned) {
         echo '<dd class="Value"><span class="Tag Tag-Banned">'.T('Banned').'</span></dd>';
      }
      ?>
      
      <!--Column one-->
      <div class="span6">
      	<h4 class="grey"><?php echo T('Username: '); ?><span class="red"><?php echo $this->User->Name; ?></span></h4>
        
        <h5 class="grey"><?php               
      if ($this->User->Email && ($this->User->ShowEmail || $Session->CheckPermission('Garden.Moderation.Manage'))) {
         echo T('Email: ').'
         <span class="red" itemprop="email">'.Gdn_Format::Email($this->User->Email).'</span>';
      }
      ?></h5>
      
      <h5 class="grey">
      	<?php if ($Loc = GetValue('Location', $this->User)): ?>
        <?php echo T('Location: '); ?>
        <span class="red"><?php echo htmlspecialchars($Loc); ?></span>
        <?php endif; ?>
        </h5>
        
        <?php 
      
     /* if ($Session->CheckPermission('Garden.Moderation.Manage')): ?>
      <dt class="IP"><?php echo T('Register IP'); ?></dt>
      <dd class="IP"><?php 
         $IP = IPAnchor($this->User->InsertIPAddress);
         echo $IP ? $IP : T('n/a');
      ?></dd>
      <dt class="IP"><?php echo T('Last IP'); ?></dt>
      <dd class="IP"><?php
         $IP = IPAnchor($this->User->LastIPAddress);
         echo $IP ? $IP : T('n/a');
      ?></dd>
      <?php
      endif;
*/
			
      if ($this->User->InviteUserID > 0) {
         $Inviter = Gdn::UserModel()->GetID($this->User->InviteUserID);
         if ($Inviter) {
            echo '<h6 class="grey">'.T('Invited by: ').'<span class="red">'.UserAnchor($Inviter).'</span></h6>';
         }
      }
      $this->FireEvent('OnBasicInfo');
      ?>
        
      </div>
      
      <!--Column Two-->
      <div class="span6">
       <div class="well">
        
        <h5 class="grey"><?php echo T('Joined: '); ?><span class="red"><?php echo Gdn_Format::Date($this->User->DateFirstVisit, 'html'); ?></span></h5>
        <h5 class="grey"><?php echo T('Visits: '); ?><span class="red"><?php echo number_format($this->User->CountVisits); ?></span></h5>
        <h6 class="grey"><?php echo T('Last Active: '); ?><span class="red"><?php echo Gdn_Format::Date($this->User->DateLastActive, 'html'); ?></span></h6>
        
        <?php if ($Points = GetValueR('User.Points', $this, 0)) : ?>
        <h6 class="grey"><?php echo T('Points: '); ?><span class="red"><?php echo number_format($Points); ?></span></h6>
        <?php endif; ?>
				
        <h6 class="grey"><?php echo T('Roles: '); ?><span class="red">
						<?php 
							 if (Gdn::Session()->CheckPermission('Garden.Moderation.Manage')) {
									echo UserVerified($this->User).', ';
							 }
							 
							 if (empty($this->Roles))
									echo T('No Roles');
							 else
									echo htmlspecialchars(implode(', ', ConsolidateArrayValuesByKey($this->Roles, 'Name'))); 
						
						?>
          </span></h6>
    	</div>
     </div> 
   </div>
   
   <!--End of custom design-->
     
      
   </div>
</div>
<?php
}