<?php

// src/Components/AlertComponent.php
namespace App\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent('alert', exposePublicProps: false)]
class AlertComponent
{
    #[ExposeInTemplate]
    private string $type = 'success';
    
    #[ExposeInTemplate]
    private ?string $title = null;
    
    #[ExposeInTemplate]
    private string $message = "";

    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver;
        $resolver->setDefaults(['type' => 'success']);
        $resolver->setDefaults(['title' => null]);
        $resolver->setAllowedValues('type', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']);
        $resolver->setRequired('type');
        $resolver->setRequired('message');

        return $resolver->resolve($data);
    }

    public function mount(?string $title = null)
    {
        $this->title = $title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title = null): void
    {
        $this->title = $title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}