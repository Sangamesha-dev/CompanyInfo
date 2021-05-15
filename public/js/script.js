    function deleteInfo(e){
        var name = $(e).attr("name");
        var url = $(e).attr("url");
        var token = $('meta[name="csrf-token"]').attr('content');
        var message = 'Are you sure about deleting '+name+' information';
        if(confirm(message)){
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {_method: 'delete'},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(result,status,xhr){
                    alert(name+" Information has been deleted");
                    location.reload();
                },
                error: function(result,status,xhr){
                    //alert("Sorry unable to delete "+ name+" information.");
                    if(result.status == 409){
                        alert('Unable to delete the information. Company contains Employee information.')
                    }
                    location.reload();
                }
            });

        }
    }

    function createEmployee(){
        var first_name = document.getElementsByName("first_name")[0].value;
        var last_name = document.getElementsByName("last_name")[0].value;
        var company_id = document.getElementsByName("company_id")[0].value;
        var email = document.getElementsByName("email")[0].value;
        var phone = document.getElementsByName("phone")[0].value;
        var designation = document.getElementsByName("designation")[0].value;
        var active = document.getElementsByName("active")[0].value;
        var url=document.getElementById('employee-form-submit').action
        if(first_name == "")
        {
            alert('First Name field is mandatory.');
            document.getElementsByName("first_name")[0].focus()
            return false;
        }
        if(last_name == "")
        {
            alert('Last Name field is mandatory.');
            document.getElementsByName("last_name")[0].focus()
            return false;
        }
        if(company_id == "")
        {
            alert('Please Select Company.');
            document.getElementsByName("company_id")[0].focus()
            return false;
        }
        $.ajax({
            url: url,
            type: 'POST',
            data: {'first_name':first_name,'last_name':last_name,'company_id':company_id,
                    'email':email,'phone':phone,'designation':designation,'active':active},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result,status,xhr){
                alert("New Employee Information created");
                location.reload();
            },
            error: function(result,status,xhr){
                alert("Sorry unable to create new employee information.");
                location.reload();
            }
        });
        return false;
    }
