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

            $client_id = 6;
            $client_name = "Bugs Bunny";
            $salon_id = $test_salon->getId();
            $test_client = new Client($client_id, $client_name, $salon_id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(6, $result);
        }

        function test_setId()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_id = 9;
            $client_name = "Tom Cruise";
            $salon_id = $test_salon->getId();
            $test_client = new Client($client_id, $client_name, $salon_id);

            //Act
            $test_client->setId(10);
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(10, $result);
        }

        function test_getClientName()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_id = 14;
            $client_name = "Will Ferrell";
            $salon_id = $test_salon->getId();
            $test_client = new Client($client_id, $client_name, $salon_id);

            //Act
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals("Will Ferrell", $result);
        }

        function test_setClientName()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_id = 18;
            $client_name = "Amy Pohler";
            $salon_id = $test_salon->getId();
            $test_client = new Client($client_id, $client_name, $salon_id);

            //Act
            $test_client->setClientName("Tina Fey");
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals("Tina Fey", $result);
        }

        function test_getSalonId()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_id = 14;
            $client_name = "Jimmy Fallon";
            $salon_id = $test_salon->getId();
            $test_client = new Client($client_id, $client_name, $salon_id);

            //Act
            $result = $test_client->getSalonId();

            //Assert
            $this->assertEquals($salon_id, $result);
        }
    }

?>
