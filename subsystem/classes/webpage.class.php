<?php

/**
 * @package UseClasses
 *
 * @version $Id$
 * @copyright 2008
 */

// a class to present an xhtml strict compliant web page to a client
class Webpage{
	protected $head;
	protected $body;
	protected $foot;

	// constructor uses a private function called makeHead to assign a value to the head attribute, and which assigns values to
	// the foot and body attributes.  Notice the type hinting for $styles that it be an array
	function __construct($title="New Page", array $styles){
		$this->makeHead( $title, $styles );
		$this->foot = "\n</body></html>";
		$this->body = "";
	}

	// concatenates the value of the supplied text parameter to the body attribute
	function addToBody( $text ){
		$this->body .= $text;
	}

	// returns the page - concatenating its parts into one
	function getPage(){
		return $this->head . $this->body . $this->foot;
	}

	// make up the head section - inserts the title and iterates through an array of styles creating a link instruction for each one.   It's neater to put this
    // functionality in its own function rather than put the code in the constructor

	private function makeHead( $title, array $styles ){
		$stylelinks = "";
		foreach($styles as $style){
			$stylelinks .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$style\" />\n\t";
		}
		// this is a good way of assigning lots of formatted text that contains quotes to a variable, it saves you having to escape the quotes.
		// you have to include the <<<WORD and then end the assignment with WORD; on its own line not indented.  It's called a 'heredoc', look it up.
		$this->head = <<<HEAD
		
		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<title>$title</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	$stylelinks
</head>
<body>

HEAD;
	}
}

?>