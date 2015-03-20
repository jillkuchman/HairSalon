<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $stylist_name = "Great Clips";
            $test_stylist = new Stylist($id, $stylist_name);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            //Arrange
            $id = null;
            $stylist_name = "Great Clips";
            $test_stylist = new Stylist($id, $stylist_name);

            //Act
            $test_stylist->setId(25);
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(25, $result);
        }

        function test_getStylistName()
        {
            //Arrange
            $id = null;
            $stylist_name = "Great Clips";
            $test_stylist = new Stylist($id, $stylist_name);

            //Act
            $result = $test_stylist->getStylistName();

            //Assert
            $this->assertEquals("Great Clips", $result);

        }

        function test_setStylistName()
        {
            //Arrange
            $id = null;
            $stylist_name = "Great Clips";
            $test_stylist = new Stylist($id, $stylist_name);

            //Act
            $test_stylist->setStylistName("eClips");
            $result = $test_stylist->getStylistName();

            //Assert
            $this->assertEquals("eClips", $result);

        }

        function test_save()
        {
            //Arrange
            $id = null;
            $stylist_name = "Aveda";
            $test_stylist = new Stylist($id, $stylist_name);

            //Act
            $test_stylist->save();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $id1 = null;
            $stylist_name1 = "Paul Mitchell";
            $id2 = null;
            $stylist_name2 = "Hair Pun";
            $test_stylist1 = new Stylist($id1, $stylist_name1);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($id2, $stylist_name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist1, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id1 = null;
            $stylist_name1 = "Paul Mitchell";
            $id2 = null;
            $stylist_name2 = "Hair Pun";
            $test_stylist1 = new Stylist($id1, $stylist_name1);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($id2, $stylist_name2);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $id1 = 1;
            $stylist_name1 = "Super Cuts";
            $id2 = 2;
            $stylist_name2 = "Great Clips";
            $test_stylist1 = new Stylist($id1, $stylist_name1);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($id2, $stylist_name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist1->getId());

            //Assert
            $this->assertEquals($test_stylist1, $result);
        }

        function test_updateName()
        {
            //Arrange
            $id = 1;
            $stylist_name = "Hair Saloon";
            $test_stylist = new Stylist($id, $stylist_name);
            $test_stylist->save();
            $new_stylist_name = "Wild Hair";

            //Act
            $test_stylist->updateName($new_stylist_name);
            $result = $test_stylist->getStylistName();

            //Assert
            $this->assertEquals("Wild Hair", $result);
        }

        function test_delete()
        {
            //Arrange
            $id1 = 1;
            $stylist_name1 = "Super Cuts";
            $id2 = 2;
            $stylist_name2 = "Great Clips";
            $test_stylist1 = new Stylist($id1, $stylist_name1);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($id2, $stylist_name2);
            $test_stylist2->save();

            //Act
            $test_stylist1->delete();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist2], $result);
        }

    }

?>
