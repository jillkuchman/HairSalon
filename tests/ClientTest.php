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
        protected function tearDown()
        {
            Client::deleteAll();
            Salon::deleteAll();
        }

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

        function test_setSalonId()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_id = 14;
            $client_name = "Jon Stewart";
            $salon_id = $test_salon->getId();
            $test_client = new Client($client_id, $client_name, $salon_id);

            //Act
            $test_client->setSalonId(90);
            $result = $test_client->getSalonId();

            //Assert
            $this->assertEquals(90, $result);
        }

        function test_save()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_name = "George Washington";
            $salon_id = $test_salon->getId();
            $test_client = new Client($id, $client_name, $salon_id);

            //Act
            $test_client->save();
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_name1 = "George Washington";
            $salon_id = $test_salon->getId();
            $test_client1 = new Client($id, $client_name1, $salon_id);
            $test_client1->save();

            $client_name2 = "Benjamin Franklin";
            $test_client2 = new Client($id, $client_name2, $salon_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();

            $client_name1 = "George Washington";
            $salon_id = $test_salon->getId();
            $test_client1 = new Client($id, $client_name1, $salon_id);
            $test_client1->save();

            $client_name2 = "Benjamin Franklin";
            $test_client2 = new Client($id, $client_name2, $salon_id);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }
    }

?>
