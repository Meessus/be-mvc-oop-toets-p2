<?php 
    
class Countries extends Controller
{
    private $countryModel;
    
    public function __construct() 
    {
        $this->countryModel = $this->model('Country');
    }

    public function index($land = null, $age = null) 
    {
        $records = $this->countryModel->getCountries();

        $rows = '';
        foreach($records as $value) {
            $rows .= "<tr>
                        <td>$value->Name</td>
                        <td>$value->CapitalCity</td>
                        <td>$value->Continent</td>
                        <td>$value->Population</td>
                        <td><a href='" .URLROOT . "/countries/update/$value->id'>Update</a></td>
                        <td><a href='" .URLROOT . "/countries/delete/$value->id'>Delete</a></td>
                    </tr>";
        }
        
        $data = [
            'title' => 'Landen van de wereld',
            'rows' => $rows
        ];

        $this->view('countries/index', $data);
    }

    public function update($id = null)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->countryModel->updateCountry($_POST);
            header('Location: ' . URLROOT . '/countries');
        } else {
            if (!$id) {
                header('Location: ' . URLROOT . '/countries');
            }
            $row = $this->countryModel->getSingleCountry($id);
            $data = [
                'title' => 'Update land',
                'row' => $row
            ];
            $this->view("countries/update", $data);
        }   
    }

    public function delete($id = null)
    {
        if (!$id) {
            header('Location: ' . URLROOT . '/countries');
        }

        $this->countryModel->deleteCountry($id);

        $data = [
            'title' => 'Het record met id ' . $id .  ' is verwijderd',
        ];

        $this->view('countries/delete', $data);

        header("Refresh: 2; url=" . URLROOT . "/countries");
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->countryModel->createCountry($_POST);
            header('Location: ' . URLROOT . '/countries');
        } else {
            $data = [
                'title' => 'Voeg een land toe',
            ];
            $this->view('countries/create', $data);
        }
    }
}
