<?php
define("_TEMPLATES_WIDTH_CONFIG","1000");

function LoadBlock($pblock=""){
	global $db ;
	$widthLR=220;
	$widthL=5;
	$widthR=4;
	$widthSUM=$widthLR-($widthL+$widthR);

	$widthCU=530;
	$widthCL=5;
	$widthCR=4;
	$widthSUMC=$widthCU-($widthCL+$widthCR);
	//Check Level
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['blocksx'] = $db->select_query("SELECT * FROM ".TB_BLOCK." WHERE status='1' and pblock='$pblock' order by sort");

	while($arr['blocksx'] = $db->fetch($res['blocksx'])){
	$sfile=$arr['blocksx']['sfile'];
	$filename=$arr['blocksx']['filename'];

	$code=$arr['blocksx']['code'];
	if ($pblock=='left' || $pblock=='right'){

	?>
	<center><table id="Table_01" width="<?=$widthLR;?>" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3" class="titleleft" background="templates/<?echo WEB_TEMPLATES;?>/images/menu/ici_01.png" width="<?=$widthLR;?>" height="44" alt=""><?echo $arr['blocksx']['blockname'];?></td>
	</tr>
	<tr>
		<td background="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_02.png" width="5" height="100%" alt=""></td>
		<td >
	<?php
	if($code==''){
	include ("modules/block/".$filename.".".$sfile."");
	}else{
	echo $code;
	}
	?>
			</td>
		<td background="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_03.png" width="4" height="100%" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_04.png" width="5" height="15" alt=""></td>
		<td >
			<img src="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_05.png" width="211" height="15" alt=""></td>
		<td>
			<img src="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_06.png" width="4" height="15" alt=""></td>
	</tr>
</table>
	<?
	} else if ($pblock=='center' || $pblock=='user1' ){

	?>
	<center><table id="Table_01" width="<?=$widthCU;?>" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3" class="titlecenter" background="templates/<?echo WEB_TEMPLATES;?>/images/menu/center.png" width="<?=$widthCU;?>" height="39" alt=""><?echo $arr['blocksx']['blockname'];?></td>
	</tr>
	<tr>
		<td background="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_02.png" width="<?=$widthCL;?>" height="100%" alt=""></td>
		<td width="<?=$widthSUMC;?>">
	<?php
	if($code==''){
	include ("modules/block/".$filename.".".$sfile."");
	}else{
	echo $code;
	}
	?>
			</td>
		<td background="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_03.png" width="<?=$widthCR;?>" height="100%" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_04.png" width="5" height="15" alt=""></td>
		<td >
			<img src="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_05.png" width="100%" height="15" alt=""></td>
		<td>
			<img src="templates/<?echo WEB_TEMPLATES;?>/images/menu/ict_06.png" width="4" height="15" alt=""></td>
	</tr>
</table>
	<?php
	} else {
	if($code==''){
	include ("modules/block/".$filename.".".$sfile."");
	}else{
	echo $code;
	}

	}

	}
}