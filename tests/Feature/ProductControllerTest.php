<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowsAllProducts(): void
    {
        $products = Product::factory()->count(5)->create();

        $this->get(route('products.index'))
            ->assertSee($products->first()->name);
    }

    public function testShowsProductCreatePage(): void
    {
        $this->get(route('products.create'))
            ->assertSee('Preces nosaukums')
            ->assertSee('Daudzums');
    }

    public function testUserCanCreateAProduct(): void
    {
        $this->post(route('products.store', [
            'name' => 'Product name',
            'amount' => 10,
            'size' => 'XL',
            'price' => 100
        ]))
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Product name',
            'amount' => 10,
            'size' => 'XL',
            'price' => 100
        ]);
    }

    public function testShowsOneProduct(): void
    {
        $product = Product::factory()->create();

        $this->get(route('products.show', $product))
            ->assertSee($product->name)
            ->assertSee($product->amount)
            ->assertSee($product->size)
            ->assertSee($product->price / 100);
    }

    public function testShowsProductEditPage(): void
    {
        $product = Product::factory()->create();

        $this->get(route('products.edit', $product))
            ->assertStatus(200)
            ->assertSee('Preces nosaukums')
            ->assertSee($product->name)
            ->assertSee('Daudzums')
            ->assertSee($product->amount);

    }

    public function testUserCanUpdateAProduct(): void
    {
        $product = Product::factory()->create();

        $this->put(route('products.update', $product), [
            'name' => 'New name',
            'amount' => $product->amount + 1,
            'size' => 'XL',
            'price' => $product->price + 100,
        ])
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'New name',
            'amount' => $product->amount + 1,
            'size' => 'XL',
            'price' => $product->price + 100,
        ]);
    }

    public function testUserCanDeleteAProduct(): void
    {
        $product = Product::factory()->create();

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', [
            'name' => $product->name,
            'amount' => $product->amount,
            'size' => $product->size,
            'price' => $product->price,
        ]);
    }
}

