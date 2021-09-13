<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_available_admin_news_url()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

    public function test_available_admin_categories()
    {
        $response = $this->get('/admin/categories');

        $response->assertStatus(200);
    }

    public function test_available_admin_news_create()
    {
        $response = $this->get('/admin/news/create');

        $response->assertStatus(200);
    }

    public function test_available_only_news()
    {
        $id = mt_rand(1,20);
        $response = $this->get('/news/' . $id);

        $response->assertStatus(200);
    }

    public function test_is_json_data()
    {
        $response = $this->get('/api/data');
        $response->assertJson([
            'name' => 'Test',
            'type' => 'User',
            'status' => 'draft'
        ])->assertStatus(200);
    }

    public function test_available_only_form_buy()
    {
        $response = $this->get('/form_buy');

        $response->assertStatus(200);
    }

    public function test_available_news()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_available_assert_ok_admin_news()
    {
        $response = $this->get('/admin/news/');

        $response->assertOk();
    }

    public function test_available_assert_ok_news()
    {
        $response = $this->get('/news/');

        $response->assertOk();
    }

    public function test_available_form_buy_assert_successful()
    {
        $response = $this->get('/form_buy');

        $response->assertSuccessful();
    }
}
