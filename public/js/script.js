$(document).ready(function(){    
    $("#addNoteForm").submit(function(e){	
        e.preventDefault(); 
        var Content = CKEDITOR.instances['editor'].getData(); 
       
        var isUpdate =  $('#addsnippetID').val();   
    
        if(typeof isUpdate !== 'undefined' ){           
            isUpdate = isUpdate.replace(/ /g, '');
        }else{
            isUpdate = '';
        }
     
        var textsave = ( isUpdate == '') ? "Saved!" : 'Updated!'; 
             
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url:  base_url  + "/addnote/submit",
            data: {updateID:isUpdate,category: $(".categoryID").find(":selected").val(), title: $("#NameNote").val(), code: Content },  
            success: function(data) {
                if(data.html == 'success'){

                    Swal.fire(textsave, '', 'success')
                }
            }

        });
        
	});

    $("#addcategory").submit(function(e){	
        e.preventDefault();     
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url:  base_url  + "/category/submit",
            data: $(this).serialize(),                    
            success: function(data) {
                if(data.html == 'success'){
                    Swal.fire('Saved!', '', 'success').then(function(){
                        if(data.redirect =='addnote'){
                             window.location.href = base_url + '/addnote';   
                        }else{                            
                             window.location.href = base_url + '/mycategory';
                        }
                    })
                }else{
                    Swal.fire('Already Exists!', '', 'error')
                }
            }
        });
        
	});
    
  
    /**
     *  Delete Category
     */
    $(".DeleteCategory").click(function(){
        var deleteCats = $(this).attr('x-id')
        
        Swal.fire({
            title: 'Do you want to delete the category?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Delete',          
          }).then((result) => {           
            if (result.isConfirmed) {
                    var fd = createvirtual();         
                    fd.append('id', deleteCats);                    
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url:  base_url  + "/category/delete",
                        data: fd, 
                        processData: false,
                        contentType: false,          
                        success: function(data) {  
                            if(data.html =='success') {
                                Swal.fire('Delete!', '', 'success').then(function() {
                                    location.reload();
                                });
                            }    else{
                                Swal.fire('Delete not allowed, Category is currently being used!', '', 'error')
                            }               
                        }
                    });
                  
            } else if (result.isDenied) {
              Swal.fire('Changes are not saved', '', 'info')
            }
          }) 
    })


     /**
     *  Delete Category
     */
      $(".DeleteSnippet").click(function(){
        var deleteCats = $(this).attr('x-id')
        
        Swal.fire({
            title: 'Do you want to delete the Snippet?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Delete',          
          }).then((result) => {           
            if (result.isConfirmed) {
                    var fd = createvirtual();         
                    fd.append('id', deleteCats);                    
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url:  base_url  + "/snippet/delete",
                        data: fd, 
                        processData: false,
                        contentType: false,          
                        success: function(data) {                      
                        }
                    });
                    Swal.fire('Delete!', '', 'success').then(function() {
                        location.reload();
                    });
            } else if (result.isDenied) {
              Swal.fire('Changes are not saved', '', 'info')
            }
          }) 
    })


    /**
     *   Update Category
     */
    $("#updateCategory").submit(function(e){	
        e.preventDefault();     
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url:  base_url  + "/update-category/submit",
            data: $(this).serialize(),           
            success: function(data) {
                if(data.html == 'success'){
                    Swal.fire('Updated!', '', 'success')
                }
            }
        });
        
	});
})

function back(){
    
        window.history.back();
    
}

var createvirtual = function(){
    var f = document.createElement("form");
    f.setAttribute('method',"post");
    f.setAttribute('id',"virtualform");
    document.getElementsByTagName('body')[0].appendChild(f);
    var fd = new FormData(document.getElementById("virtualform"));
    return fd;
}