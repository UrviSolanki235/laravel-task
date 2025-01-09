<?php

namespace Database\Seeders;
use App\Models\Page;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        // Root pages
        $page1 = Page::create([
            'slug' => 'page1',
            'title' => 'Page 1',
            'content' => 'Content for Page 1'
        ]);

        $page5 = Page::create([
            'slug' => 'page5',
            'title' => 'Page 5',
            'content' => 'Content for Page 5'
        ]);

        // Child pages of Page 1
        $page2 = Page::create([
            'parent_id' => $page1->id,
            'slug' => 'page2',
            'title' => 'Page 2',
            'content' => 'Content for Page 2'
        ]);

        $page3 = Page::create([
            'parent_id' => $page2->id,
            'slug' => 'page3',
            'title' => 'Page 3',
            'content' => 'Content for Page 3'
        ]);

        $page4 = Page::create([
            'parent_id' => $page3->id,
            'slug' => 'page4',
            'title' => 'Page 4',
            'content' => 'Content for Page 4'
        ]);

    }
}
