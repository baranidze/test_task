<?php
	//Getting countries from DB
	$db = Db::getConnection();
	$countriesList = array();
	$result = $db->query('SELECT * FROM country');
	$i = 0;
		while($row = $result->fetch()){
			$countriesList[$i]['name'] = $row['name'];
			$countriesList[$i]['id'] = $row['id'];
			$i++;
		}
?>

<select name = "country">
	<option><?php echo $selectedCountry; ?></option>
		<?php foreach ($countriesList as $country): ?>
			<?php if($selectedCountry == $country['name']) continue;?>
				<option><?php echo $country['name'];?></option>
		<?php endforeach;?>
</select>