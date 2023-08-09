<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TesController extends Controller
{
    public function index(){

        $pengetahuans = Pengetahuan::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();
        $labels_pengetahuan = [];
        $data_pengetahuan = [];
        $colors = ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'];
        for($i=1; $i <= 12; $i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;
            foreach($pengetahuans as $pengetahuan){
                if($pengetahuan->month == $i){
                    $count = $pengetahuan->count;
                    break;
                }
            }
            array_push($labels_pengetahuan, $month);
            array_push($data_pengetahuan, $count);
        }
        $datasets_pengetahuan =[
            [
                'label' => 'Chart Data Pengetahuan',
                'data' => $data_pengetahuan,
                'backgroundColor' => $colors
            ]
        ];

        return view('tes', compact('datasets_pengetahuan', 'labels_pengetahuan'));
    }
}
