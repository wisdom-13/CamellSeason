<?php include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php" ?>

<?php $num = $_POST["no"]; $name = $_POST["name"]; ?>
<div style="overflow: scroll; max-height: 650px;">
<table>
	<colgroup>
		<col width="80%">
		<col width="20%">
	</colgroup>
	<tr>
		<th colspan="2" style="font-weight: bold;"><?= $name ?></th>
	</tr>
<?php 
	foreach(query("select * from INVENTORY where in_player = '{$_SESSION['no']}' and in_item = $num") as $text){
?>
	<tr>
		<td><div class="td_type" title="<?= $text->in_type ?>"><?= $text->in_type ?></div></td>
		<td><?php $date = explode("-",$text->in_get_date); echo $date[1].".".$date[2] ?></td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
<?php 
	foreach(query("select * from INVENTORY where in_player = '{$_SESSION['no']}' and in_item = $num and in_type_use != ''") as $text){
?>
	<tr>
		<td><div class="td_type"><?= $text->in_type_use ?></div></td>
		<td><?php $date = explode("-",$text->in_use_date); echo $date[1].".".$date[2] ?></td>
	</tr>
<?php } ?>

</table>
</div>