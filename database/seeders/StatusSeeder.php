<?php

namespace Database\Seeders;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = [
            [
               'name'=>'Open',
               
            ],
            [
               'name'=>'Processing',
             
            ],
            [
               'name'=>'Pending from Client',
        
            ],
            [
               'name'=>'Closed',
             
            ],
            [
               'name'=>'Rejected',
             
            ],
            [
                'name'=>'N/A',
          
            ],
        ];
  
        foreach ($status as $key => $value) {
            Status::create($value);
        }
    }
}
