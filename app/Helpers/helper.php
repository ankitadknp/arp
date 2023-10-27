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
                "validation" => 'required',
            ],
            [
                'key'      => 'corporate sales managers salary in Canada',
                'is_image' => 1,
                'id'       => 'corporate_sales_managers_salary_in_Canada',
                "validation" => 'required',
            ],
            [
                'key'      => 'How does This Program work?',
                'is_image' => 0,
                'id'       => 'How_does_This_Program_work?',
                "validation" => 'required',
            ],
            [
                'key' => 'Main Advantages',
                'is_image' => 0,
                'id' => 'Main_Advantages',
                "validation" => 'required',
            ],
            [
                'key' => 'Candidate Requirements',
                'is_image' => 0,
                'id' => 'Candidate_Requirements',
                "validation" => 'required',
            ],
            [
                'key' => 'Time Frame',
                'is_image' => 0,
                'id' => 'Time_Frame',
                "validation" => 'required',
            ],
            [
                'key' => 'Our Service',
                'is_image' => 0,
                'id' => 'Our_Service',
                "validation" => 'required',
            ],
            [
                'key' => 'Service Cost',
                'is_image' => 1,
                'id' => 'Service_Cost',
                "validation" => 'required',
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

if(!function_exists('setWorkPermitVisaTitle')){
    function setWorkPermitVisaTitle()
    {
        $arr = [
            [
                'key' => 'Description',
                'is_image' => 0,
                'id' => 'Description',
            ],
            [
                'key' => 'Is an LMIA necessary? Yes, an LMIA is required',
                'is_image' => 0,
                'id' => 'Is_an_LMIA_necessary?_Yes,_an_LMIA_is_required'
            ],
            [
                'key' => 'Candidate Requirements',
                'is_image' => 0,
                'id' => 'Candidate_Requirements'
            ],
            [
                'key' => 'Your Salary by Experience Level in Canada',
                'is_image' => 1,
                'id' => 'You_Salary_by_Experience_Level_in_Canada',
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

if(!function_exists('setexpressVisaTitle')){
    function setexpressVisaTitle()
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
                'key' => 'Candidate Score',
                'is_image' => 1,
                'id' => 'Candidate_Score'
            ],
            [
                'key' => 'Canada Express Entry Latest Draw 2023',
                'is_image' => 1,
                'id' => 'Canada_Express_Entry_Latest_Draw_2023',
            ],
            [
                'key' => 'Here is a step-by-step breakdown for the process with us',
                'is_image' => 0,
                'id' => 'Here_is_a_step-by-step_breakdown_for_the_process_with_us',
            ],
            [
                'key' => 'Main Advantages',
                'is_image' => 0,
                'id' => 'Main_Advantages',
            ],
            [
                'key' => 'Your salary per region in Canada',
                'is_image' => 0,
                'id' => 'Your_salary_per_region_in_Canada',
            ],
            [
                'key' => 'Time Frame',
                'is_image' => 0,
                'id' => 'Time_Frame',
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