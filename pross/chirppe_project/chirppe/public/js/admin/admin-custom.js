function delete_selected_item(element_id,controller,item_id)
{
	var url = base_url+'/'+controller;
	var token = $('meta[name="csrf-token"]').attr('content');
	swal({
          title: 'Are you sure?',
          text: "You want to delete the Post?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No',
          confirmButtonClass: 'btn btn-success btn-sweet',
          cancelButtonClass: 'btn btn-danger btn-sweet',
          buttonsStyling: false
        }).then(function () {
                	$.ajax({
						url: url+'/'+item_id,
						method:'GET',
						data:{'_token':token},
						success:function(msg){
							swal("Deleted!", "Your selected item has been deleted.", "success");
							dataTableInstance.draw();
							}
					});
        }, function (dismiss) {
            // do nothing
    })
}

function featured_post(item_id, is_featured)
{
	var url = base_url + '/featured-post' ;
	var token = $('meta[name="csrf-token"]').attr('content');

    swal({
          title: 'Are you sure?',
          text: "You want to change the status of Featured Post?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
          confirmButtonClass: 'btn btn-success btn-sweet',
          cancelButtonClass: 'btn btn-danger btn-sweet',
          buttonsStyling: false
        }).then(function () {
                $.ajax({
					url: url,
					method:'POST',
					data:{'_token':token,'id':item_id,'is_featured':is_featured},
					success:function(msg){
						swal("Changed!", "Your selected item has been changed.", "success");
						dataTableInstance.draw();
						}
				});
        }, function (dismiss) {
            // do nothing
    })
}

function change_status(item_id, controller, status)
{
	var token = $('meta[name="csrf-token"]').attr('content');
	var url = base_url + '/change-status' ;
	if(status == 'approve')
	{
		swal({
          title: 'Are you sure?',
          text: "You want to change the status?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
          confirmButtonClass: 'btn btn-success btn-sweet',
          cancelButtonClass: 'btn btn-danger btn-sweet',
          buttonsStyling: false
        }).then(function () {
                $.ajax({
					url: url,
					method:'POST',
					data:{'_token':token,'id':item_id,'status':status,'controller':controller},
					success:function(msg){
						swal("Changed!", "Your status has been changed.", "success");
						dataTableInstance.draw();
						}
				});
        	}, function (dismiss) {
            // do nothing
    	})
	} 
	else
	{
		swal({
			  title: 'Are you sure?',
			  text: 'Please provide the reason of rejection.',
			  input: 'textarea',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Submit',
			  showLoaderOnConfirm: true,
			  preConfirm: function (reason) {
			    return new Promise(function (resolve, reject) {
			      setTimeout(function() {
			        if (reason.trim() === '') {
			          reject('Please provide reason of rejection.')
			        } else {
			          resolve()
			        }
			      }, 1000)
			    })
			  },
			  allowOutsideClick: false
			}).then(function (reason) {
				$.ajax({
					url: url,
					method:'POST',
					data:{'_token':token,'id':item_id,'status':status,'controller':controller,'message':reason},
					success:function(msg){
						swal("Changed!", "Your status has been changed.", "success");
						dataTableInstance.draw();
						}
				});
		})
	}
}