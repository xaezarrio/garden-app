<?php header('Content-Type: application/javascript'); ?>

//<script type="text/javascript">
    // var year = $("#year").val();
    data('table','<?= base_url('master/aktivitas/data?tipe='.@$_GET['tipe']); ?>');

    function data(id,url) {
        $("#"+id).load(url);
    }

    function loaddatas() {
        data('table','<?= base_url('master/aktivitas/data?tipe='.@$_GET['tipe']); ?>');    
    }

    $('#loadingDiv').hide().ajaxStart( function() {
		$(this).show();  // show Loading Div
	} ).ajaxStop ( function(){
		$(this).hide(); // hide loading div
	});


	function addmodal(parent) {
        $("#upload").find(".show_error").hide().slideUp("fast");
		$("#parent").val(parent);
		$("#addsite").modal('show');
	}

	function editmodal(id) {
        $("#uploads").find(".show_error").hide().slideUp("fast");
		$("#editsite").modal('show');
		data('aktivitas-edit','<?= base_url('master/aktivitas/edit') ?>/'+id);
	}


    $("#upload").submit(function(){
        var mydata = new FormData(this);
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: mydata,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $("#send-btn").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Processing...").attr('disabled',true);
                form.find(".show_error").slideUp().html("");

            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success Input Data") != -1 || str.indexOf("Success Update Data") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    setTimeout(function(){ 
                        document.getElementById('upload').reset();
                        $("#addsite").modal('hide');
                        loaddatas();
                    }, 1000);
                    $("#send-btn").removeClass("disabled").html("Tambahkan").attr('disabled',false);;

            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btn").removeClass("disabled").html("Tambahkan").attr('disabled',false);;
                    
                    
                }
            },
            error: function(xhr, textStatus, errorThrown) {
        		console.log(xhr);
            }
        });
        return false;
        });


    $("#uploads").submit(function(){
        var mydata = new FormData(this);
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: mydata,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $("#send-btns").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Processing...").attr('disabled',true);
                form.find(".show_error").slideUp().html("");

            },
            success: function(response, textStatus, xhr) {
                // alert(mydata);
               var str = response;
                if (str.indexOf("Success Input Data") != -1 || str.indexOf("Success Update Data") != -1){
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    setTimeout(function(){ 
                        document.getElementById('uploads').reset();
                        $("#editsite").modal('hide');
                        loaddatas();
                    }, 1000);
                    $("#send-btns").removeClass("disabled").html("Perbaharui").attr('disabled',false);;

            
                }else{
                    form.find(".show_error").hide().html(response).slideDown("fast");
                    $("#send-btns").removeClass("disabled").html("Perbaharui").attr('disabled',false);;
                    
                    
                }
            },
            error: function(xhr, textStatus, errorThrown) {
        		console.log(xhr);
            }
        });
        return false;
        });


    function deleterka(id,tipe) {
        if (confirm("Apakah Anda Yakin ?") == true) {
          $.ajax({
                type: "POST",
                url: "<?= base_url('master/aktivitas/delete') ?>/"+id+"/"+tipe,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend : function(){
                },
                success: function(response, textStatus, xhr) {
                   var str = response;
                    if (str.indexOf("Success Disable Data")  != -1){
                        // form.find(".show_error").hide().html(response).slideDown("fast");
                        setTimeout(function(){ 
                            // document.getElementById('uploads').reset();
                            // $("#editsite").modal('hide');
                            loaddatas();
                        }, 1000);
                        // $("#send-btns").removeClass("disabled").html("Perbaharui").attr('disabled',false);;

                    }else{
                        
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr);
                }
            });
        } else {

        }
  
    }

//</script>