<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;

//newly added
use DB;
use App\Models\post;


class NotificationsController extends Controller
{

    public function Notifications_index(Request $request){   
        
        //->where('updated_at',"2021-12-09 14:20:17") index temp shld be removed

        $notifications = notifications::all()->where('forum_group_id',$request->forum_group_id);
        
        return response()->json([
                'status' => 200,
                'message' => $notifications,
        ]);

    }

//view notifications when notify false
public function Notifications_view(Request $request){   
      echo "VIEW NOTIFICATIONS~~~~~";            
        $v1= "LIKES COUNT:";
        $postwiselikescounts= DB::select('SELECT likes_count  FROM `post` ');
        $v2= "COMMENTS COUNT~~~~~";
        $postwisecommentscounts=DB::select('SELECT count(*)  FROM `comments` group by post_id') ;
        //echo "COMMENTS COUNT:".$postwisecommentscounts;
        //echo "LIKES COUNT:".$postwiselikescounts."~~~~~"."COMMENTS COUNT:".$postwisecommentscounts;

      //where clause user_id,updated_dt,//likes_count > 0
      $notifications = notifications::join('post', 'post.id', '=', 'comments.post_id')
                              ->where('comments.notify', false)  
                              ->get(['comments.post_id','post.description']);
   
               return response()->json([
                'status' => 200,
                'message' => $notifications,$v1,$postwiselikescounts,$v2,$postwisecommentscounts
        ]);

    }

//notifications badges count
public function Notifications_badges_count(Request $request){   
    //join('post', 'post.id', '=', 'comments.post_id')
    //where clause updated_dt user_id
    $badgescount = notifications::all()->
                    where('comments.notify', false)->count();
          
    echo "BADGES COUNT=".$badgescount;
    return response()->json([
                'status' => 200,
                'message' => $badgescount,
        ]);
    }

//notifications notify update
    public function Notifications_updatenotify(){

        //where clause user_id
      $updatenotify=DB::table('comments')->update(array("notify"=>true,"lastnotified_dt"=>date("Y-m-d H:i:s")));

      
      print_r($updatenotify);
      if($updatenotify!=0){return response()->json([
                    'status' => 200,
                    'message' => 'Updated notify all Successfull',
                ]);         }else echo "No Data to Update";

   }

       /*$updatenotify = notifications::all();
       $updatenotify->notify=1;
       $updatenotify->update();

       if($updatenotify){
                return response()->json([
                    'status' => 200,
                    'message' => 'Updated notify all Successfully',
                ]);
            }
 	   }*/

    
}
