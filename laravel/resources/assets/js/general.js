function Ajax(ajaxMethod, ajaxUrl, datatype){
    this.metajaxMethodhod = ajaxMethod;
    this.ajaxUrl = ajaxUrl;
    this.datatype = datatype;
};

Ajax.prototype.getRoles = function() {
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

Ajax.prototype.getOffices = function() {
    $.ajax({
        method: this.ajaxMethod,
        url: this.ajaxUrl,
        datatype: this.datatype,
        success: function(result){
            var option = new Option(optionTypes.OFFICE);
            option.create(result);
        },
        error: function(){
            console.log('Ajax - error');
        }
    });
}
var ajax = new Ajax('GET','/getroles','json');
ajax.getRoles();

var ajax_2 = new Ajax('GET','/administration/getoffices','json');
ajax_2.getOffices();
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

//# sourceMappingURL=general.js.map
