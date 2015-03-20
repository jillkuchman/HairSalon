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

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO clients (client_name, salon_id) VALUES ('{$this->getClientName()}', '{$this->getSalonId()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $id = $client['id'];
                $client_name = $client['client_name'];
                $salon_id = $client['salon_id'];
                $new_client = new Client($id, $client_name, $salon_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients *;");
        }

    }

?>
