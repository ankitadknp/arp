<?php 

if(!function_exists('activityEnums')){
    function activityEnums($keyofreq)
    {
        $arr=[
            'user'  => 'user',
            'brand' => 'brand',
            'language' => 'language',
            'visa-type' => 'visa-type',
            'representative' => 'representative',
            'smtp-setting' => 'smtp-setting',
            'pipedeive-setting' => 'pipedeive-setting',
        ];
        return $arr[$keyofreq];
    }
}

if(!function_exists('setActivityLog')){
    function setActivityLog($desc='',$additional_data='',$rel_type,$rel_id=0,$auth_id=0)
    {
        $brand_id = \Auth::user()->brand_id ? \Auth::user()->brand_id : 0;
        $data = array(
            'description'     => $desc,
            'additional_data' => $additional_data,
            'ipaddress'       => \Request::ip(),
            'rel_type'        => $rel_type,
            'rel_id'          => $rel_id,
            'brand_id'        => $brand_id,
            'added_by'        => $auth_id,
        );
        DB::table('activity_logs')->insert($data);
    }
}

if(!function_exists('setLanguage')){
    function setLanguage()
    {
        $arr=[
            [
                'name'      => 'English',
                'code'      => 'en'
            ],
            [
                'name'      => 'French',
                'code'      => 'fr',
            ]
        ];
        return $arr;
    }
}


?>