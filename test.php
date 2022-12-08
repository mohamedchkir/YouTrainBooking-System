<?php



include_once("include/autoloader.php");


?>
<select name="" id="">
    <?php
    $cityCtr = new CityController();
    $cities = $cityCtr->getCities();
    foreach ($cities as $city) {
        echo "<option value='" . $city['id'] . "'>" . $city['ville'] . "</option>";
    }
    ?>
</select>