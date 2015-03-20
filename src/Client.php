<?php

    class Client
    {
        private $id;
        private $client_name;
        private $salon_id;

        function __construct ($id = null, $client_name, $salon_id)
        {
            if($id !== null) {
                $this->id = $id;
            }
            $this->client_name = $client_name;
            $this->salon_id = $salon_id;
        }

        function getId()
        {
        
        }

    }

?>
