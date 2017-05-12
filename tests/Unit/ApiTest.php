<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ApiTest extends TestCase
{
    /**
     * Test Get Notes
     *
     * @return void
     */
    public function testGetNotes()
    {
        $this->withoutMiddleware();
        $note = ['message' => 'Prepare message for test', 'tags' => 'Test'];
        $response = $this->call('POST', 'api/notes', $note);

        $response = $this->call('GET', 'api/notes');
        $result = json_decode($response->getContent(),true);
        $total = $result['total'];
        $this->assertTrue($total > 0);
    }

    /**
     * Test Get A Note By ID
     *
     * @return void
     */
    public function testGetNoteByID()
    {
        $this->withoutMiddleware();
        $note = ['message' => 'Create a message for test', 'tags' => 'Test'];
        $response = $this->call('POST', 'api/notes', $note);
        $result = json_decode($response->getContent(),true);
        $id = $result['id'];

        $response = $this->call('GET', 'api/notes/' . $id);
        $result = json_decode($response->getContent(),true);
        $this->assertEquals($result[0]['id'], $id);
    }

    /**
     * Test Create A Note
     *
     * @return void
     */
    public function testCreateNote()
    {
        $this->withoutMiddleware();

        $note = ['message' => 'Meet Jackie tomorrow', 'tags' => 'Meeting'];
        $response = $this->call('POST', 'api/notes', $note);
        $result = json_decode($response->getContent(),true);
        $this->assertEquals($result['tags'], 'Meeting');
    }

    /**
     * Test Update A Note
     *
     * @return void
     */
    public function testUpdateNote()
    {
        $this->withoutMiddleware();
        $note = ['message' => 'Meet Jackie tomorrow', 'tags' => 'Meeting'];
        $response = $this->call('POST', 'api/notes', $note);
        $result = json_decode($response->getContent(),true);
        $message = $result['message'];
        $id = $result['id'];

        $note = ['message' => 'Meet Jackie Friday', 'tags' => 'Meeting'];
        $response = $this->call('PUT', 'api/notes/' . $id, $note);
        $result = json_decode($response->getContent(),true);
        $this->assertNotEquals($result['message'], $message);
    }

    /**
     * Test Delete A Note
     *
     * @return void
     */
    public function testDeleteNote()
    {
        $this->withoutMiddleware();
        $note = ['message' => 'Delete test', 'tags' => 'Delete'];
        $response = $this->call('POST', 'api/notes', $note);
        $result = json_decode($response->getContent(),true);
        $id = $result['id'];

        $message = 'note deleted';
        $response = $this->call('DELETE', 'api/notes/' . $id);
        $result = json_decode($response->getContent(),true);
        $this->assertEquals($result['message'], $message);
    }
}
