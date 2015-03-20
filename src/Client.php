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
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getSalonId()
        {
            return $this->salon_id;
        }

        function setSalonId($new_salon_id)
        {
            $this->salon_id = (int) $new_salon_id;
        }

    }

?>
