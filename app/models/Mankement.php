<?php

class Mankement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMankement()
    { {
            $this->db->query(
                "
                SELECT 
                    instructeur.Naam,
                    instructeur.Email,
                    Auto.Kenteken,
                    Auto.Type,
                    Auto.id,
                    Mankement.Datum,
                    Mankement.Mankement
                FROM 
                    instructeur
                LEFT JOIN
                    Auto
                ON
                    instructeur.Id = Auto.InstructeurId
                LEFT JOIN
                    Mankement
                ON
                    Mankement.AutoId = Auto.Id 
                WHERE
                    instructeur.id = '2'
                ORDER BY
                    Mankement.Datum DESC"
            );
            return $this->db->resultSet();
        }
    }

    public function getMankementById($id)
    {
        $this->db->query(
            "
            SELECT
                Auto.id AS AutoId,
                Auto.Kenteken,
                Auto.Type
            FROM 
                Auto
            LEFT JOIN
                Mankement
            ON
                Mankement.AutoId = Auto.Id 
            WHERE
                Auto.id = :id"
        );
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function addMankement($post)
    {
        $this->db->query(
            "
            INSERT INTO 
                Mankement (AutoId, Datum, Mankement)
            VALUES
                (:AutoId, :Datum, :Mankement)"
        );
        $this->db->bind(':AutoId', $post['carId']);
        $this->db->bind(':Datum', date('Y-m-d'));
        $this->db->bind(':Mankement', $post['mankement']);
        $this->db->execute();
    }
}
