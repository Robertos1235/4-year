<?php

class Database
{
    private $conn;

    public function __construct($host, $user, $pass, $dbname)
    {

        $this->conn = new mysqli($host, $user, $pass, $dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Chyba připojení k databázi: " . $this->conn->connect_error);
        }

        if (!$this->conn->set_charset("utf8mb4")) {
            throw new Exception("Nepodařilo se nastavit znakovou sadu: " . $this->conn->error);
        }

    }

    public function lastId()
    {
        $id = $this->conn->insert_id;

        if ($id !== false) {

            return $id;

        }

    }

    public function query($query, $params = [])
    {

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Chyba při přípravě dotazu: " . $this->conn->error);
        }

        if (!empty($params)) {

            $types = "";
            $bind_values = [];

            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= "i";
                } elseif (is_float($param)) {
                    $types .= "d";
                } else {
                    $types .= "s";
                }

                $bind_values[] = $param;
            }

            $stmt->bind_param($types, ...$bind_values);

        }
        if (!$stmt->execute()) {
            throw new Exception("Chyba při vykonávání dotazu:" . $stmt->error);
        }

        $result = $stmt->get_result();

        if ($result !== false) {

            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;

        } else {

            $affected = $stmt->affected_rows;
            $stmt->close();
            return $affected;

        }
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}