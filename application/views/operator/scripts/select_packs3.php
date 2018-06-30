<div class="setting-panel">
		    
		   	
            <ul class="right-sidebar nicescroll-bar pa-0">
            <ul>
            <li class="layout-switcher-wrap"><h4>Select Pack</h4></li>
            <?php
            foreach($data as $item):
            
            echo '<li style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['MRP'].'</li>';
            endforeach;
            echo '</ul>';
           echo  '<h4>Select ALA Channels</h4>';
           echo '<ul>';
           foreach($ala as $item):
            
            echo '<li class ="ala_show" style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['RATE'].'</li>';
            endforeach;
            echo '</ul>';
            echo '</ul>';
            ?>
            
            
 </div>