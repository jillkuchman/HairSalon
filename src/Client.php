<?php

    class Client
    {
        private $id;
        private $name;

        function __construct ($id = null, $name)
        {
            if($id !== null) {
                $this->id = $id;
            }
            $this->name = $name;
        }

    }

?>
