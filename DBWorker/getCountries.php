<?php
	
	include_once "getMethods.php";
	
	$countriesList = getCountries();
	
?>

<select name = "country">
	<option><?php echo $selectedCountry; ?></option>
		<?php foreach ($countriesList as $country): ?>
			<?php if($selectedCountry == $country['name']) continue;?>
				<option><?php echo $country['name'];?></option>
		<?php endforeach;?>
</select>