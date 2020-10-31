/*
 * Make a text field limit a user's input to a given number of words.
 * Set up a div or span to contain a visual countdown of the number of words remaining:
 * 		<span id="counter"></span>
 * Attach the limit_words function to the text field, passing the word limit and the counter
 * 		var elem = $("#counter");
 *		$("#textField").limit_words(10, elem);	
 */

$.fn.extend({
	limit_words: function(max, counter){
		$(this).bind("keydown focus", function(){
		var self = this;
		window.setTimeout(function(){
			var chars = self.value.length;
			var wordCount = { count : 0 };
			var limit = count_words(self.value, wordCount, max);
			if (limit < chars) 
			{
				self.value = self.value.substr(0, limit);
				chars = max;
			}
			if (typeof(counter) != 'undefined') counter.html(max - wordCount.count);
		}, 5);
		});
	}
});

function count_words(str, wc, max)
{
	var wspace		= " \t\n.,;\"";
	var word_count	= 0;
	var last_space	= true;
	var	is_space	= true;
	var last_ch		= "L";
	
	for (var i = 0; i < str.length; i++)
	{
		var ch = str.charAt(i);
		is_space = (wspace.indexOf(ch) == -1) ? false : true;
		
		if (is_space == false && last_space == true)
		{
			// Exception: numbers containing punctuation are 1 word
			if ($.isNumeric(ch) && (last_ch == ',' || last_ch == '.'))
				$.noop();
			else
				word_count++;
		}
		last_space	= is_space;
		last_ch		= ch;
		
		// If current char would start a word past max allowed, truncate and leave
		wc.count = word_count > max ? max : word_count;
		if (word_count > max)
			return i;
	}
	return str.length;	// no truncation needed
}

