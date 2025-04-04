<?php

namespace O4l3x4ndr3\SdkTecnospeedPlugMessage\Context;

use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Configuration;
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Types\ButtonList;
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Types\OptionList;
use O4l3x4ndr3\SdkTecnospeedPlugMessage\Utils\HTTPClient;

class Messages extends HTTPClient
{
    private string $instanceId;
    private string $instanceToken;

    public function __construct(?Configuration $configuration = null)
    {
        parent::__construct($configuration);

        $this->instanceId = $configuration->getInstanceId();
        $this->instanceToken = $configuration->getInstanceToken();
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9560344523287-Enviar-texto-simples
     */
    public function sendText(string $phone, string $message, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-text";
        $data = array_filter([
            'phone' => $phone,
            'message' => $message,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link  https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9560344606359-Reencaminhar-mensagem
     */
    public function forwardMessage(string $phone, string $messageId, string $messagePhone, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/forward-message";

        $data = array_filter([
            'phone' => $phone,
            'messageId' => $messageId,
            'messagePhone' => $messagePhone,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651323412631-Enviar-rea%C3%A7%C3%A3o
     */
    public function sendReaction(string $phone, string $reaction, string $messageId, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-reaction";

        $data = array_filter([
            'phone' => $phone,
            'reaction' => $reaction,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651328380055-Remover-rea%C3%A7%C3%A3o
     */
    public function sendRemoveReaction(string $phone, string $messageId, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-remove-reaction";

        $data = array_filter([
            'phone' => $phone,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651374834583-Enviar-imagem
     */
    public function sendImage(string $phone, string $image, ?string $caption = null, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-image";

        $data = array_filter([
            'phone' => $phone,
            'image' => $image,
            'caption' => $caption,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651416608791-Enviar-sticker
     */
    public function sendSticker(string $phone, string $sticker, ?string $caption = null, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-sticker";

        $data = array_filter([
            'phone' => $phone,
            'sticker' => $sticker,
            'caption' => $caption,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651463972887-Enviar-%C3%A1udio
     */
    public function sendAudio(string $phone, string $audio, ?string $caption = null, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-audio";

        $data = array_filter([
            'phone' => $phone,
            'audio' => $audio,
            'caption' => $caption,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651578752407-Enviar-v%C3%ADdeo
     */
    public function sendVideo(string $phone, string $video, ?string $caption = null, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-video";

        $data = array_filter([
            'phone' => $phone,
            'video' => $video,
            'caption' => $caption,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651648952855-Enviar-documentos
     */
    public function sendDocument(string $phone, string $document, string $extension, ?string $fileName, ?string $caption = null, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-document/{$extension}";

        $data = array_filter([
            'phone' => $phone,
            'document' => $document,
            'fileName' => $fileName,
            'caption' => $caption,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9800779559447-Enviar-link
     */
    public function sendLink(string $phone, string $message, string $image, string $title, string $linkUrl, string $linkDescription, ?string $linkType = 'SMALL', ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-link";

        $data = array_filter([
            'phone' => $phone,
            'message' => $message,
            'image' => $image,
            'title' => $title,
            'linkUrl' => $linkUrl,
            'linkDescription' => $linkDescription,
            'linkType' => $linkType,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651716578327-Enviar-localiza%C3%A7%C3%A3o
     */
    public function sendLocation(string $phone, string $title, string $address, float $latitude, float $longitude, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-location";

        $data = array_filter([
            'phone' => $phone,
            'title' => $title,
            'address' => $address,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651752041239-Enviar-contato
     */
    public function sendContact(string $phone, string $contactName, string $contactPhone, string $contactBusinessDescription, ?string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-contact";

        $data = array_filter([
            'phone' => $phone,
            'contactName' => $contactName,
            'contactPhone' => $contactPhone,
            'contactBusinessDescription' => $contactBusinessDescription,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651892224535-Enviar-texto-com-bot%C3%B5es-de-a%C3%A7%C3%A3o
     */
    public function sendButtonActions(string $phone, string $message, ButtonList $buttonActions, ?string $title = null, ?string $footer = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-button-actions";

        $data = array_filter([
            'phone' => $phone,
            'message' => $message,
            'title' => $title,
            'footer' => $footer,
            'buttonActions' => $buttonActions->toArray(),
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9651993389975-Enviar-lista-de-op%C3%A7%C3%B5es
     */
    public function sendOptionList(string $phone, string $message, OptionList $optionList, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/send-option-list";

        $data = array_filter([
            'phone' => $phone,
            'message' => $message,
            'optionList' => $optionList->toArray(),
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9652254091159-Deletar-mensagens
     */
    public function deleteMessage(string $messageId, string $phone, bool $owner = true): object
    {
        $qs = http_build_query(array_filter([
            'messageId' => $messageId,
            'phone' => $phone,
            'owner' => $owner,
        ]));
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/messages?$qs";
        return $this->call('DELETE', $endpoint);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9656335751959-Ler-mensagens
     */
    public function readMessage(string $phone, string $messageId = null): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/read-message";

        $data = array_filter([
            'phone' => $phone,
            'messageId' => $messageId,
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    /**
     * @throws GuzzleException
     * @link https://atendimento.tecnospeed.com.br/hc/pt-br/articles/9656044094743-Responder-mensagem
     */
    public function replyMessage(string $phone, string $messageId = null, ?int $delayMessage = 3): object
    {
        $endpoint = "instances/{$this->instanceId}/token/{$this->instanceToken}/reply-message";

        $data = array_filter([
            'phone' => $phone,
            'messageId' => $messageId,
            'delayMessage' => $delayMessage,
        ]);
        return $this->call('POST', $endpoint, $data);
    }
}
