<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Concert;
use Carbon\Carbon;

class ConcertTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $concert = Concert::create([
            'date' => Carbon::parse('2016-12-01 8:00pm'),
            'title' => 'The Red Chord',
            'subtitle' => 'with Animosity and Lethardgy',
            'ticket_price' => 3250,
            'venue' => 'the mosh pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'ON',
            'zip' => '17916',
            'additional_information' => 'For tickets, call (555) 555-5555',
        ]);

        $date = $concert->formatted_date;

        $this->assertEquals('December 1, 2016', $date);

        $this->assertTrue(true);
    }

    public function testExample2()
    {
        $concert = factory(Concert::class)->create([
            'date' => Carbon::parse('2016-12-01 17:00:00'),
        ]);

        $this->assertEquals('5:00pm', $concert->formatted_start_time);

        $this->assertTrue(true);
    }
}
