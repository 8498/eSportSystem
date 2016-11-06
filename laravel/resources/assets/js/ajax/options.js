$.ajax({
    method: 'GET',
    url: '/getroles',
    datatype: 'json',
    success: function(result)
    {
        createOptions('role', result);
    },
    error:  function() 
    {
        console.log('getroles == problem');
    }
});

var optionTypes = {
    ROLE : 'role'
};

function createOptions(optionType, data){
    switch(optionType) {
    case optionTypes.ROLE:
        var select_roles = $('#select-roles');
        $.each(data, function(key, value) {
            select_roles.append('<option value=' + value.id + '>' + value.name + '</option>');
        });
        break;
    default:
        return false;
    }
}