<?php

namespace App\View\Composers\Backoffice;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Venue;

class CourseFormComposer
{
	/**
     * Categories.
     *
     * @var \App\Models\Category
     */
    protected $categories;

    /**
     * Venue.
     *
     * @var \App\Models\Venue
     */
    protected $venues;

	/**
	 * Perform initialization.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->categories = Category::all();
		$this->venues = Venue::all();
	}

	/**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
        	'categories' => $this->categories,
        	'venues' => $this->venues
        ]);
    }
}