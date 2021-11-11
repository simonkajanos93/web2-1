<?php

class Inventory
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getComputers()
    {
        $this->db->query('SELECT * FROM gep');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getSoftwareList()
    {
        $this->db->query('SELECT * FROM szoftver');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getSoftwareInstalls($gepId) {
        $this->db->query('SELECT gepid, szoftverid, verzio, datum, nev, kategoria, hely, tipus, ipcim 
                                FROM telepites 
                                INNER JOIN szoftver ON telepites.szoftverid = szoftver.id 
                                INNER JOIN gep ON gep.id = telepites.gepid
                                WHERE gep.id = :gepId
                                LIMIT 200');
        $this->db->bind(':gepId', $gepId ?: 0);
        $results = $this->db->resultSet();
        return $results;
    }

}