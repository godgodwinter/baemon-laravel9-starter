<?php

namespace App\Exports;

use App\Helpers\Fungsi;
use App\Models\kelas;
use App\Models\minatbakat;
use App\Models\minatbakatdetail;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class exportusers implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // protected $id;

    // function __construct($id,) {
    //        $this->id = $id;
    // }

    public function headings(): array
    {

        $arr=['No','Nama','Username'];
        return $arr;
    }
    public function collection()
    {
        $datas=DB::table('users')->get();

        $dataakhir = collect();

        $dataakhir_array = $dataakhir->toArray();

        $master=User::orderBy('id','asc')
        ->get();

            $collectionpenilaian = new Collection();
        $nomer=1;
        foreach($datas as $d){
            $arr=[];
            // $nomer++;
            // dd($datas);
            array_push($arr,
                $nomer
            );
            $nomer++;

            array_push($arr,
                $d->name
            );
            array_push($arr,
                $d->username
            );

            $collectionpenilaian->push((object)$arr);


            }

            // dd('testing',$collectionpenilaian);

        return $collectionpenilaian;
        }
}
