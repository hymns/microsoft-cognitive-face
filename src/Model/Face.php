<?php

namespace Hymns\MicrosoftCognitiveFace\Model;

use Hymns\MicrosoftCognitiveFace\Model;

class Face extends Model
{
    /**
     * Detect human faces in an image, return face rectangles, and optionally with faceIds, landmarks, and attributes.
     *
     * Optional parameters including faceId, landmarks, and attributes. 
     * Attributes include age, gender, headPose, smile, facialHair, glasses, emotion, hair, makeup, occlusion, 
     * accessories, blur, exposure and noise.
     *
     * faceId will be used in Face - Verify, Face - Identify (coming soon) and Face - Find Similar (coming soon). 
     * It will expire 24 hours after the detection call.
     *
     * Face detector prefer frontal and near-frontal faces. There are cases that faces may not be detected, 
     * e.g. exceptionally large face angles (head-pose) or being occluded, or wrong image orientation.
     * 
     * @param string $url
     * @param bool   $returnFaceId
     * @param bool   $returnFaceLandmarks
     * @param string $returnFaceAttributes
     *
     * @return mixed
     * @throws \Hymns\MicrosoftCognitiveFace\Exception\ClientException
     */
    public function detectFacesFromImage(string $url = '', bool $returnFaceId = true, bool $returnFaceLandmarks = false, string $returnFaceAttributes = 'age,gender,headPose,smile,facialHair,glasses,emotion,hair,blur,exposure,noise')
    {
        $parameters = [
            'url' => $url
        ];

        $form_params = [
            'returnFaceId'         => (int)$returnFaceId,
            'returnFaceLandmarks'  => (int)$returnFaceLandmarks,
            'returnFaceAttributes' => $returnFaceAttributes
        ];


        $response = $this->client->request('POST', 'detect', $parameters, $form_params);

        return json_decode((string)$response->getBody());
    }

    /**
     * Verify whether two faces belong to a same person
     *
     * Remarks:
     * Higher face image quality means better identification precision. Please consider 
     * high-quality faces: frontal, clear, and face size is 200x200 pixels (100 pixels between eyes) 
     * or bigger.
     * 
     * For the scenarios that are sensitive to accuracy please make your own judgment.
     *
     * @param string $faceId1
     * @param string $faceId2
     *
     * @return mixed
     * @throws \Hymns\MicrosoftCognitiveFace\Exception\ClientException
     */
    public function verifyTwoFaces(string $faceId1, string $faceId2)
    {
        $bodyParameters = [
            'faceId1' => $faceId1,
            'faceId2' => $faceId2
        ];

        $response = $this->client->request('POST', 'verify', $bodyParameters);

        return json_decode((string)$response->getBody());
    }
}
