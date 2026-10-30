<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaccination;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Baby Ana Santos',
                'purok'        => 'Purok 2',
                'vaccine'      => 'BCG',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-11-05',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Baby Miguel Garcia',
                'purok'        => 'Purok 4',
                'vaccine'      => 'Pentavalent',
                'dose'         => '2nd dose',
                'scheduled_at' => '2026-10-12',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Baby Sofia Ramos',
                'purok'        => 'Purok 1',
                'vaccine'      => 'OPV',
                'dose'         => '3rd dose',
                'scheduled_at' => '2026-10-18',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Toddler Paolo Flores',
                'purok'        => 'Purok 3',
                'vaccine'      => 'MMR',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-11-20',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Lolo Ben Mendoza',
                'purok'        => 'Purok 5',
                'vaccine'      => 'Anti-Flu',
                'dose'         => 'Annual',
                'scheduled_at' => '2026-10-25',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Baby Carla Bautista',
                'purok'        => 'Purok 2',
                'vaccine'      => 'Hepatitis B',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-05-20',
                'status'       => 'Done',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
