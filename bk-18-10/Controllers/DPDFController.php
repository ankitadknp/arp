<?php


            namespace App\Http\Controllers;


            use Illuminate\Http\Request;
            use PDF;
            use App\Models\Brand;



            class DPDFController extends Controller
            {
                public function generateHtmlToPDF()
                {
                    $brands = Brand::select('*')->first();
                    set_time_limit(30);
                    $html = '<h1>Generate html to PDF</h1>
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry<p>';
                    
                    //$pdf= PDF::loadHTML($html);

                    $data = ['brands' => $brands];
                    //return view('test');
                    $pdf = PDF::loadView('pdf_new',$data);
                   
                    return $pdf->download('invoice.pdf');
                   
                }
            }