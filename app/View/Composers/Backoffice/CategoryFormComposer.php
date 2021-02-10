<?php

namespace App\View\Composers\Backoffice;

use Illuminate\View\View;
use App\Models\Course;

class CategoryFormComposer
{
	/**
     * Courses.
     *
     * @var \App\Models\Course
     */
    protected $courses;

	/**
	 * Perform initialization.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->courses = Course::all();
	}

	/**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('courses', $this->courses);
    }
}