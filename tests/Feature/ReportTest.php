<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }
    /**
     * @test
     */
    public function get_response_code_200()
    {
        $response = $this->get('api/customers');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function post_response_code_200()
    {
        $customer = [
            'name' => 'customer_name',
        ];
        $response = $this->postJson('api/customers', $customer);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_response_code_200_with_customer_id()
    {
        $response = $this->get('api/customers/1');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function put_response_code_200_with_customer_id()
    {
        $response = $this->put('api/customers/1');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function delete_response_code_200_with_customer_id()
    {
        $response = $this->delete('api/customers/1');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_response_code_200_reports()
    {
        $response = $this->get('api/reports');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function post_response_code_200_reports()
    {
        $response = $this->post('api/reports');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_response_code_200_reports_id()
    {
        $response = $this->get('api/reports/1');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function put_response_code_200_reports_id()
    {
        $response = $this->put('api/reports/1');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function delete_response_code_200_reports_id()
    {
        $response = $this->delete('api/reports/1');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_json_api_customer()
    {
        $response = $this->get('api/customers');
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
     * @test
     */
    public function get_correct_json_attribute()
    {
        $response = $this->get('api/customers');
        $customers = $response->json();
        $customers = $customers[0];
        $this->assertSame(['id', 'name'], array_keys($customers));
    }

    /**
     * @test
     */
    public function get_json_data_two_customers_data()
    {
        $response = $this->get('api/customers');
        $response->assertJsonCount(2);
    }

    /**
     * @test
     */
    public function post_customers_data_to_database()
    {
        $params = [
            'name' => '顧客名',
        ];
        $this->postJson('api/customers', $params);
        $this->assertDatabaseHas('customers', $params);
    }

    /**
     * @test
     */
    public function POST_api_customers_にnameが含まれない場合422が返却される()
    {
        $params = [];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function POST_api_customers_にnameが空の場合422が返却される()
    {
        $params = [
            'name' => ''
        ];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
