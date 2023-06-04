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
      $ipAddress = $request->ip; // عنوان IP غير صحيح
      $apiKey = '60599fbbdccaca3b8d7fe8006896b499b460aca65b3b6b205ffa8a84';

      $url = "https://api.ipdata.co/$ipAddress/?api-key=$apiKey";
      $response = $client->get($url);

      $statusCode = $response->getStatusCode();
      $data = $response->getBody()->getContents();

      if ($statusCode == 200) {
        // قم بمعالجة البيانات التي تم استردادها
     $data = json_decode($data);
        return view('welcome', compact('data'));

      } else {
        // قم بالتعامل مع الطلب الغير ناجح وتخزين رسالة الخطأ في متغير
        $responseData = json_decode($data, true); // تحويل البيانات من صيغة JSON إلى مصفوفة
        $errorMessage = $responseData['message'];
        return $errorMessage;
      }
    } catch (ClientException $e) {
      // تعامل مع الخطأ وإعادة الاستجابة المناسبة
      $response = $e->getResponse();
      $statusCode = $response->getStatusCode();
      $data = $response->getBody()->getContents();

      // قم بتعديل هذا الجزء حسب احتياجاتك
      $responseData = json_decode($data, true); // تحويل البيانات من صيغة JSON إلى مصفوفة
      $error = $responseData['message'];
      return view('welcome', compact('error'));
    }


  }
}