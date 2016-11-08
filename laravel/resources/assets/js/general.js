function Ajax(ajaxMethod, ajaxUrl, datatype){
    this.metajaxMethodhod = ajaxMethod;
    this.ajaxUrl = ajaxUrl;
    this.datatype = datatype;
};

Ajax.prototype.sendEmptyRequest = function() {
    $.ajax({
        method: this.ajaxMethod,
        url: this.ajaxUrl,
        datatype: this.datatype,
        success: function(result){
            var option = new Option(optionTypes.ROLE);
            option.create(result);
        },
        error: function(){
            console.log('Ajax - error');
        }
    });
};
var ajax = new Ajax('GET','/getroles','json');
ajax.sendEmptyRequest();
var optionTypes = {
    ROLE : 'roles'
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

//# sourceMappingURL=general.js.map
