$(document).ready(function(){
  $('#price_filter').click(function(){
	var totalPage = parseInt($('#totalPages').val());	
	  var pag = $('#pagination').simplePaginator({
		totalPages: totalPage,
		maxButtonsVisible: 5,
		currentPage: 1,
		nextLabel: 'Next',
		prevLabel: 'Prev',
		firstLabel: 'First',
		lastLabel: 'Last',
		clickCurrentPage: true,
		pageChange: function(page) {
	    alert(page);		
			
            $.ajax({
				url:"load_data.php",
				method:"POST",
						
				data:{page:	page},
				success:function(response){
					$('#content').html(response);
				}
			});
		}
	  });
	});
});