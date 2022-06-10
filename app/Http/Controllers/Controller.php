<?php

namespace App\Http\Controllers;

use App\Models\Universities;
use App\Models\University;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

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
        
        return view('importSuccess');
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
        // return $query;
        return view('search', compact('query'));
    }

    public function inscription(Request $request) {
        
        $data = json_decode($request->data, true);
     
        session()->flash('msg', 'Inscrição realizada!');
        return view('inscription', compact('data'));
    }
    
}
