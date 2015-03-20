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

        function test_setId()
        {
            //Arrange
            $id = 23;
            $salon_name = "Great Clips";
            $test_salon = new Salon($id, $salon_name);

            //Act
            $test_salon->setId(25);
            $result = $test_salon->getId();

            //Assert
            $this->assertEquals(25, $result);
        }

        function test_getSalonName()
        {
            //Arrange
            $id = 14;
            $salon_name = "Great Clips";
            $test_salon = new Salon($id, $salon_name);

            //Act
            $result = $test_salon->getSalonName();

            //Assert
            $this->assertEquals("Great Clips", $result);

        }

        function test_setSalonName()
        {
            //Arrange
            $id = 20;
            $salon_name = "Great Clips";
            $test_salon = new Salon($id, $salon_name);

            //Act
            $test_salon->setSalonName("eClips");
            $result = $test_salon->getSalonName();

            //Assert
            $this->assertEquals("eClips", $result);

        }

    }

?>
