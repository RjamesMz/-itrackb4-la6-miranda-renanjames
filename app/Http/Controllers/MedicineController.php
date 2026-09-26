<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
     private function medicines() 
    {
        return [
        1 => ['id' => 1, 'name' => 'Paracetamol', 'stock' => 'Full', 'expiry_date' => '2027-03-15', 'type' => 'Tablet', 'is_available' => true],
        2 => ['id' => 2, 'name' => 'Amoxicillin', 'stock' => 'Full', 'expiry_date' => '2026-11-20', 'type' => 'Capsule', 'is_available' => true],
        3 => ['id' => 3, 'name' => 'Losartan', 'stock' => 'Lowstock', 'expiry_date' => '2026-12-25', 'type' => 'Tablet', 'is_available' => true],
        4 => ['id' => 4, 'name' => 'Cetirizine', 'stock' => 'Lowstock', 'expiry_date' => '2026-09-30', 'type' => 'Tablet', 'is_available' => true],
        5 => ['id' => 5, 'name' => 'Losartan', 'stock' => 'Full', 'expiry_date' => '2027-01-10', 'type' => 'Tablet', 'is_available' => true],
        6 => ['id' => 6, 'name' => 'Ibuprofen', 'stock' => 'Full', 'expiry_date' => '2027-02-28', 'type' => 'Tablet', 'is_available' => true],
        7 => ['id' => 7, 'name' => 'Amlodipine', 'stock' => 'Full', 'expiry_date' => '2027-05-10', 'type' => 'Tablet', 'is_available' => true],
        8 => ['id' => 8, 'name' => 'Omeprazole', 'stock' => 'Lowstock', 'expiry_date' => '2026-10-15', 'type' => 'Capsule', 'is_available' => false],
        9 => ['id' => 9, 'name' => 'Metformin', 'stock' => 'Full', 'expiry_date' => '2027-04-20', 'type' => 'Tablet', 'is_available' => true],
        10 => ['id' => 10, 'name' => 'Salbutamol', 'stock' => 'Full', 'expiry_date' => '2027-06-30', 'type' => 'Syrup', 'is_available' => true],

        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->query('type', 'all');
        $stock = $request->query('stock', 'all');

        $all = $this->medicines();

        if($type === 'all' && $stock === 'all'){

            $medicines = $all;

        } else {
            $medicines = [];

            foreach($all as $id => $medicine){

                if (($type === 'all' || $medicine['type'] == $type)
                    && ($stock === 'all' || $medicine['stock'] == $stock)) {
                    $medicines[$id] = $medicine;
                }
            }

        }
       
    
         return view('medicines.index',
         ['medicines' => $medicines,
          'type' => $type, 'stock' => $stock]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id = 5)
    {

        $medicines = $this->medicines();
        
            if(!isset($medicines[$id]))
            {

                abort(404);
            }

            return view('medicines.show', ['medicine' => $medicines[$id]]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter($type = null)
    {

        $medicines = $this->medicines();
        $result = [];

       foreach ($medicines as $medicine) {
                if ($type == null) {
                    $result[] = $medicine;
                } elseif ($medicine['type'] == $type) {
                    $result[] = $medicine;
                }
            }

            return view('medicines.filter', [
                'medicines' => $result,
                'filter' => $type,
            ]);

    }

    
}


