<?php

namespace App\Imports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\ToModel;

class RoomsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Room([
            'room_title' => $row[0],
           'image'    => $row[1], 
           'description' => $row[2],
           'price' => $row[3],
           'wifi' => $row[4],
           'room_type' => $row[5],
           
        ]);
    }
}
