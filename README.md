# Silverstripe Tagged Field
[![Latest Stable Version](https://poser.pugx.org/stnvh/silverstripe-taggedfield/v/stable.svg)](https://packagist.org/packages/stnvh/silverstripe-taggedfield) [![License](https://poser.pugx.org/stnvh/silverstripe-taggedfield/license.svg)](https://packagist.org/packages/stnvh/silverstripe-taggedfield)

Creates a tag field, similar to how a ListBoxField looks.

![Tagged Field](http://cl.ly/image/2c2y0j0l3M2a/Image%202014-10-20%20at%209.41.01%20am.png)

By Stan Hutcheon - [Bigfork Ltd](http://bigfork.co.uk)

## Installation:

### Composer:

```
composer require "stnvh/silverstripe-taggedfield" "~1"
```

### Download:

Clone this repo into a folder called ```taggedfield``` in your silverstripe installation folder.

### Usage:

Initialize it like any other field. Make sure you have a 'Text' entry in the database to store the values:

```php
<?php

class MyObject extends DataObject {

	private static $db = array(
		'Tags' => 'Text'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$taggedField = TaggedField::create('Tags');

		$fields->addFieldToTab('Root.Main', $taggedField);

		return $fields;
	}

	// To use the tags in the template correctly
	public function Tags() {
		$new = array();
		foreach(explode(',', $this->Tags) as $tag) {
			$new[] = array('Tag' => $tag);
		}
		return ArrayList::create($new);
	}

}
```
In the template:
```html
	<% loop Tags %>
		<span class="tag">{$Tag}</span>
	<% end_loop %>
```

After installing via composer, you must */dev/build*