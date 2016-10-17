
<?php

include 'connect.php';

$sql = $db->query("SELECT * FROM items") or trigger_error($db->error."[$sql]");
  
while($rs = $sql->fetch_array(MYSQLI_ASSOC)){ 
?>

      <li class='item-list' id='<?php echo "$rs[item]"?>'>  
        <p class="item-name" ><?php echo "$rs[item]"?></p>
        <ul class='item-ul-info'>      
          <li class='item-image'><image width="100%" src="<?php echo $rs['image']; ?>"  /></li>   
          <li class='item-info'><?php echo "$rs[info]"; ?></li>   
          <li class='item-price item-fee price'><?php echo "$rs[fee]"; ?></li>   
          <li class='item-ID'><?php echo "$rs[itemID]"; ?></li>   
          <li class='item-count'>ordered: ></li>   
        </ul>   
      </li>

<?php }

$db = null;

?>
       


