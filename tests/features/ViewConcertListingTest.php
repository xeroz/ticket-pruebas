<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Concert;
use Carbon\Carbon;

class ViewConcertListingTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //Create a concert
        $concert = Concert::create([
            'title' => 'The Red Chord',
            'subtitle' => 'with Animosity and Lethardgy',
            'date' => Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'the mosh pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'ON',
            'zip' => '17916',
            'additional_information' => 'For tickets, call (555) 555-5555',
        ]);

        $this->visit('/concerts/'.$concert->id);

        $this->see('the red chord');
        $this->see('with Animosity and Lethardgy');
        $this->see('December 13, 2016');
        $this->see('8:00pm');
        $this->see('32.50');
        $this->see('the mosh pit');
        $this->see('123 Example Lane');
        $this->see('Laraville ON 17916');
        $this->see('For tickets, call (555) 555-5555');

        $this->assertTrue(true);
    }

    function user_can_view_a_concert_listing()
    {
        
    }
}
