<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GetController extends Controller
{
  public function index(Request $request) {
    try {
      $client = new Client();
      $ipAddress = $request->ip;
      $apiKey = '60599fbbdccaca3b8d7fe8006896b499b460aca65b3b6b205ffa8a84';

      $url = "https://api.ipdata.co/$ipAddress/?api-key=$apiKey";
      $response = $client->get($url);

      $statusCode = $response->getStatusCode();
      $data = $response->getBody()->getContents();

      if ($statusCode == 200) {
       
     $data = json_decode($data);
        return view('welcome', compact('data'));

      } else {
        
        $responseData = json_decode($data, true);
        $errorMessage = $responseData['message'];
        return $errorMessage;
      }
    } catch (ClientException $e) {
      
      $response = $e->getResponse();
      $statusCode = $response->getStatusCode();
      $data = $response->getBody()->getContents();
      
      $responseData = json_decode($data, true); 
      $error = $responseData['message'];
      return view('welcome', compact('error'));
    }


  }
}