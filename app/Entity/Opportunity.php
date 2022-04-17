<?php

namespace App\Entity;

use App\Database\Database;

class Opportunity {
    public $id;
    public $title;
    public $description;
    public $active;
    public $date;

    public function register()
    {
        // DEFINIR A DATA
        $this->date = date('Y-m-d H:i:s');
        // INSERIR A DATA NO BD
        $database = new Database('opportunities');

        $this->id = $database->insert([
                                'title'       => $this->title,
                                'description' => $this->description,
                                'active'      => $this->active,
                                'date'        => $this->date
                            ]);

        return true;
    }

    public static function getOpportunities($where = null, $order = null, $limit = null)
    {
        
    }
}