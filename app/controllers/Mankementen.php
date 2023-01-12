<?php

class Mankementen extends Controller
{

    private $mankementmodel;

    public function __construct()
    {
        $this->mankementmodel = $this->model('Mankement');
    }

    public function index()
    {
        $records = $this->mankementmodel->getAllMankement();

        $rows = '';

        foreach ($records as $value) {
            $rows .= "<tr>
                        <td>$value->Datum</td>
                        <td>$value->Mankement</td>
                    </tr>";
        }
        $data = [
            'title' => 'Overzicht Mankementen',
            'Naam' => $records[0]->Naam,
            'Type' => $records[0]->Type,
            'Email' => $records[0]->Email,
            'Kenteken' => $records[0]->Kenteken,
            'carId' => $records[0]->id,
            'rows' => $rows
        ];
        $this->view('mankement/index', $data);
    }

    public function invoegen($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump(strlen($_POST['mankement']));
            if (strlen($_POST['mankement']) > 50) {
                echo '<script>
                      alert("Het nieuwe mankement is meer dan 50 tekens lang en is niet toegevoegd, probeer het opnieuw.");
                      window.location.href="' . URLROOT . '/Mankementen/invoegen/' . $id . '";
                      </script>';
            } else {
                $this->mankementmodel->addMankement($_POST);
                echo '<script>
                      alert("Het nieuwe mankement is toegevoegd.");
                      window.location.href="' . URLROOT . '/Mankementen";
                      </script>';
            }
        } else {
            $records = $this->mankementmodel->getMankementById($id);

            $data = [
                'title' => 'Invoeren mankement',
                'Type' => $records[0]->Type,
                'Kenteken' => $records[0]->Kenteken,
                'id' => $records[0]->AutoId
            ];

            $this->view('mankement/invoegen', $data);
        }
    }
}
