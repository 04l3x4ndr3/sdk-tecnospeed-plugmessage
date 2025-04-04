<?php
/**
 * Copyright (c) 2025.
 * @authorAlexandre G R Alves
 * Author GitHub: https://github.com/04l3x4ndr3
 * Project GitHub:  https://github.com/04l3x4ndr3/sdk-tecnospeed-plugmessage
 */

namespace O4l3x4ndr3\SdkTecnospeedPlugMessage;

class Configuration
{
    private array $URL_CONTEXT = [
        "v1" => 'https://api.plugzapi.com.br',
    ];

    private ?string $clientToken;
    private ?string $instanceId;
    private ?string $instanceToken;
    private ?array $httpHeader;

    public function __construct(?string $client_token = null, ?string $instance_id = null, ?string $instance_token = null)
    {
        $this->clientToken = $client_token ?? $_SERVER['PLUGMESSAGE_CLIENT_TOKEN'];
        $this->instanceId = $instance_id ?? $_SERVER['PLUGMESSAGE_INSTANCE_ID'];
        $this->instanceToken = $instance_token ?? $_SERVER['PLUGMESSAGE_INSTANCE_TOKEN'];
        $this->httpHeader = [];
    }

    /**
     * @return string
     */
    public function getClientToken(): string
    {
        return $this->clientToken;
    }

    /**
     * @param string $clientToken
     * @return void
     */
    public function setClientToken(string $clientToken): Configuration
    {
        $this->clientToken = $clientToken;
        return $this;
    }

    public function getInstanceId(): ?string
    {
        return $this->instanceId;
    }

    public function setInstanceId(?string $instanceId): void
    {
        $this->instanceId = $instanceId;
    }

    public function getInstanceToken(): ?string
    {
        return $this->instanceToken;
    }

    public function setInstanceToken(?string $instanceToken): void
    {
        $this->instanceToken = $instanceToken;
    }

    /**
     * @return array|null
     */
    public function getHttpHeader(): ?array
    {
        return $this->httpHeader;
    }

    /**
     * @param array $httpHeader
     */
    public function setHttpHeader(array $httpHeader): Configuration
    {
        $this->httpHeader = $httpHeader;
        return $this;
    }

    /**
     * @param string $context
     *
     * @return string
     */
    public function getUrl(?string $context = 'default'): string
    {
        return $this->URL_CONTEXT[$context ?? 'default'];
    }
}
