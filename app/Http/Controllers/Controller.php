<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Sugestion;
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

    /**
     * Import 100st universities
     */
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
        
        return redirect()->route('home');
    }   
    
    /**
     * Search universities from database
     */
    public function search(Request $request) {
        try {
            $data = $request->input('search');
            
            $results = University::Where('name', 'LIKE', '%' . $data . '%')
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
         
        return view('search', compact('results'));
    }

    /**
     * Make the inscriptions
     */
    public function makeInscription(Request $request) {
        
        $id = $request->id;
       
        Inscription::create([
            'user_id' => Auth::id(),
            'university_id' => $id
        ]);

        return response()->json('Inscrição realizada com sucesso!');
    }

    /**
     * Show the user inscriptions
     */
    public function showInscriptions() {
        
        $results = University::join('inscriptions', 'universities.id','=','inscriptions.university_id')
                            ->groupBy('inscriptions.university_id')
                            ->get();
    
        return view('inscription', compact('results'));
    }

    /**
     * Remove the inscriptions from database
     */
    public function removeInscription(Request $request) {
        $data = $request->all();
        
        $query = Inscription::join('universities','inscriptions.university_id','=','universities.id')
                            ->where([
                                'inscriptions.user_id' => Auth::id(),
                                'universities.id' => $data['id']
                            ])
                            ->delete();

        echo json_encode($query);                 
        // echo json_encode('Inscrição removida com sucesso!');
    }

    /**
     * Insert sugestions in the table sugestions
     */
    public function addSugestion(Request $request) {
        $data = $request->all();
        
        $query = Sugestion::create([
                'name' => $data['name'],
                'alpha_two_code' => $data['code'],
                'domains' => $data['domains'],
                'country' => $data['country'],
                'web_pages' => $data['web_pages']
        ]);
        session()->flash('msg', 'Sugestão enviada com sucesso!');
        return redirect()->route('add');
    }

}
    

