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
            $statement = $GLOBALS['DB']->query("INSERT INTO salons (salon_name) VALUES ('{$this->getSalonName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll()
        {
            $returned_salons = $GLOBALS['DB']->query("SELECT * FROM salons;");
            $salons = array();
            foreach($returned_salons as $salon) {
                $id = $salon['id'];
                $salon_name = $salon['salon_name'];
                $new_salon = new Salon($id, $salon_name);
                array_push($salons, $new_salon);
            }
            return $salons;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM salons *;");
        }

        static function find($search_id)
        {
            
        }

    }

?>
