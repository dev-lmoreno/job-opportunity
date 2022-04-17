<?php

namespace App\Entity;

use App\Database\Database;
use \PDO;

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

    public function update()
    {
        return (new Database('opportunities'))
            ->update('id = ' . $this->id, [
                'title'       => $this->title,
                'description' => $this->description,
                'active'      => $this->active,
                'date'        => $this->date
            ]);
    }

    public function delete()
    {
        return (new Database('opportunities'))
            ->delete('id = ' . $this->id);
    }

    public static function getOpportunities($where = null, $order = null, $limit = null)
    {
        return (new Database('opportunities'))
            ->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getOpportunity($id)
    {
        return (new Database('opportunities'))
            ->select('id = ' . $id)
            ->fetchObject(self::class);
    }
}