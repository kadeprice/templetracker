<?php

namespace App\Http\Controllers;

use App\TempleCount;

class HomeController extends Controller {

    public $total;
    public $elders;
    public $highPriests;
    public $reliefSociety;
    public $primary;
    public $youngMens;
    public $youngWomens;
    public $male;
    public $female;
    /**
     * @var TempleCount
     */
    private $templeCount;

    /**
     * Create a new controller instance.
     *
     * @param TempleCount $templeCount
     */
    public function __construct(TempleCount $templeCount) {
        $this->middleware('auth')->except(['welcome']);
        $this->templeCount = $templeCount;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('home');
    }

    public function welcome() {
        $this->total = $this->templeCount->all()->sum('count');
        $this->elders = $this->templeCount->where('auxiliary_id', 1)->sum('count');
        $this->highPriests = $this->templeCount->where('auxiliary_id', 2)->sum('count');
        $this->reliefSociety = $this->templeCount->where('auxiliary_id', 3)->sum('count');
        $this->primary = $this->templeCount->where('auxiliary_id', 4)->sum('count');
        $this->youngMens = $this->templeCount->where('auxiliary_id', 5)->sum('count');
        $this->youngWomens = $this->templeCount->where('auxiliary_id', 6)->sum('count');
        $this->male = $this->templeCount->whereSex(1)->sum('count');
        $this->female = $this->templeCount->whereSex(2)->sum('count');

        $this->makeCharts();

        $data = [
            'total'         => $this->total,
            'elders'        => $this->elders,
            'highPriests'   => $this->highPriests,
            'reliefSociety' => $this->reliefSociety,
            'primary'       => $this->primary,
            'youngMens'     => $this->youngMens,
            'youngWomens'   => $this->youngWomens
        ];

        return view('welcome', $data);
    }

    public function makeCharts() {
        $totalCart = \Lava::DataTable();
        $totalCart->addStringColumn('Type')
            ->addNumberColumn('Value')
            ->addRow(['Total', $this->total]);

        \Lava::GaugeChart('Total', $totalCart, [
            'min'        => 0,
            'max'        => 1000,
            'height'     => 300,
            'greenFrom'  => 0,
            'greenTo'    => 599,
            'yellowFrom' => 600,
            'yellowTo'   => 799,
            'redFrom'    => 800,
            'redTo'      => 1000,
            'majorTicks' => [
                'Start',
                'Finish'
            ]
        ]);

        $reliefChart = \Lava::DataTable();
        $reliefChart->addStringColumn('Type')
            ->addNumberColumn('Value')
            ->addRow(['Relief Society', $this->reliefSociety])
            ->addRow(['High Priests', $this->highPriests]);

        \Lava::GaugeChart('Relief', $reliefChart, [
            'min'        => 0,
            'max'        => 300,
            'greenFrom'  => 0,
            'greenTo'    => 199,
            'yellowFrom' => 200,
            'yellowTo'   => 274,
            'redFrom'    => 275,
            'redTo'      => 300,
            'majorTicks' => [
                '0',
                '300'
            ]
        ]);

        $eldersChart = \Lava::DataTable();
        $eldersChart->addStringColumn('Type')
            ->addNumberColumn('Value')
            ->addRow(['Elders', $this->elders])
            ->addRow(['Primary', $this->primary]);

        \Lava::GaugeChart('Elders', $eldersChart, [
            'min'        => 0,
            'max'        => 100,
            'greenFrom'  => 0,
            'greenTo'    => 69,
            'yellowFrom' => 70,
            'yellowTo'   => 89,
            'redFrom'    => 90,
            'redTo'      => 100,
            'majorTicks' => [
                '0',
                '100'
            ]
        ]);

        $youthChart = \Lava::DataTable();
        $youthChart->addStringColumn('Type')
            ->addNumberColumn('Value')
            ->addRow(['Youth', $this->youngWomens + $this->youngMens]);

        \Lava::GaugeChart('Youth', $youthChart, [
            'min'        => 0,
            'max'        => 200,
            'greenFrom'  => 0,
            'greenTo'    => 149,
            'yellowFrom' => 150,
            'yellowTo'   => 169,
            'redFrom'    => 170,
            'redTo'      => 200,
            'majorTicks' => [
                '0',
                '200'
            ]
        ]);

        $sexChart = \Lava::DataTable();
        $sexChart->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['Male', (int) $this->male])
            ->addRow(['Female', (int) $this->female]);

        \Lava::PieChart('Sex', $sexChart, [
            'title'             => 'Male and Female Cards',
            'pieSliceTextStyle' => '{color: black}',
        ]);
    }
}
