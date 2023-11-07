@extends('emails.layouts.layout')

@section('content')
<tr>
    <td>
        <table  align="left" cellpadding="10" cellspacing="0"  width="100%" style="max-width:600px;border-spacing:0px;border-width:medium;border-style:none; color: #4f4f4f; font-size: 14px;line-height:22px;">
            <tbody>
                <tr>
                    <td style="color: #ea0a6d; font-size: 22px; font-weight: bold;">{{ config('app.name') }}.</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        Name : {{$name}}<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Credit Score: {{$credit_score}}<br>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding: 10px 10px 0 10px;">Thank you</td>
                </tr>
                <tr>
                    <td style="padding:0 10px;">
                        Assessment Results Platform
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection