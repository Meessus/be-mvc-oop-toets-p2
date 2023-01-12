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
                    cars.Kenteken,
                    cars.Type,
                    cars.id,
                    Mankement.Datum,
                    Mankement.Mankement
                FROM 
                    instructeur
                LEFT JOIN
                    cars
                ON
                    instructeur.Id = cars.InstructeurId
                LEFT JOIN
                    Mankement
                ON
                    Mankement.AutoId = cars.Id 
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
                cars.id AS AutoId,
                cars.Kenteken,
                cars.Type
            FROM 
                cars
            LEFT JOIN
                Mankement
            ON
                Mankement.AutoId = cars.Id 
            WHERE
                Cars.id = :id"
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
