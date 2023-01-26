<?php

require_once __DIR__ . '/PS_AccessExternalResource.php';
require_once __DIR__ . '/ProcessPosStoreHtml.php';

function trackPosStoreParcel($request)
{
    try {
        $trackingId = $request['parcelId'];
        $accessExternalResource = new PS_AccessExternalResource();
        $response = $accessExternalResource->getPosStoreTracking($trackingId);
        $responseCode = $response["statusCode"];
        $responsePage = $response["responsePage"];
        $processPosStoreHtml=new ProcessPosStoreHtml();
        $responsePage=$processPosStoreHtml->populateLinks($responsePage);
        $responsePage=$processPosStoreHtml->replaceText($responsePage);
        $javascript=$processPosStoreHtml->getJavascript($responsePage);
        $resArray=[
            "html"=>$responsePage,
            "javascript"=>$javascript,
        ];
        $response = new WP_REST_Response(base64_encode(json_encode($resArray)));
        $response->set_status($responseCode);
        return ($response);
    } catch (\Throwable $th) {
        $response = new WP_REST_Response(base64_encode("<div>Error processing request...</div>"));
        $response->set_status(500);
        return $response;
    }
}