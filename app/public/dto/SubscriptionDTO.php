<?php

class SubscriptionDTO {
    public readonly ?int $susbcriptionId;
    public readonly string $email;
    public readonly bool $subscribed;

    public function __construct(string $email, bool $subscribed, ?int $susbcriptionId = null)
    {
        $this->susbcriptionId = $susbcriptionId;
        $this->email = $email;
        $this->subscribed = $subscribed;
    }
}