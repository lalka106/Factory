ClassicEditor
	.create(document.querySelector('#editor'), {
		toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
		heading: {
			options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
			]
		}
	})
	.catch(error => {
		console.log(error);
	});


$(document).ready(function () {
	$('.header__burger').click(function (event) {
		$('.header__burger, .1').toggleClass('active1');
		$(' .carousel.slide').toggleClass('vis');
		$('body').toggleClass('lock');
	});

});
