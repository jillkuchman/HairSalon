<?php

    class Salon
    {
        private $id;
        private $salon_name;

        function __construct($id = null, $salon_name)
        {
            if($id !== null) {
                $this->id = $id;
            }
            $this->salon_name = $salon_name;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function getSalonName()
        {
            return $this->salon_name;
        }

        function setSalonName($new_name)
        {
            $this->salon_name = (string) $new_name;
        }

        function save()
        {

        }

        static function getAll()
        {

        }

        static function deleteAll()
        {

        }

    }

?>
