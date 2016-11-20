var optionTypes = {
    ROLE : 'roles',
    OFFICE : 'offices'
};

function Option(optionType) { 
    this.optionType = optionType;
};

Option.prototype.create = function(data) {
    var select_roles = $('#select-'+ this.optionType);
    $.each(data, function(key, value) {
        select_roles.append('<option value=' + value.id + '>' + value.name + '</option>');
    });
};
