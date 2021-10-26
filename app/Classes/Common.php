<?php
namespace App\Classes;
use DB;
use Illuminate\Support\Facades\Auth;
class Common {
    
    private $userID ;

    public function __construct()
    {
          $this->userID =  Auth::id();    
    }
    
    /**
     *   Get data and check if addnote
     *   
     */
    public function getPrevUrlData(){      
        $db = DB::table('navigation')->where(['userID'=> $this->userID])->first();
       
        if($db){          
          $data = json_decode($db->urlData,true);
          return end($data);       
        }
        return '';
    }

    /**
     *  Remove addnote route
     */
    public function removeData(){    
        DB::table('navigation')->where(['userID'=> $this->userID])->delete();
    }

    /**
     *  Save the route name 
     */
    public function insertURl($data){       
        $selectcount = "select * from navigation where userID={$this->userID}";

        $db = DB::select($selectcount);
             
        if(empty($db)){
            $data = json_encode([$data],JSON_FORCE_OBJECT);
            $data= ['userID'=> $this->userID, 'urlData'=>$data];
             DB::table('navigation')->insert($data);
        }else{    
             
            if(count($db)>10){
                $data = [$data];
                $data = json_encode($data,JSON_FORCE_OBJECT);

            }else{

                foreach($db as $vada)
                {
                    $data = $vada->urlData;
                }  

                $data = json_decode($data,true);
                $data = array_merge($data,$data);
                $data = json_encode($data,JSON_FORCE_OBJECT);

                $data= ['userID'=> $this->userID,'urlData'=> $data];
                DB::table('navigation')->where(['userID'=> $this->userID])->update($data);
            }           
        }        
    }
} 
?>