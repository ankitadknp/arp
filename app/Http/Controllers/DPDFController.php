<?php


            namespace App\Http\Controllers;


            use Illuminate\Http\Request;
            use PDF;
            use App\Models\Brand;
            use App\Models\CreatedDateAssement;
            use App\Models\Representative;
            use App\Models\VisaTypeDetails;
            use App\Models\VisaType;
            use App\Models\CreateAssetmentImages;



            class DPDFController extends Controller
            {
                public function generateHtmlToPDF()
                {
		    //$brands = Brand::select('*')->first();
                    $user = \Auth::user();
                    $id = 96;
                    $brand_name = 'CanadaMigration';
            

                    $created_data = CreatedDateAssement::join('visa_type','visa_type.id','=','sent_mail.recommended_visa_type')->select('sent_mail.*','visa_type.name as recommended_visa_name')->where('sent_mail.id',$id)->first();

                    if (!$created_data) {
                        return response()->json(['error' => 'Email data not found.']);
                    }
                    
                    $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();
                    if ($brands) {
                        $allrepresentatives = Representative::whereRaw("FIND_IN_SET($brands->id, brand_id)")->orderby('id','DESC')->get();
                    } else {
                        $allrepresentatives = [];
                    }

                    $visa_type = [];
                    if ( $created_data->visa_type_id) {
                        $vt = VisaType::whereRaw("FIND_IN_SET(id, '$created_data->visa_type_id')")->get();
                        
                        if ($vt) {
                            $vt = $vt->toArray();
                            foreach($vt as $key=>$val) {
                            $visa_details = VisaTypeDetails::where('visa_type_id',$val['id'])->where('language_code',$created_data->language_code)->get();
                            $visaImages = CreateAssetmentImages::where('visa_type_id',$val['id'])->where('create_assetment_id',$id)->get();
                            if ( $visaImages ) {
                               foreach($visaImages as $key1=>$val1) {
                                   $newArray = array();
                                   $newArray['is_image'] = 1;
                                   $newArray['visa_key'] = 'Your salary per region in Canada';
                                   $newArray['value'] = $val1->value;
                                   $visa_details[] = (object)$newArray;
                               }
                           }
                            $visa_type[$key] = $val;
                            $visa_type[$key]['visa_details'] = $visa_details;
                            $visa_type[$key]['visaImages'] = $visaImages;
                            }
                        }
                    }
                    $representative = Representative::where('email', 'like', '%' . $user->email . '%')->first();

                    //language wise
                    $brand_about = '';
                    if($created_data->language_code) {
                        $a = 'about_'.$created_data->language_code;
                        $brand_about = $brands->$a;
                    } 
                    
                    //generate pdf
		    //return view('canadamigration_en',compact(['brands','allrepresentatives','representative','created_data','visa_type','brand_about']));
                    $pdf = PDF::loadView('canadamigration_en',compact(['brands','allrepresentatives','representative','created_data','visa_type','brand_about']));
                   
                    return $pdf->download('invoice.pdf');
                   
                }
            }