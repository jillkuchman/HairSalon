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
        protected function tearDown()
        {
            Salon::deleteAll();
        }

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
            $id = null;
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
            $id = null;
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
            $id = null;
            $salon_name = "Great Clips";
            $test_salon = new Salon($id, $salon_name);

            //Act
            $test_salon->setSalonName("eClips");
            $result = $test_salon->getSalonName();

            //Assert
            $this->assertEquals("eClips", $result);

        }

        function test_save()
        {
            //Arrange
            $id = null;
            $salon_name = "Aveda";
            $test_salon = new Salon($id, $salon_name);

            //Act
            $test_salon->save();
            $result = Salon::getAll();

            //Assert
            $this->assertEquals($test_salon, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $id1 = null;
            $salon_name1 = "Paul Mitchell";
            $id2 = null;
            $salon_name2 = "Hair Pun";
            $test_salon1 = new Salon($id1, $salon_name1);
            $test_salon1->save();
            $test_salon2 = new Salon($id2, $salon_name2);
            $test_salon2->save();

            //Act
            $result = Salon::getAll();

            //Assert
            $this->assertEquals([$test_salon1, $test_salon2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id1 = null;
            $salon_name1 = "Paul Mitchell";
            $id2 = null;
            $salon_name2 = "Hair Pun";
            $test_salon1 = new Salon($id1, $salon_name1);
            $test_salon1->save();
            $test_salon2 = new Salon($id2, $salon_name2);
            $test_salon2->save();

            //Act
            Salon::deleteAll();
            $result = Salon::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $id1 = 1;
            $salon_name1 = "Super Cuts";
            $id2 = 2;
            $salon_name2 = "Great Clips";
            $test_salon1 = new Salon($id1, $salon_name1);
            $test_salon1->save();
            $test_salon2 = new Salon($id2, $salon_name2);
            $test_salon2->save();

            //Act
            $result = Salon::find($test_salon1->getId());

            //Assert
            $this->assertEquals($test_salon1, $result);
        }

        function test_updateName()
        {
            //Arrange
            $id = 1;
            $salon_name = "Hair Saloon";
            $test_salon = new Salon($id, $salon_name);
            $test_salon->save();
            $new_salon_name = "Wild Hair";

            //Act
            $test_salon->updateName($new_salon_name);
            $result = $test_salon->getSalonName();

            //Assert
            $this->assertEquals("Wild Hair", $result);
        }

    }

?>
