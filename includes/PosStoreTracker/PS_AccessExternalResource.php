<?php

class PS_AccessExternalResource
{
    public function getPosStoreTracking($trackingId)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
            CURLOPT_URL => "http://47.250.41.212:8085/DNYInterfaceServer/ztserver/tabOrderBill/query?nu={$trackingId}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'Accept-Language: en-US,en;q=0.9,ur;q=0.8',
                'Cookie: JSESSIONID=AAF84D76E524AC80B5EDA16BF410A3E8; JSESSIONID=CE591C10B71C93A71254E0C4FC8F7895',
                'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
            ),
            )
        );

        $response = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $response = [
            "responsePage" => $response,
            "statusCode" => $statusCode,
        ];
        return $response;
    }
}