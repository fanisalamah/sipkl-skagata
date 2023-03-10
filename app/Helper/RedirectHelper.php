<?php 

namespace App\Helper;

use GrahamCampbell\ResultType\Success;

    class RedirectHelper {

        public static function redirectBack($message = 'oke' , $type = 'success') {

            $notification = array(
                'message' => $message,
                'alert-type' => $type
            );
            return redirect()->back()->with($notification);

        }
    }





?>