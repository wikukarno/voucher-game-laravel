<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // unit test untuk mengecek apakah data berhasil di insert
        // $data = Category::create([
        //     'name' => 'Wiku Karno'
        // ]);

        // $this->assertDatabaseHas('categories', [
        //     'name' => $data->name,
        // ]);

        // unit test untuk mengecek apakah data berhasil di update
        // $data = Category::findOrFail(15);
        
        // $data->update([
        //     'name' => 'Juwita Ramadhani',
        // ]);

        // $this->assertDatabaseHas('categories', [
        //     'name' => $data->name,
        // ]);

        // unit test untuk mengecek apakah data berhasil di delete
        // $data = Category::findOrFail(15);
        // $data->delete();

        // $this->assertDatabaseHas('categories', [
        //     'name' => $data->name,
        // ]);

        // unit test untuk mengecek apakah data berhasil di restore
        // $data = Category::withTrashed()->where('id', 15)->first();
        // $data->restore();

        // $this->assertDatabaseHas('categories', [
        //     'name' => $data->name,
        // ]);


    }
}
