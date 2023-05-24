<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos;
use App\Models\Persona;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $identificacion_user_login = \Illuminate\Support\Facades\Auth::user()->identificacion;

        $id_persona_conductor = Persona::select('id')->where('identificacion', $identificacion_user_login)->get();

        
        $vencimientos = [];

        if (sizeof($id_persona_conductor) != '') {
            
            $id_persona_conductor = $id_persona_conductor[0]['id'];

            $num_interno = Vehiculos::select('num_interno')->where('id_conductor', $id_persona_conductor)->get();

            $num_interno = $num_interno[0]['num_interno'];

            $vencimientos = array();
            $venc_docts = Vehiculos::select('fec_venc_SOAT', 'fec_venc_RTM', 'fec_venc_TOP', 'id_conductor', 'fec_venc_mto')->where('num_interno', $num_interno)->get();

            foreach ($venc_docts as $key => $value) {
                $fec_venc_SOAT = $value['fec_venc_SOAT'];
                $fec_venc_RTM  = $value['fec_venc_RTM'];
                $fec_venc_TOP  = $value['fec_venc_TOP'];
                $id_conductor  = $value['id_conductor'];
                $fec_venc_mto  = $value['fec_venc_mto'];
            }

            $ven_lic_cond = Persona::select('fec_venc_licencia')->where('id', $id_conductor)->get();

            foreach ($ven_lic_cond as $key => $value) {
                $fec_venc_licencia = $value['fec_venc_licencia'];
            }

            $vencimientos = array('fec_venc_SOAT'=>$fec_venc_SOAT, 'fec_venc_RTM'=> $fec_venc_RTM, 'fec_venc_TOP'=> $fec_venc_TOP, 'fec_venc_licencia'=> $fec_venc_licencia, 'fec_venc_mto'=> $fec_venc_mto );
        }

        
        return view('home', compact('vencimientos'));

    }
}
