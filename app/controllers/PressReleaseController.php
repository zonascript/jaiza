<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsPaperController
 *
 * @author 12003065165
 */
class PressReleaseController extends BaseController {
    
    
   
    //put your code here


        function pReleasePage(){
            
            $userController = new UserController();
            $user = $userController->isLogged();            
            $tags = Tag::all();
            $leaders = Leader::all();
            return View::make('PR',['user' =>$user ,'tags'=>$tags,'leaders' =>$leaders]);
                    
        }
        
        function pReleasePagePost(){
            $userController = new UserController();
            $tagController = new TagController();
            
            $tags = Input::get('tags');
            $title = Input::get('title');
            $place = Input::get('place');
            $details = Input::get('details');
            $type = Input::get('type');
            $leaderID = Input::get('leaderID');
            
            $date = date('Y-m-d');
            
                $ts =   $tagController->arrToCommaSperated($tags);
           $userID = $userController->isLogged()->id;
           $btnAdd = Input::get('btnAdd');
           if(!empty($btnAdd))
           { 
           PressRelease::insert([
                    'title' => $title,
                    'date' => $date,
                    'place' => $place,
                    'detail' => $details,
                    'tag' => $ts,
                    'type' =>$type,
                    'leader_ID' =>$leaderID,
                    'user_ID' =>$userID
                    
                ]);
           } 
           return $this->pReleasePage();
            
        }
        function pressReleaseTable(){
            $prs = PressRelease::all();
            return View::make('prTable',['prs' => $prs]);
            
            
        }
        function deletePressRelease(){
            $pr_ID = Input::get('pr_ID');
            
            PressRelease::where('pr_ID',$pr_ID)->delete();
            return "Sucessfully Deleted $pr_ID";
         }
    
    
}