<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Salon.php";
    require_once "src/Client.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $id = null;

            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_name = "Bugs Bunny";
            $salon_id = $test_salon->getId();
            $test_client = new Client($id, $client_name, $salon_id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
    }

?>
