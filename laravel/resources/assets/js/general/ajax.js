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