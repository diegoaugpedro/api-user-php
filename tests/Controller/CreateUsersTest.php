<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CreateUsersTest extends WebTestCase
{
  public function test_create_user_post(): void
  {
    $client = static::createClient();

    $client->request(method: 'POST', uri: '/users',
      content: json_encode([
        'name' => 'Teste',
        'surname' => 'Attempt',
        'email' => 'teste@email.com',
        'address' => [
          'street' => 'Avenida Juiz Marco Tulio Isaac',
          'number' => '2000',
          'complement' => 'Apto 303',
          'district' => 'Chacara',
          'city' => 'Betim',
          'state' => 'Minas Gerais'
        ]
      ])
    );

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_CREATED, $statusCode);
  }

  public function test_create_user_with_invalid_data(): void
  {
    $client = static::createClient();

    $client->request(method: 'POST', uri:'/users',
      content: json_encode([
        'name' => 'Teste',
        'email' => 'teste@email.com',
      ])
    );

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_BAD_REQUEST, $statusCode);
  }
}