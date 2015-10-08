# laravel-gloss

A simple Laravel5 package to create "glossary-like" views.
-

Many people would find this package a "trifle", but I find myself creating "glossary-like" views quite often, so I decided to roll out this package as a little helper.

This little package adds the "Gloss" Laravel facade, which takes in an array or a collection of query results, and groups them by the first letter of a specified label field (defaults to 'name') for use in views.

Bootstrap compliant template generation will hopefully be on the next update.

All ideas, contributions and criticism are welcome.

# Installation

```bash
composer require ilkermutlu/laravel-gloss
````

In config/app.php, add the following line to the ````providers```` array:

    'Ilkermutlu\Gloss\GlossServiceProvider'

And the following line to the `````aliases```` array:

    'Gloss' => 'Ilkermutlu\Gloss\GlossFacade'

# Usage

Import the facade in your script: 

    use Gloss;

You'd normally use this for a glossary of a set of words but, let's consider another scenario: you might want to have a contacts page grouped by letters.

Let's assume you have a ````person```` table and a ````full_name```` column in that table.

````php
// Get the records
$records = \DB::select(\DB::raw('SELECT id, full_name FROM person'));

// Create the glossary data set
$gloss = Gloss::createFrom($records);
// Set the name attribute
$gloss->setName('full_name');
// Make the dataset
$people = $gloss->make();
````

Alternatively, you can chain the methods:

````php
$gloss = Gloss::createFrom($records)->setName('full_name')->make();
````

which will provide you with an array the result set you provided, grouped by distinct first letters of the records.

<strong><em>
TODO: (I will be adding functionality to automatically generate bootstrap compliant views which you can inject to your layouts as soon as I have some time, feel free to do it and create a pull request before I get to it!)
</em></strong>

Until then;
You can use the data in your views, just like you would with any array of data.

````php
@foreach ($people as $letter => $person)
  <a href="#yourlinkhere">{{ $letter }}</a>
@endforeach

@foreach ($people as $letter => $person)
  <h1>{{ $letter }}</h1>
  <a href="/yourlinkhere/{{ $person->id }}">{{ $person->full_name }}</a>
@endforeach
````
