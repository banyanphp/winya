function country_delete(id){
 var result= confirm ("Are you sure for delete?");
	 if(result)
	 {
		  $.ajax({
                    type: "POST",
                    url: 'country_delete.php',
                    data: {
            id: id,
            
        },
		 success: function(data)
    {   
    alert(data);
           
    location.reload();
    },
		
                   
                });
		
	 }
	 
	
}
