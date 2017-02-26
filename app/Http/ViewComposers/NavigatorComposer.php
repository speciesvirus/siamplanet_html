<?php

namespace App\Http\ViewComposers;

use App\Models\Geography;
use App\Models\Product\Product;
use App\Models\Product\ProductType;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class NavigatorComposer
{
    /**
     * Create a new profile composer.
     *
     * @param  void  $users
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $geo = DB::select("CALL `select_product_by_geo`(@p0, @p1);");
        $result = DB::select('SELECT @p0 AS `resultCode`, @p1 AS `resultMsg`;');

        if($result[0]->resultCode !== '0')
            Log::error('select_product_by_geo -> Code : ' . $result[0]->resultCode . ', Message : ' . $result[0]->resultMsg);

        $productType = ProductType::where('active', 'A')->orderBy('sort', 'asc')->get();
        $geography = Geography::all();
        $province = Province::all();


        $m_type = [];
        $m_geo = [];
        $m_pro = [];
        foreach ($productType as $t){
            $m_geo = [];
            foreach ($geography as $key_g => $g){
                $m_prov = [];
                foreach ($province as $p){
                    if($p->geo_id == $g->id){
                        foreach ($geo as $r){
                            if($r->type_id == $t->id && $r->geo_id == $g->id && $r->provine_id == $p->id){
                                array_push($m_prov, ['name' => $r->provine_name, 'count' => $r->count]);
                            }
                        }
                    }
                }
                array_push($m_geo, ['id' => $g->id, 'name' => $g->name, 'arr' => $m_prov]);
            }
            array_push($m_type, ['id' => $t->id, 'name' => $t->type, 'arr' => $m_geo]);
        }

//        foreach ($geo as $v){
//            foreach ($m_type as $t){
//                if($v->type_id == $t->id){
//                    foreach ($m_geo as $g){
//                        if($v->geo_id == $g->id){
//                            foreach ($m_prov as $p){
//                                if($v->provine_id == $p->id){
//                                    //array_push($m_prov, [ 'id' => $p->id, 'name' => $p->provine_name]);
//                                }
//                            }
//                        }
//                    }
//                }
//            }
//        }

        $view->with('geo', $m_type);

    }
}