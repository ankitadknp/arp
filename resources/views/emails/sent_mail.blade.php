@extends('emails.layouts.layout')

@section('content')
<tr>
    <td>
        <table  align="left" cellpadding="10" cellspacing="0"  width="100%" style="max-width:600px;border-spacing:0px;border-width:medium;border-style:none; color: #4f4f4f; font-size: 14px;line-height:22px;">
            <tbody>
                <tr>
                    <td style="color: #ea0a6d; font-size: 22px; font-weight: bold;">{{$pdf_title}}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        Hello {{$name}}  - Congratulations for your Positive legal evolution! <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Please open the attached file to review you assessments results report.<br><br>

                        We are sure that you are excited to review the various programs that you are eligible for.<br><br>

                        Please <a href="{{$meeting_link}}"> book a video meeting </a> with your Immigration Case Manager for a review and selection<br><br>

                        of the program for you to immigrate to Canada: <a href="{{$meeting_link}}">Book a video Meeting</a> <br><br>

                        The main purpose of the meeting is: <br>
                        •	View your options to immigrate to Canada.<br>
                        •	Answer questions that arise from your side.<br>
                        •	Choose the Immigration Program that matches your needs.<br>
                        •	Explain the next step.<br>
                        <p><b><a href="{{$meeting_link}}" style="color:black">Book a video Meeting with your Case Manager to reviews your Positive legal evolution!<a></b></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection