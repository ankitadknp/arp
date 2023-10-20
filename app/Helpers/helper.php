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

if(!function_exists('setEducationLevel')){
    function setEducationLevel()
    {
        $arr =[
            '196'      => 'Less then High School Diploma',
            '197'      => 'High School Diploma',
            '198'      => '1 Year Degree / Diploma',
            '199'      => '2 Year Degree / Diploma',
            '200'      => "Bachelor's degree / Degree of 3 Years or More",
            '201'      => "Two or more Bachelor's / Post secondary Degree",
            '202'      => "Master's Degree",
            '203'      => 'PHD',
        ];
        return $arr;
    }
}

if(!function_exists('setAlbertaVisaTitle')){
    function setAlbertaVisaTitle()
    {
        $arr = [
            [
                'key' => 'Description',
                'is_image' => 0,
                'id' => 'Description',
            ],
            [
                'key' => 'The Rural Renewal Stream has a 2-step process',
                'is_image' => 0,
                'id' => 'The_Rural_Renewal_Stream_has_a_2-step_process',
            ],
            [
                'key' => 'Candidate Requirements',
                'is_image' => 0,
                'id' => 'Candidate_Requirements'
            ],
            [
                'key' => 'Main Advantages',
                'is_image' => 0,
                'id' => 'Main_Advantages',
            ],
            [
                'key' => 'Corporate sales manager: salaries per region',
                'is_image' => 1,
                'id' => 'Corporate_sales_manager:_salaries_per_region',
            ],
            [
                'key' => 'Time Frame',
                'is_image' => 0,
                'id' => 'Time_Frame',
            ],
            [
                'key' => 'Our Service',
                'is_image' => 0,
                'id' => 'Our_Service',
            ],
            [
                'key' => 'Service Cost',
                'is_image' => 1,
                'id' => 'Service_Cost',
            ],
 
        ];
        return $arr;
    }
}

if(!function_exists('setBritishVisaTitle')){
    function setBritishVisaTitle()
    {
        $arr = [
            [
                'key'      => 'Description',
                'is_image' => 0,
                'id'       => 'Description',
            ],
            [
                'key'      => 'corporate sales managers salary in Canada',
                'is_image' => 1,
                'id'       => 'corporate_sales_managers_salary_in_Canada'
            ],
            [
                'key'      => 'How does This Program work?',
                'is_image' => 0,
                'id'       => 'How_does_This_Program_work?',
            ],
            [
                'key' => 'Main Advantages',
                'is_image' => 0,
                'id' => 'Main_Advantages',
            ],
            [
                'key' => 'Candidate Requirements',
                'is_image' => 0,
                'id' => 'Candidate_Requirements',
            ],
            [
                'key' => 'Time Frame',
                'is_image' => 0,
                'id' => 'Time_Frame',
            ],
            [
                'key' => 'Our Service',
                'is_image' => 0,
                'id' => 'Our_Service',
            ],
            [
                'key' => 'Service Cost',
                'is_image' => 1,
                'id' => 'Service_Cost',
            ],
 
        ];
        return $arr;
    }
}

if(!function_exists('setAtlanticVisaTitle')){
    function setAtlanticVisaTitle()
    {
        $arr = [
            [
                'key' => 'Description',
                'is_image' => 0,
                'id' => 'Description',
            ],
            [
                'key' => 'How does This Program work?',
                'is_image' => 0,
                'id' => 'How_does_This_Program_work?'
            ],
            [
                'key' => 'Candidate Requirements',
                'is_image' => 0,
                'id' => 'Candidate_Requirements'
            ],
            [
                'key' => 'Highest paying cities for Sales Managers near Canada',
                'is_image' => 1,
                'id' => 'Highest_paying_cities_for_Sales_Managers_near_Canada',
            ],
            [
                'key' => 'Main Advantages',
                'is_image' => 0,
                'id' => 'Main_Advantages',
            ],
            [
                'key' => 'Time Frame',
                'is_image' => 0,
                'id' => 'Time_Frame',
            ],
            [
                'key' => 'Our Service',
                'is_image' => 0,
                'id' => 'Our_Service',
            ],
            [
                'key' => 'Service Cost',
                'is_image' => 1,
                'id' => 'Service_Cost',
            ],
 
        ];
        return $arr;
    }
}


?>