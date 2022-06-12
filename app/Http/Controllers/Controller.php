<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\University;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function import() {
     
        $url = "http://universities.hipolabs.com/search?country=United+States";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);
        // return $resp;
        try {
            
            foreach ($resp as $k => $data) {
                $name = $data['name'];
                $alpha_two_code = $data['alpha_two_code'];
                $country = $data['country'];
                $stateProvince = $data['state-province'];
                
                foreach ($data['domains'] as $domains) {
                }

                foreach ($data['web_pages'] as $webPages) {                     
                }

                if($k >= 100) {
                    break;
                }
                
                University::create([
                    'name' => $name,
                    'alpha_two_code' => $alpha_two_code,
                    'domains' => $domains,
                    'country' => $country,
                    'state-province' => $stateProvince,
                    'web_pages' => $webPages
                ]);
            
            }                
            
            
        } catch (\Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ]);
        }
        session(['created' => $name]);
        return view('import');
    }   
    
    public function search(Request $request) {

        try {
            $data = $request->input('search');
            // return $data;
            
            $columns = ['name', 'alpha_two_code', 'domains', 'country', 'state-province', 'web_pages'];
            
            $query = University::Where('name', 'LIKE', '%' . $data . '%')
                                ->orWhere('alpha_two_code', 'LIKE', '%' . $data . '%')
                                ->orWhere('domains', 'LIKE', '%' . $data . '%')
                                ->orWhere('country', 'LIKE', '%' . $data . '%')
                                ->orWhere('state-province', 'LIKE', '%' . $data . '%')
                                ->orWhere('web_pages', 'LIKE', '%' . $data . '%')
                                ->get();
            
        } catch (\Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ]);
        }
         
        return view('search', compact('query'));
    }

    public function makeInscription(Request $request) {
        
        $data = $request->all();
        // var_dump($data['id']);
        // die();
        // $msg = 'Inscrição já realizada!';
        // $exists = Inscription::where('university_id','=', $data['id']);
        
        // // return $exists;
        // if(!empty($exists->get())) {
        //     echo (json_encode($msg));
        // }
            
        $query = Inscription::create([
            'user_id' => Auth::id(),
            'university_id' => $data['id']
        ]);

        // return view('inscription', compact('query'));
    }

    public function showInscriptions() {
        
        $results = University::join('inscriptions', 'universities.id','=','inscriptions.university_id')
                            ->whereNotNull('inscriptions.university_id')
                            ->get();
        
        return view('inscription', compact('results'));
    }

    public function removeInscription(Request $request) {
        $data = $request->all();
        
        $query = Inscription::where([
                                'user_id' => Auth::id(),
                                'university_id' => $data['id']
                            ])
                            ->delete();
    }

}
    

