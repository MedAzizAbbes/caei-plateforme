<?php

namespace App\Services;

class LiveKitService
{
    private string $apiKey;
    private string $apiSecret;
    private string $wsUrl;

    public function __construct()
    {
        $this->apiKey    = config('services.livekit.api_key', '');
        $this->apiSecret = config('services.livekit.api_secret', '');
        $this->wsUrl     = config('services.livekit.url', '');
    }

    /**
     * Generate a LiveKit JWT access token.
     * The API secret NEVER leaves this service.
     */
    public function generateToken(
        string $roomName,
        int    $userId,
        string $userName,
        bool   $canPublish = true
    ): string {
        $now = time();
        $exp = $now + 3600; // 1 hour

        $header = $this->base64UrlEncode(json_encode([
            'alg' => 'HS256',
            'typ' => 'JWT',
        ]));

        $payload = $this->base64UrlEncode(json_encode([
            'iss'   => $this->apiKey,
            'sub'   => (string) $userId,
            'iat'   => $now,
            'exp'   => $exp,
            'name'  => $userName,
            'video' => [
                'roomJoin'    => true,
                'room'        => $roomName,
                'canPublish'  => $canPublish,
                'canSubscribe'=> true,
            ],
        ]));

        $signature = $this->base64UrlEncode(
            hash_hmac('sha256', "{$header}.{$payload}", $this->apiSecret, true)
        );

        return "{$header}.{$payload}.{$signature}";
    }

    /**
     * Generate a deterministic room name for a call between two users in a seminar.
     */
    public function generateRoomName(int $seminarId, int $callerId, int $calleeId): string
    {
        $sorted = [$callerId, $calleeId];
        sort($sorted);
        $hash = substr(hash('sha256', "caei-{$seminarId}-{$sorted[0]}-{$sorted[1]}-" . time()), 0, 12);
        return "caei-sem{$seminarId}-{$hash}";
    }

    public function getWsUrl(): string
    {
        return $this->wsUrl;
    }

    private function base64UrlEncode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
