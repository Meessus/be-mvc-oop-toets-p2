<?php 

class Country
{
    private $db;

    public function __construct() 
    {
        $this->db = new Database();
    }

    public function getCountries()
    {
        $this->db->query('SELECT * FROM Country');
        return $this->db->resultSet();
    }

    public function getSingleCountry($id)
    {
        $this->db->query('SELECT * FROM Country WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateCountry($post) 
    {
        $this->db->query('UPDATE Country
                            SET Name = :name,
                                CapitalCity = :capitalcity,
                                Continent = :continent,
                                Population = :population
                            WHERE id = :id');

        $this->db->bind(':name', $post['Name']);
        $this->db->bind(':capitalcity', $post['capitalCity']);
        $this->db->bind(':continent', $post['Continent']);
        $this->db->bind(':population', $post['Population']);
        $this->db->bind(':id', $post['Id']);

        return $this->db->execute();
    }

    public function deleteCountry($id) 
    {
        $this->db->query('DELETE FROM Country WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function createCountry($post) 
    {
        $this->db->query('INSERT INTO Country (Name, CapitalCity, Continent, Population) VALUES (:name, :capitalcity, :continent, :population)');
        $this->db->bind(':name', $post['Name']);
        $this->db->bind(':capitalcity', $post['capitalCity']);
        $this->db->bind(':continent', $post['Continent']);
        $this->db->bind(':population', $post['Population']);
        return $this->db->execute();
    }

}