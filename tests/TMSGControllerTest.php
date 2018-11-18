<?php /** @noinspection SpellCheckingInspection */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TMSGControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    private $client;

    protected function setUp()
    {
        parent::setUp();

        $this->client = static::createClient();
    }

    public function testSuccessPost()
    {
        $this->client->request('POST', '/tmsg', [],[],[], json_encode($this->requestData()));

        $this->assertJsonResponse($this->client->getResponse(), 200);
    }

    public function testSuccessWithoutRequiredPost()
    {
        $parameters = $this->requestData();
        unset($parameters['sid'], $parameters['uid']);

        $this->client->request('POST', '/tmsg', [],[],[], json_encode($parameters));

        $this->assertJsonResponse($this->client->getResponse(), 200);
    }

    public function testValidationErrorPost()
    {
        $parameters = $this->requestData();
        $parameters['cid'] = substr($parameters['cid'], 0, -3);

        $this->client->request('POST', '/tmsg', [],[],[], json_encode($parameters));

        $this->assertJsonResponse($this->client->getResponse(), 400);
    }

    protected function requestData(): array
    {
        return [
            "cid" => "a65f7960-a19d-49c1-a915-c48f036e8887",
            "vst" => [
                "ip" => "0.0.0.0",
                "lg" => "fr_CH",
                "rf" => "http://www.beeckon.swiss",
                "ua" => "Mozilla/5.0 (X11; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/21.0"
            ],
            "url" => "http://vantino.com/mno",
            "sid" => "110ec58a-a0f2-4ac4-8393-c866d813b8d1",
            "uid" => "4648471f-a360-471f-91f1-008b75d74f3b"
        ];
    }

    protected function assertJsonResponse(Response $response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}
