<?php

use App\Models\ItemConstraint;
use Illuminate\Database\Seeder;

class ItemConstraintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $constraints = [
            new ItemConstraint(
                [
                    'src_id' => 1002,
                    'src_root_id' => 1,
                    'dist_id' => 2003,
                    'dist_root_id' => 2,
                    'error_message' => 'Mouse of HP PC must be HP mouse.'
                ]
            ),
            new ItemConstraint(
                [
                    'src_id' => 1003,
                    'src_root_id' => 1,
                    'dist_id' => 2002,
                    'dist_root_id' => 2,
                    'error_message' => 'Mouse of Dell PC must be Dell mouse.'
                ]
            )
        ];
        foreach ($constraints as $constraint) {
            $constraint->save();
        }
    }
}
