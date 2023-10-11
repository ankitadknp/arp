@extends('emails.layouts.layout')

@section('content')
<tr>
    <td>
            <thead>
                <tr>
                    <th style="padding-top: 15px;padding-bottom: 15px;">
                        <img width="65" src="{{asset("public/assets/images/smart_logo.png")}}">
                    </th>
                </tr>
            </thead>
            <tbody style="border: 2px solid #f8f8f8; display: table; text-align: center; ">
                <tr>
                    <td style="display: flex; ">
                        <img width="100%" src="{{asset("public/assets/images/email-banner.jpg")}}">
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 24px; font-weight: 700; padding: 40px 25px 30px; color: #29479F;">
                        {{$title}}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 25px 10px;">
                        <p></p>
                        <p style="border: 1px dashed #222; padding: 12px 40px; display: inline-block; margin: 12px 0 20px; font-size: 20px; font-weight: 600;">{{$token}}</p>
                        <p style="margin: 0; "></p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 25px 30px;">
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection