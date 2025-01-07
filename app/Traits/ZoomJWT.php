<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait ZoomJWT
{
    private function generateZoomToken()
    {
        $accountId = env('ZOOM_ACCOUNT_ID');
        $clientId = env('ZOOM_CLIENT_ID');
        $clientSecret = env('ZOOM_CLIENT_SECRET');
        $response = Http::asForm()->withHeaders([
            'Authorization' => "Basic ". base64_encode($clientId.':'.$clientSecret)
        ])->post("https://zoom.us/oauth/token", [
            'grant_type' => 'account_credentials',
            'account_id' => $accountId,
        ]);
        // dd($response);

        $accessToken = $response->json()['access_token'];
        return $accessToken;
    }

    private function retrieveZoomUrl()
    {
        return env('ZOOM_API_URL', '');
    }
    private function zoomRequest()
    {
        $accessToken = $this->generateZoomToken();
        return \Illuminate\Support\Facades\Http::withHeaders([
            'authorization' => 'Bearer ' . $accessToken,
            'content-type' => 'application/json',
        ]);
    }

    public function zoomGet(string $path, array $query = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->get($url . $path, $query);
    }

    public function zoomPost(string $path, array $body = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->post($url . $path, $body);
    }

    public function zoomPatch(string $path, array $body = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->patch($url . $path, $body);
    }

    public function zoomDelete(string $path, array $body = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->delete($url . $path, $body);
    }
}

?>
