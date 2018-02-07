/* Submitting article feedback */
(function ($)
{
	var _document = $(document);

	_document.on('click','#helpful .article-vote-up, #helpful .article-vote-down',function(event){

		var _this = $(this);
		var form = _this.closest('form');
		var data = form.serializeArray();

		_this.prop('disabled',true);

		if(_this.hasClass('article-vote-up'))
			data.push({ name:'like[yes]',value:1 });
		else
			data.push({ name:'like[no]',value:1 });

		$.post(form.attr('action'), data, function(data){
			$('#helpful').html( data );
		});

		event.preventDefault();
	})

})(jQuery);