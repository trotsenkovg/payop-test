<?php

namespace Src\Models;

class Payer
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $phone;

    /**
     * @var string
     */
    private array $extraFields;

    /**
     * @param string $email
     * @param string $name
     * @param string $phone
     * @param array $extraFields
     * @throws \Exception
     */
    public function __construct(string $email, string $name = '', string $phone = '', array $extraFields = [])
    {
        $this->email    = $email;
        $this->name     = $name;
        $this->phone    = $phone;
        $this->extraFields = $extraFields;

        $this->validate();
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return array_filter([
            'email'     => $this->email,
            'name'      => $this->name,
            'phone'     => $this->phone,
            'extraFields' => $this->extraFields,
        ]);
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function validate(): void
    {
        if (!$this->email) {
            throw new \Exception('User: Email cannot be blank. Required parameter.');
        }
    }
}