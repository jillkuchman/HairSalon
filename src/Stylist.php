<?php

    class Stylist
    {
        private $id;
        private $stylist_name;

        function __construct($id = null, $stylist_name)
        {
            if($id !== null) {
                $this->id = $id;
            }
            $this->stylist_name = $stylist_name;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function setStylistName($new_name)
        {
            $this->stylist_name = (string) $new_name;
        }

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO stylists (stylist_name) VALUES ('{$this->getStylistName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $stylist_name = $stylist['stylist_name'];
                $new_stylist = new Stylist($id, $stylist_name);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists *;");
        }

        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                $salon_id = $stylist->getId();
                if ($salon_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

        function updateName($new_stylist_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET stylist_name = '{$new_stylist_name}' WHERE id = {$this->getId()};");
            $this->setStylistName($new_stylist_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id={$this->getId()};");
        }

    }

?>
