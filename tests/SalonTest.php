<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Salon.php";
    require_once "src/Client.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class SalonTest extends PHPUnit_Framework_TestCase
    {

        function test_getId()
        {
            //Arrange
            $id = 1;
            $salon_name = "Great Clips";
            $test_salon = new Salon($id, $salon_name);

            //Act
            $result = $test_salon->getId();

            //Assert
            $this->assertEquals(1, $result);
        }
         
    }

?>
