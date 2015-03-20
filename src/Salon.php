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

    }

?>
