<?php

    class Client
    {
        private $id;
        private $name;
        private $salon_id;

        function __construct ($id = null, $name, $salon_id)
        {
            if($id !== null) {
                $this->id = $id;
            }
            $this->name = $name;
            $this->salon_id = $salon_id;
        }

    }

?>
