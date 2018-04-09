<?php

namespace Tests\Unit;

use App\Blog;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Given I have two records in the database that are posts
        //and each one is posted a month apart
    	$first = factory(Blog::class)->create();
    	$second = factory(Blog::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth()
    	]);

        //When I fetch the archives
    	$blog = Blog::archives();
        //Then the response should be in the proper format.
        $this->assertEquals([
        	[
        		"year" => $first->created_at->format('Y'),
			    "month" => $first->created_at->format('F'),
			    "published" => 1
        	],

        	[
        		"year" => $second->created_at->format('Y'),
			    "month" => $second->created_at->format('F'),
			    "published" => 1
        	]
        ], $blog);
    }
}