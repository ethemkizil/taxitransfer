<?php

namespace App\Services;

class SmsSendService
{

    function xmlPost($postAddress,$xmlData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$postAddress);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
        $result = curl_exec($ch);
        return $result;
    }

    function send($phone, $message)
    {
        $xml='<?xml version="1.0" encoding="UTF-8"?>
        <mainbody>
            <header>
                <company>NETGSM</company>
                <usercode>5465128877</usercode>
                <password>gcccm1995</password>
                <startdate></startdate>
                <stopdate></stopdate>
                <type>1:n</type>
                <msgheader>VAROLLARTUR</msgheader>
                </header>
                <body>
                <msg><![CDATA['.$message.']]></msg>
                <no>'.$phone.'</no>
                </body>
        </mainbody>';
        $gelen = $this->xmlPost('http://api.netgsm.com.tr/xmlbulkhttppost.asp',$xml);

        return $gelen;
    }
}